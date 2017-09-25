<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository;

use Maverickslab\Integration\BigCommerce\Store\Model\Product;

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
    public function import()
    {
        $products = [];
        
        $page = 1;
        $totalPages = 0;
        $limit = 1000;
        $includes = array(
            'variants',
            'images'
        );
        
        do {
            
            $response = $this->bigCommerce->product()
                ->fetch($page ++, $limit, $includes)
                ->wait();
            
            $responseData = $this->decodeResponse($response);
            
            $totalPages = $responseData->meta->pagination->total_pages;
            
            if (is_array($responseData->data)) {
                foreach ($responseData->data as $productModel) {
                    $products[] = Product::fromBigCommerce($productModel);
                }
            }
        } while ($page <= $totalPages);
        
        return $products;
    }

    /**
     * Exports products to BigCommerce
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
            $exportedProducts[] = Product::fromBigCommerce($responseData->data);
        }
        
        return $exportedProducts;
    }

    /**
     * Exports at least one product update to BigCommerce
     *
     * @param Product ...$products
     * @return Product
     */
    public function exportUpdate(Product ...$products): array
    {
        $promises = array_map(function (Product $product) {
            return $this->bigCommerce->product()->update($product->getId(), $product->toBigCommerceEntity());
        }, $products);
        
        $responses = $this->bigCommerce->product()
            ->resolvePromises($promises)
            ->wait();
        
        $updatedProducts = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            $updatedProducts[] = Product::fromBigCommerce($responseData->data);
        }
        
        return $updatedProducts;
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