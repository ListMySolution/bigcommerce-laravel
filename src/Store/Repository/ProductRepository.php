<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository;

use Maverickslab\Integration\BigCommerce\Store\Model\Category;
use Maverickslab\Integration\BigCommerce\Store\Model\Product;
use Maverickslab\Integration\BigCommerce\Store\Model\Image;
use GuzzleHttp\Psr7\Response;
use Maverickslab\Integration\BigCommerce\Store\Model\Brand;

/**
 * Product repository class
 *
 * @author cosman
 *        
 */
class ProductRepository extends BaseRepository
{

    /**
     * Imports and returns all products in a store on BigCommerce
     *
     * @return Product[]
     */
    public function import(array $filters = []): array
    {
        $products = [];
        
        $page = 1;
        $totalPages = 0;
        $limit = 1000;
        $includes = array(
            'variants',
            'images',
            'bulk_pricing_rules'
        );
        
        $categoryPromises = [];
        
        $brandPromises = [];
        
        do {
            
            $response = $this->bigCommerce->product()
                ->fetch($page ++, $limit, $includes, [], [], $filters)
                ->wait();
            
            $responseData = $this->decodeResponse($response);
            
            $totalPages = $responseData->meta->pagination->total_pages;
            
            if (is_array($responseData->data)) {
                foreach ($responseData->data as $productModel) {
                    $product = Product::fromBigCommerce($productModel);
                    
                    $products[$product->getId()] = $product;
                    
                    if (count($product->getCategoryIds())) {
                        $productCategoryPromises = array_map(function ($categoryId) {
                            return $this->bigCommerce->category()->fetchById($categoryId);
                        }, $product->getCategoryIds());
                        
                        $categoryPromises[$product->getId()] = $this->bigCommerce->category()->resolvePromises($productCategoryPromises);
                    }
                    
                    if ($product->getBrandId()) {
                        $brandPromises[$product->getId()] = $this->bigCommerce->product()->fetchBrandById($product->getBrandId());
                    }
                }
            }
        } while ($page <= $totalPages);
        
        $allPromises = array(
            'categories' => $this->bigCommerce->category()->resolvePromises($categoryPromises),
            'brands' => $this->bigCommerce->product()->resolvePromises($brandPromises)
        );
        
        $bulkResponses = $this->bigCommerce->product()
            ->resolvePromises($allPromises)
            ->wait();
        
        foreach ($bulkResponses['categories'] as $productId => $categoryResponseArray) {
            foreach ($categoryResponseArray as $categoryResponse) {
                $categoryResponseData = $this->decodeResponse($categoryResponse);
                $products[$productId]->addCategory(Category::fromBigCommerce($categoryResponseData->data));
            }
        }
        
        foreach ($bulkResponses['brands'] as $productId => $brandResponse) {
            $brandResponseData = $this->decodeResponse($brandResponse);
            $products[$productId]->setBrand(Brand::fromBigCommerce($brandResponseData->data));
        }
        
        return array_values($products);
    }

    /**
     * Imports a single product form BigCommerce
     *
     * @param int $id
     * @return Product|NULL
     */
    public function importById(int $id): ?Product
    {
        $filters = array(
            'id' => $id
        );
        
        $matchedProducts = $this->import($filters);
        
        return count($matchedProducts) ? $matchedProducts[0] : null;
    }

    /**
     * Exports new products to BigCommerce
     *
     * @param Product ...$products
     * @return Product[]
     */
    public function export(Product ...$products): array
    {
        $productCollection = array_map(function (Product $product) {
            return $product->toBigCommerceEntity();
        }, $products);
        
        $responses = $this->bigCommerce->product()
            ->createMany(...$productCollection)
            ->wait();
        
        $exportedProducts = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            $product = Product::fromBigCommerce($responseData->data);
            $exportedProducts[$product->getId()] = $product;
        }
        
        // Upload product images
        $imageUploadPromises = [];
        
