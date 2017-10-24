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
use Maverickslab\Integration\BigCommerce\Store\Model\ShippingAddress;
use Maverickslab\Integration\BigCommerce\Store\Model\OrderCoupon;

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
     * @param array $filters
     * @return Order[]
     */
    public function import(array $filters = []): array
    {
        return $this->importByFilters($filters);
    }

    /**
     * Imports a single order by Id
     *
     * @param int $id
     * @return Order|NULL
     */
    public function importById(int $id): ?Order
    {
        $filters = array(
            'min_id' => $id,
            'max_id' => $id
        );
        
        $orders = $this->importByFilters($filters);
        
        return count($orders) ? $orders[0] : null;
    }

    /**
     * Imports order between two dates
     *
     * @param DateTime $startDateTime
     * @param DateTime $endDateTime
     * @param array $additionalFilters
     * @return Order[]
     */
    public function importBetweenDates(DateTime $startDateTime, DateTime $endDateTime = null, array $additionalFilters = []): array
    {
        $filters = [];
        
        if (null !== $startDateTime) {
            $filters['min_date_created'] = $startDateTime->format(DateTime::RSS);
        }
        
        if (null === $endDateTime) {
            $endDateTime = new DateTime();
        }
        
        $filters['max_date_created'] = $endDateTime->format(DateTime::RSS);
        
        $filters = array_merge_recursive($filters, $additionalFilters);
        
        return $this->importByFilters($filters);
    }

    /**
     * Imports order from BigCommerce matching a given sets of filters
     *
     * @param array $filters
     * @return array
     */
    protected function importByFilters(array $filters = []): array
    {
        // DO NOT INCREASE THE VALUE FOR LIMIT, 250 IS THE MAXIMUM LIMIT SUPPORTED BY BIGCOMMERCE API V2
        $limit = 250;
        $orders = [];
        $page = 1;
        $itemsReturnedForCurrentRequest = 0;
        
        do {
            $currentOrders = $this->importByPage($page ++, $limit, $filters);
            
            foreach ($currentOrders as $order) {
                $orders[] = $order;
            }
            
            $itemsReturnedForCurrentRequest = count($currentOrders);
        } while ($limit == $itemsReturnedForCurrentRequest);
        
        return $orders;
    }

    /**
     * Imports orders at a given page
     *
     * @param int $page
     * @param int $limit
     * @param array $filters
     * @return Order[]
     */
    public function importByPage(int $page = 1, int $limit = 250, array $filters = []): array
    {
        $orders = [];
        
        $response = $this->bigCommerce->order()
            ->fetch($page, $limit, $filters)
            ->wait();
        
        $responseData = $this->decodeResponse($response);
        
        if (! is_array($responseData->data)) {
            return $orders;
        }
        
        $customerPromises = [];
        $productPromises = [];
        $shippingAddressPromises = [];
        $couponPromises = [];
        
        foreach ($responseData->data as $orderModel) {
            $order = Order::fromBigCommerce($orderModel);
            
            $orders[$order->getId()] = $order;
            // BIGCOMMERCE DOES NOT INCLUDE FULL CUSTOMER DETAILS AND PRODDUCTS IN ORDER REQUEST, SO WE HAVE TO FIND A WAY TO FETCH
            // THEM SUBSEQUENT REQUEST
            $customerPromises[$order->getId()] = $this->bigCommerce->customer()->fetchById($order->getCustomerId());
            
            $productPromises[$order->getId()] = $this->bigCommerce->order()->fetchOrderedProducts($order->getId(), 1, 250);
            
            $shippingAddressPromises[$order->getId()] = $this->bigCommerce->order()->fetchShippingAddresses($order->getId(), 1, 250);
            
            $couponPromises[$order->getId()] = $this->bigCommerce->order()->fetchCoupons($order->getId(), 1, 250);
        }
        
        $finalPromises = array(
            'customer' => $this->bigCommerce->customer()->resolvePromises($customerPromises),
            'products' => $this->bigCommerce->order()->resolvePromises($productPromises),
            'shippingAdresses' => $this->bigCommerce->order()->resolvePromises($shippingAddressPromises),
            'coupons' => $this->bigCommerce->order()->resolvePromises($couponPromises)
        );
        
        $finalResponses = $this->bigCommerce->order()
            ->resolvePromises($finalPromises)
            ->wait();
        
        foreach ($finalResponses as $name => $subResponseArray) {
            foreach ($subResponseArray as $orderId => $curReponse) {
                switch ($name) {
                    case 'customer':
                        $customerResponseData = $this->decodeResponse($curReponse);
                        $orders[$orderId]->setCustomer(Customer::fromBigCommerce($customerResponseData->data));
                        break;
                    case 'products':
                        $productResponseData = $this->decodeResponse($curReponse);
                        
                        if (is_array($productResponseData->data)) {
                            $products = array_map(function ($productModel) {
                                return OrderedProduct::fromBigCommerce($productModel);
                            }, $productResponseData->data);
                            
                            $orders[$orderId]->addProducts(...$products);
                        }
                        break;
                    case 'shippingAdresses':
                        $shippingAddressResponseData = $this->decodeResponse($curReponse);
                        
                        if (is_array($shippingAddressResponseData->data)) {
                            $shippingAddresses = array_map(function ($shippingAddressModel) {
                                return ShippingAddress::fromBigCommerce($shippingAddressModel);
                            }, $shippingAddressResponseData->data);
                            
                            $orders[$orderId]->addShippingAddresses(...$shippingAddresses);
                        }
                        break;
                    case 'coupons':
                        $couponResponseData = $this->decodeResponse($curReponse);
                        
                        if (is_array($couponResponseData->data)) {
                            $coupons = array_map(function ($couponModel) {
                                return OrderCoupon::fromBigCommerce($couponModel);
                            }, $couponResponseData->data);
                            
                            $orders[$orderId]->addCoupons(...$coupons);
                        }
                        break;
                }
            }
        }
        
        return array_values($orders);
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
     * Updates status for a collection of orders
     *
     * @param Order ...$orders
     * @return int Number of order updated
     */
    public function exportUpdateOrderStatus(Order ...$orders): int
    {
        $promises = [];
        
        foreach ($orders as $order) {
            if ($order->getId() && null !== $order->getStatusId()) {
                $promises[] = $this->bigCommerce->order()->update($order->getId(), array(
                    'status_id' => $order->getStatusId()
                ));
            }
        }
        
        $responses = $this->bigCommerce->order()
            ->resolvePromises($promises)
            ->wait();
        
        return count($responses);
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