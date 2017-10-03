<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository;

use Maverickslab\Integration\BigCommerce\Store\Model\Category;
use GuzzleHttp\Psr7\Response;

class ProductCategoryRepository extends BaseRepository
{

    /**
     * Imports all categories from BigCommerce
     *
     * @return Category[]
     */
    public function import(): array
    {
        $page = 1;
        $limit = 1000;
        $totalPages = 0;
        $categories = [];
        
        do {
            $response = $this->bigCommerce->category()
                ->fetch($page ++, $limit)
                ->wait();
            
            $responseData = $this->decodeResponse($response);
            
            $totalPages = $responseData->meta->pagination->total_pages;
            
            if (is_array($responseData->data)) {
                foreach ($responseData->data as $categoryModel) {
                    $categories[] = Category::fromBigCommerce($categoryModel);
                }
            }
        } while ($page <= $totalPages);
        
        return $categories;
    }

    /**
     * Exports a collection of categories to BigCommerce
     *
     * @param Category ...$categories
     * @return \Maverickslab\Integration\BigCommerce\Store\Model\Category[]
     */
    public function export(Category ...$categories): array
    {
        $promises = array_map(function (Category $category) {
            return $this->bigCommerce->category()->create($category->toBigCommerceEntity());
        }, $categories);
        
        $responses = $this->bigCommerce->category()
            ->resolvePromises($promises)
            ->wait();
        
        $exportedCategories = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            $exportedCategories[] = Category::fromBigCommerce($responseData->data);
        }
        
        return $exportedCategories;
    }

    /**
     * Updates a collection of categories on BigCommerce
     *
     * @param Category ...$categories
     * @return Category[]
     */
    public function exportUpdate(Category ...$categories): array
    {
        $promises = array_map(function (Category $category) {
            return $this->bigCommerce->category()->update($category->getId(), $category->toBigCommerceEntity());
        }, $categories);
        
        $responses = $this->bigCommerce->category()
            ->resolvePromises($promises)
            ->wait();
        
        return array_map(function (Response $response) {
            $responseData = $this->decodeResponse($response);
            
            return Category::fromBigCommerce($responseData->data);
        }, $responses);
    }

    /**
     * Saves a collection categories locally
     *
     * @param Category ...$categories
     * @return Category[]
     */
    public function save(Category ...$categories): array
    {
        return $this->repositoryWriter->createCategories(...$categories);
    }

    /**
     * Updates a collection of categories locally
     *
     * @param Category ...$categories
     * @return Category[]
     */
    public function update(Category ...$categories): array
    {
        return $this->repositoryWriter->updateCategories(...$categories);
    }
}