        foreach ($exportedProducts as $exportedProduct) {
            if (count($exportedProduct->getImages())) {
                
                // Filter out images with no valid file for upload
                $images = array_filter($exportedProduct->getImages(), function (Image $image) {
                    if ($image->getFile() && file_exists($image->getFile())) {
                        return $image;
                    }
                    
                    if ($image->getStandardUrl() && false !== filter_var($image->getStandardUrl(), FILTER_VALIDATE_URL)) {
                        return $image;
                    }
                    
                    return false;
                });
                
                if (count($images)) {
                    $currentImagePromises = array_map(function (Image $image) use ($exportedProduct) {
                        // Prefer image Url over local/physical file
                        $file = $image->getStandardUrl() ? $image->getStandardUrl() : $image->getFile();
                        return $this->bigCommerce->product()->uploadProductImage($exportedProduct->getId(), $file);
                    }, $images);
                    
                    $imageUploadPromises[$exportedProduct->getId()] = $this->bigCommerce->product()->resolvePromises($currentImagePromises);
                }
            }
        }
        
        $imageUploadResponses = $this->bigCommerce->product()
            ->resolvePromises($imageUploadPromises)
            ->wait();
        
        foreach ($imageUploadResponses as $productId => $subImageUploadResponseArray) {
            $productImages = array_map(function (Response $response) {
                $responseData = $this->decodeResponse($response);
                return Image::fromBigCommerce($responseData->data);
            }, $subImageUploadResponseArray);
            
            $exportedProducts[$productId]->addImages(...$productImages);
        }
        
