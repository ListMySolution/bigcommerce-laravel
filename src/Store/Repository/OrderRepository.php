<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository;

use Maverickslab\Integration\BigCommerce\Store\Model\ {
    Customer,
    Order,
    OrderStatus,
    OrderedProduct
};
use DateTime;

/**
 * Order repository
 *
 * @author cosman
 *        
 */
class OrderRepository extends BaseRepository
{

    /**
     * Imports all order from BigCommerce
     *
     * @return Order[]
     */
    public function import(): array
    {
        return $this->importByFilters();
    }

    /**
     * Imports order between two dates
     *
     * @param DateTime $startDateTime
     * @param DateTime $endDateTime
     * @return Order[]
     */
    public function importBetweenDates(DateTime $startDateTime, DateTime $endDateTime = null): array
    {
        $filters = [];
        
        if (null !== $startDateTime) {
            $filters['min_date_created'] = $startDateTime->format(DateTime::RSS);
        }
        
        if (null === $endDateTime) {
            $endDateTime = new DateTime();
        }
        
        $filters['max_date_created'] = $endDateTime->format(DateTime::RSS);
        
        return $this->importByFilters($filters);
    }

    /**
     * Imports order from BigCommerce matching a given sets of filters
     *
     * @param array $filters
     * @return array
     */
    public function importByFilters(array $filters = []): array
    {
        // DO NOT INCREASE THE VALUE FOR LIMIT, 250 IS THE MAXIMUM LIMIT SUPPORTED BY BIGCOMMERCE API V2
        $limit = 250;
        $orders = [];
        $page = 1;
        $itemsReturnedForCurrentRequest = 0;
        $customerPromises = [];
        $productPromises = [];
        
        do {
            $response = $this->bigCommerce->order()
                ->fetch($page ++, $limit, $filters)
                ->wait();
            
            $responseData = $this->decodeResponse($response);
            
            if (is_array($responseData->data)) {
                $itemsReturnedForCurrentRequest = count($responseData->data);
                
                foreach ($responseData->data as $orderModel) {
                    $order = Order::fromBigCommerce($orderModel);
                    
                    $orders[$order->getId()] = $order;
                    // BIGCOMMERCE DOES NOT INCLUDE FULL CUSTOMER DETAILS AND PRODDUCTS IN ORDER REQUEST, SO WE HAVE TO FIND A WAY TO FETCH
                    // THEM SUBSEQUENT REQUEST
                    $customerPromises[$order->getId()] = $this->bigCommerce->customer()->fetchById($order->getCustomerId());
                    
                    $productPromises[$order->getId()] = $this->bigCommerce->order()->fetchOrderedProducts($order->getId(), 1, $limit);
                }
            } else {
                // A 204 - No content- may have been returned.
                // Break, assuming we have reach the end of the list
                break;
            }
        } while ($limit == $itemsReturnedForCurrentRequest);
        
        // FETCH CUSTOMERS FULL DETAILS
        $finalCustomerResponses = $this->bigCommerce->customer()->resolvePromises($customerPromises);
        
        $finalProductsPromises = $this->bigCommerce->order()->resolvePromises($productPromises);
        
        $finalResponses = $this->bigCommerce->order()
            ->resolvePromises([
            $finalCustomerResponses,
            $finalProductsPromises
        ])
            ->wait();
        
        foreach ($finalResponses[0] as $orderId => $customerResponse) {
            $customerResponseData = $this->decodeResponse($customerResponse);
            $orders[$orderId]->setCustomer(Customer::fromBigCommerce($customerResponseData->data));
        }
        
        foreach ($finalResponses[1] as $orderId => $productResponse) {
            $productResponseData = $this->decodeResponse($productResponse);
            
            if (is_array($productResponseData->data)) {
                $products = array_map(function ($productModel) {
                    return OrderedProduct::fromBigCommerce($productModel);
                }, $productResponseData->data);
                
                $orders[$orderId]->addProducts(...$products);
            }
        }
        
        return $orders;
    }

    /**
     * Updates a number of order on BigCommerce
     *
     * @param Order ...$orders
     * @return Order[]
     */
    public function exportUpdate(Order ...$orders): array
    {
        $promises = array_map(function (Order $order) {
            return $this->bigCommerce->order()->update($order->getId(), $order->toBigCommerceEntity());
        }, $orders);
        
        $responses = $this->bigCommerce->order()
            ->resolvePromises($promises)
            ->wait();
        
        $updatedOrders = [];
        
        foreach ($responses as $response) {
            $responseData = $this->decodeResponse($response);
            $updatedOrders[] = Order::fromBigCommerce($responseData->data);
        }
        
        return $updatedOrders;
    }

    /**
     * Imports all order statuses from BigCommerce
     *
     * @return OrderStatus[]
     */
    public function importStatuses(): array
    {
        $limit = 250;
        $statuses = [];
        $page = 1;
        $itemsReturnedForCurrentRequest = 0;
        
        do {
            $response = $this->bigCommerce->order()
                ->fetchOrderStatuses()
                ->wait();
            
            $responseData = $this->decodeResponse($response);
            
            if (is_array($responseData->data)) {
                $itemsReturnedForCurrentRequest = count($responseData->data);
                
                foreach ($responseData->data as $statusModel) {
                    $statuses[] = OrderStatus::fromBigCommerce($statusModel);
                }
            }
        } while ($limit === $itemsReturnedForCurrentRequest);
        
        return $statuses;
    }

    /**
     * Saves a number of order to local application database
     *
     * @param Order ...$orders
     * @return Order[]
     */
    public function save(Order ...$orders): array
    {
        return $this->repositoryWriter->createOrders(...$orders);
    }

    /**
     * Updates a number of order to local application database
     *
     * @param Order ...$orders
     * @return Order[]
     */
    public function update(Order ...$orders): array
    {
        return $this->repositoryWriter->updateOrders(...$orders);
    }
}