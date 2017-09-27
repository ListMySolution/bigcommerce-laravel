<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository;

use Maverickslab\Integration\BigCommerce\Store\Model\Order;
use Maverickslab\Integration\BigCommerce\Store\Model\Product;
use Maverickslab\Integration\BigCommerce\Store\Model\Customer;

/**
 * Order repository
 *
 * @author cosman
 *        
 */
class OrderRepository extends BaseRepository
{

    /**
     * Imports all order from BigCommerce (V3)
     *
     * @return Order[]
     */
    private function importV3(): array
    {
        // TODO: Change this method's visibility to PUBLIC and rename it to "import"
        $page = 1;
        $limit = 400;
        $totalPages = 0;
        
        $orders = [];
        
        do {
            $response = $this->bigCommerce->order()
                ->fetch($page ++, $limit)
                ->wait();
            
            $responseData = $this->decodeResponse($response);
            
            $totalPages = $responseData->meta->pagination->total_pages;
            
            if (is_array($responseData->data)) {
                foreach ($responseData->data as $orderModel) {
                    $orders[] = Order::fromBigCommerce($orderModel);
                }
            }
        } while ($page < $totalPages);
        
        return $orders;
    }

    /**
     * Imports all order from BigCommerce
     *
     * @return Order[]
     */
    public function import(): array
    {
        $page = 1;
        $limit = 500;
        $totalPages = 0;
        $orders = [];
        
        do {
            
            $promises = array(
                $this->bigCommerce->order()->fetch($page ++, $limit)
            );
            
            if (0 == $totalPages) {
                $promises[] = $this->bigCommerce->order()->count();
            }
            
            $responses = $this->bigCommerce->order()
                ->resolvePromises($promises)
                ->wait();
            
            if (2 === count($responses)) {
                
                $totalOrders = $this->decodeResponse($responses[1])->data->count;
                
                if (0 !== $totalOrders) {
                    $totalPages = ceil($totalOrders / $limit);
                }
            }
            
            $responseData = $this->decodeResponse($responses[0]);
            
            $customerPromises = [];
            
            if (is_array($responseData->data)) {
                foreach ($responseData->data as $orderModel) {
                    $order = Order::fromBigCommerce($orderModel);
                    $orderIds[] = $order->getId();
                    $orders[$order->getId()] = $order;
                    
                    // BigCommerce doesn't include customer details in the same request as the order itself, so we have to
                    // subsequest request for customer associated with a given order
                    $customerPromises[$order->getId()] = $this->bigCommerce->customer()->fetchById($order->getCustomerId());
                }
            }
            
            $customerResponses = $this->bigCommerce->customer()
                ->resolvePromises($customerPromises)
                ->wait();
            
            foreach ($customerResponses as $orderId => $customerResponse) {
                $customerResponseData = $this->decodeResponse($customerResponse);
                
                $orders[$orderId]->setCustomer(Customer::fromBigCommerce($customerResponseData->data));
            }
        } while ($page <= $totalPages);
        
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