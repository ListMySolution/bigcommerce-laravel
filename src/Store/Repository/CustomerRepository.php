<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository;

use Maverickslab\Integration\BigCommerce\Store\Model\Customer;

/**
 * Customer repository
 *
 * @author cosman
 *        
 */
class CustomerRepository extends BaseRepository
{

    /**
     * Imports all customer from a store on BigCommerce
     *
     * @return Customer[]
     */
    public function import(): array
    {
        $page = 1;
        $totalPages = 0;
        $limit = 1000;
        $customers = [];
        
        do {
            $response = $this->bigCommerce->customer()
                ->fetch($page ++, $limit)
                ->wait();
            
            $responseData = $this->decodeResponse($response);
            $totalPages = $responseData->meta->pagination->total_pages;
            
            if (is_array($responseData->data)) {
                foreach ($responseData->data as $customerModel) {
                    $customers[] = Customer::fromBigCommerce($customerModel);
                }
            }
        } while ($page <= $totalPages);
        
        return $customers;
    }

    /**
     * Exports a collection of customers to BigCommerce
     *
     * @param Customer ...$customers
     * @return Customer[]
     */
    public function export(Customer ...$customers): array
    {
        $promises = array_map(function (Customer $customer) {
            return $this->bigCommerce->customer()->create($customer->toBigCommerceEntity());
        }, $customers);
        
        $responses = $this->bigCommerce->customer()
            ->resolvePromises($promises)
            ->wait();
        
        $exportedCustomers = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            $exportedCustomers[] = Customer::fromBigCommerce($responseData->data);
        }
        
        return $exportedCustomers;
    }

    /**
     * Updates a collection of customer on BigCommerce
     *
     * @param Customer ...$customers
     * @return Customer[]
     */
    public function exportUpdate(Customer ...$customers): array
    {
        $promises = array_map(function (Customer $customer) {
            return $this->bigCommerce->customer()->update($customer->getId(), $customer->toBigCommerceEntity());
        }, $customers);
        
        $responses = $this->bigCommerce->customer()
            ->resolvePromises($promises)
            ->wait();
        
        $customers = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            $customers[] = Customer::fromBigCommerce($responseData->data);
        }
        
        return $customers;
    }

    /**
     * Delete a collection of customer on BigCommerce
     *
     * @param Customer ...$customers
     * @return void
     */
    public function delete(Customer ...$customers): void
    {
        return $this->deleteByIds(array_map(function (Customer $customer) {
            return $customer->getId();
        }, $customers));
    }

    /**
     * Deletes customers on BigCommerce whose Ids are found in the given collection of Ids
     *
     * @param int ...$customerIds
     * @return void
     */
    public function deleteByIds(int ...$customerIds): void
    {
        $promises = array_map(function (int $customerId) {
            return $this->bigCommerce->customer()->deleteById($customerId);
        }, array_filter($customerIds));
        
        $this->bigCommerce->customer()
            ->resolvePromises($promises)
            ->wait();
    }
}