        return array_values($exportedProducts);
    }

    /**
     * Exports at least one product update to BigCommerce
     *
     * @param Product ...$products
     * @return Product
     */
    public function exportUpdate(Product ...$products): array
    {
        $promises = [];
        
        foreach ($products as $product) {
            if ($product->getId()) {
                $promises[] = $this->bigCommerce->product()->update($product->getId(), $product->toBigCommerceEntity());
            }
        }
        
        $responses = $this->bigCommerce->product()
            ->resolvePromises($promises)
            ->wait();
        
        $updatedProducts = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            $updatedProduct = Product::fromBigCommerce($responseData->data);
            $updatedProducts[$updatedProduct->getId()] = $updatedProduct;
        }
        
        // Upload product images
        $imageUploadPromises = [];
        
        foreach ($updatedProducts as $updatedProduct) {
            if (count($updatedProduct->getImages())) {
                
                // Filter out images with no valid file for upload
                // Also filter out non-new images
                $images = array_filter($updatedProduct->getImages(), function (Image $image) {
                    
                    // Skip existing images. Existing images have ids
                    if ($image->getId()) {
                        return false;
                    }
                    
                    if ($image->getFile() && file_exists($image->getFile())) {
                        return $image;
                    }
                    
                    if ($image->getStandardUrl() && false !== filter_var($image->getStandardUrl(), FILTER_VALIDATE_URL)) {
                        return $image;
                    }
                    
                    return false;
                });
                
                if (count($images)) {
                    $currentImagePromises = array_map(function (Image $image) use ($updatedProduct) {
                        // Prefer image Url over local/physical file
                        $file = $image->getStandardUrl() ? $image->getStandardUrl() : $image->getFile();
                        
                        return $this->bigCommerce->product()->uploadProductImage($updatedProduct->getId(), $file);
                    }, $images);
                    
                    $imageUploadPromises[$updatedProduct->getId()] = $this->bigCommerce->product()->resolvePromises($currentImagePromises);
                }
            }
        }
        
        $imageUploadResponses = $this->bigCommerce->product()
            ->resolvePromises($imageUploadPromises)
            ->wait();
        
        foreach ($imageUploadResponses as $productId => $subImageUploadResponseArray) {
            $productImages = array_map(function (Response $response) {
                $responseData = $this->decodeResponse($response);
                return Image::fromBigCommerce($responseData->data);
            }, $subImageUploadResponseArray);
            
            $exportedProducts[$productId]->addImages(...$productImages);
        }
        
        return array_values($updatedProducts);
    }

    /**
     * Fetches available product brands
     *
     * @return Brand[]
     */
    public function importBrands(): array
    {
        $page = 1;
        $limit = 1000;
        $brands = [];
        $itemsReturnedForCurrentRequest = 0;
        
        do {
            $response = $this->bigCommerce->product()
                ->fetchBrands($page ++, $limit)
                ->wait();
            
            $responseData = $this->decodeResponse($response);
            
            if (is_array($responseData->data)) {
                
                $itemsReturnedForCurrentRequest = count($responseData->data);
                
                foreach ($responseData->data as $brandModel) {
                    $brands[] = Brand::fromBigCommerce($brandModel);
                }
            }
        } while ($limit === $itemsReturnedForCurrentRequest);
        
        return $brands;
    }

    /**
     * Exports a collection of brands to bigcommerce
     *
     * @param Brand ...$brands
     * @return Brand[]
     */
    public function exportBrands(Brand ...$brands): array
    {
        $promises = [];
        
        foreach ($brands as $brand) {
            if (! $brand->getId()) {
                $promises[] = $this->bigCommerce->product()->createBrand($brand->toBigCommerceEntity());
            }
        }
        
        $responses = $this->bigCommerce->product()
            ->resolvePromises($promises)
            ->wait();
        
        $createdBrands = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            
            $createdBrands[] = Brand::fromBigCommerce($responseData->data);
        }
        
        return $createdBrands;
    }

    /**
     * Updates a collection of brands
     *
     * @param Brand ...$brands
     * @return Brand[]
     */
    public function exportUpdateBrands(Brand ...$brands): array
    {
        $promises = [];
        
        foreach ($brands as $brand) {
            if ($brand->getId()) {
                $promises[] = $this->bigCommerce->product()->updateBrand($brand->getId(), $brand->toBigCommerceEntity());
            }
        }
        
        $responses = $this->bigCommerce->product()
            ->resolvePromises($promises)
            ->wait();
        
        $updatedBrands = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            
            $updatedBrands[] = Brand::fromBigCommerce($responseData->data);
        }
        
        return $updatedBrands;
    }

    /**
     * Deletes a collection of brands by their ids
     *
     * @param int ...$ids
     * @return int
     */
    public function deleteBrandsById(int ...$ids): int
    {
        $promises = array_map(function (int $id) {
            return $this->bigCommerce->product()->deleteBrandById($id);
        }, array_filter($ids));
        
        $responses = $this->bigCommerce->product()
            ->resolvePromises($promises)
            ->wait();
        
        return count($promises);
    }

    /**
     * 1
     * Deletes a number of products by Id1
     *
     * @param int ...$ids
     * @return int
     */
    public function deleteByIds(int ...$ids): int
    {
        $promises = array_map(function ($id) {
            return $this->bigCommerce->product()->deleteById($id);
        }, array_filter($ids));
        
        $responses = $this->bigCommerce->product()
            ->resolvePromises($promises)
            ->wait();
        
        return count($responses);
    }

    /**
     * Deletes a number of products from BigCommerce
     *
     * @param Product ...$products
     * @return int
     */
    public function delete(Product ...$products): int
    {
        return $this->deleteByIds(array_map(function (Product $product) {
            return $product->getId();
        }, $products));
    }

    /**
     * Deletes products matching given filters
     *
     * @param array $filters
     */
    public function deleteByFilter(array $filters = []): void
    {
        $this->bigCommerce->product()
            ->delete($filters)
            ->wait();
    }

    /**
     * Save a collection of products to local database
     *
     * @param Product ...$products
     * @return Product[]
     */
    public function save(Product ...$products): array
    {
        return $this->repositoryWriter->createProducts(...$products);
    }

    /**
     * Updates a collection of products in local database
     *
     * @param Product ...$products
     * @return Product[]
     */
    public function update(Product ...$products): array
    {
        return $this->repositoryWriter->updateProducts(...$products);
    }
}