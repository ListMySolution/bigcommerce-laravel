<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository;

use Maverickslab\Integration\BigCommerce\Store\Model\ProductOption;

/**
 *
 * @author cosman
 *        
 */
class OptionRepository extends BaseRepository
{

    /**
     * Returns number of product options
     *
     * @return int
     */
    public function count(): int
    {
        $response = $this->bigCommerce->option()
            ->count()
            ->wait();
        
        $decodedResponse = $this->decodeResponse($response);
        
        return (int) $decodedResponse->data->count ?? 0;
    }

    /**
     * Imports options from BigCommerce matching a given sets of filters
     *
     * @param array $filters
     * @return \Maverickslab\Integration\BigCommerce\Store\Model\ProductOption[]
     */
    protected function importByFilters(array $filters = []): array
    {
        // DO NOT INCREASE THE VALUE FOR LIMIT, 250 IS THE MAXIMUM LIMIT SUPPORTED BY BIGCOMMERCE API V2
        $limit = 250;
        $options = [];
        $page = 1;
        $itemsReturnedForCurrentRequest = 0;
        
        do {
            $currentOptions = $this->importByPage($page ++, $limit, $filters);
            
            foreach ($currentOptions as $option) {
                $options[] = $option;
            }
            
            $itemsReturnedForCurrentRequest = count($currentOptions);
        } while ($limit == $itemsReturnedForCurrentRequest);
        
        return $option;
    }

    /**
     * Imports options at a given page
     *
     * @param int $page
     * @param int $limit
     * @param array $filters
     * @return \Maverickslab\Integration\BigCommerce\Store\Model\ProductOption[]
     */
    public function importByPage(int $page = 1, int $limit = 250, array $filters = []): array
    {
        $response = $this->bigCommerce->option()
            ->fetch($page, $limit, $filters)
            ->wait();
        
        $responseData = $this->decodeResponse($response);
        
        $options = [];
        
        if (is_array($responseData->data)) {
            foreach ($responseData->data as $optionModel) {
                $options[] = ProductOption::fromBigCommerce($optionModel);
            }
        }
        
        return $options;
    }

    /**
     * Creates a collection of option
     *
     * @param ProductOption ...$options
     * @return \Maverickslab\Integration\BigCommerce\Store\Model\ProductOption[]
     */
    public function export(ProductOption ...$options): array
    {
        $promises = [];
        
        foreach ($options as $option) {
            if ($option->getId()) {
                continue;
            }
            
            $promises[] = $this->bigCommerce->option()->create($option->toArray());
        }
        
        $responses = $this->bigCommerce->option()
            ->resolvePromises($promises)
            ->wait();
        
        $createdOptions = [];
        
        foreach ($responses as $response) {
            $decodedResponse = $this->decodeResponse($response);
            
            $createdOptions[] = ProductOption::fromBigCommerce($decodedResponse->data);
        }
        
        return $createdOptions;
    }

    /**
     * Updates a collection of option
     *
     * @param ProductOption ...$options
     * @return \Maverickslab\Integration\BigCommerce\Store\Model\ProductOption[]
     */
    public function exportUpdate(ProductOption ...$options): array
    {
        $promises = [];
        
        foreach ($options as $option) {
            if ($option->getId()) {
                $promises[] = $this->bigCommerce->option()->update($option->getId(), $option->toArray());
            }
        }
        
        $responses = $this->bigCommerce->option()
            ->resolvePromises($promises)
            ->wait();
        
        $updatedOptions = [];
        
        foreach ($responses as $response) {
            $decodedResponse = $this->decodeResponse($response);
            
            $updatedOptions[] = ProductOption::fromBigCommerce($decodedResponse->data);
        }
        
        return $updatedOptions;
    }

    /**
     * Deletes a collection of option
     *
     * @param ProductOption ...$options
     * @return int
     */
    public function delete(ProductOption ...$options): int
    {
        $optionIds = [];
        
        foreach ($options as $option) {
            if ($option->getId()) {
                $optionIds[] = $option->getId();
            }
        }
        
        $responses = $this->bigCommerce->option()
            ->delete(...$optionIds)
            ->wait();
        
        return is_array($responses) ? count($responses) : count($options);
    }
}