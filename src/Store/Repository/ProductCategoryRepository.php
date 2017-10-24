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
     * @param array $filters
     * @return Category[]
     */
    public function import(array $filters = []): array
    {
        $page = 1;
        $limit = 250;
        $categories = [];
        $itemsReturnedForCurrentRequest = 0;
        
        do {
            $currentCategories = $this->importByPage($page ++, $limit, $filters);
            
            $itemsReturnedForCurrentRequest = count($currentCategories);
            
            foreach ($currentCategories as $category) {
                $categories[] = $category;
            }
        } while ($limit == $itemsReturnedForCurrentRequest);
        
        return $categories;
    }

    /**
     * Imports orders at a given page
     *
     * @param int $page
     * @param int $limit
     * @param array $filters
     * @return Category[]
     */
    public function importByPage(int $page = 1, int $limit = 250, array $filters = []): array
    {
        $response = $this->bigCommerce->category()
            ->fetch($page, $limit, $filters)
            ->wait();
        
        $responseData = $this->decodeResponse($response);
        
        $categories = [];
        
        if (is_array($responseData->data)) {
            foreach ($responseData->data as $categoryModel) {
                $categories[] = Category::fromBigCommerce($categoryModel);
            }
        }
        
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
        $filteredCategories = array_filter($categories, function (Category $category) {
            return $category->getId();
        });
        
        $promises = array_map(function (Category $category) {
            return $this->bigCommerce->category()->update($category->getId(), $category->toBigCommerceEntity());
        }, $filteredCategories);
        
        $responses = $this->bigCommerce->category()
            ->resolvePromises($promises)
            ->wait();
        
        return array_map(function (Response $response) {
            $responseData = $this->decodeResponse($response);
            
            return Category::fromBigCommerce($responseData->data);
        }, $responses);
    }

    /**
     * Deletes categories by Id
     *
     * @param int $categoryIds
     * @return int
     */
    public function deleteByIds(int $categoryIds): int
    {
        $promises = array_map(function ($categoryId) {
            return $this->bigCommerce->category()->deleteById($categoryId);
        }, array_filter($categoryIds));
        
        $responses = $this->bigCommerce->category()
            ->resolvePromises($promises)
            ->wait();
        
        return count($responses);
    }

    /**
     * Deletes a collection of categories
     *
     * @param Category ...$categories
     * @return int
     */
    public function delete(Category ...$categories): int
    {
        $categoryIds = array_map(function (Category $category) {
            return $category->getId();
        }, $categories);
        
        return $this->deleteByIds($categoryIds);
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