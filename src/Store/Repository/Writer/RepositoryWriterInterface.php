<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository\Writer;

use Maverickslab\Integration\BigCommerce\Store\Model\Product;
use Maverickslab\Integration\BigCommerce\Store\Model\Category;
use Maverickslab\Integration\BigCommerce\Store\Model\Order;
use Maverickslab\Integration\BigCommerce\Store\Model\Customer;
use Maverickslab\Integration\BigCommerce\Store\Model\Merchant;

/**
 *
 * @author cosman
 *        
 */
interface RepositoryWriterInterface
{

    /**
     * Writes a collection of new products to local database
     *
     * @param Product ...$products
     * @return Product[]
     */
    public function createProducts(Product ...$products): array;

    /**
     * Writes updates of a collection of products to local database
     *
     * @param Product ...$products
     * @return Product[]
     */
    public function updateProducts(Product ...$products): array;

    /**
     * Returns all products for a given store/merchant from the local database
     *
     * @return Product[]
     */
    public function fetchProducts(): array;

    /**
     * Creates a collection of new product categories to local database
     *
     * @param Category ...$categories
     * @return Category[]
     */
    public function createCategories(Category ...$categories): array;

    /**
     * Writes updates of a collection of categories to local database
     *
     * @param Category ...$categories
     * @return Category[]
     */
    public function updateCategories(Category ...$categories): array;

    /**
     * Returns all categories for a given store/merchant in the local database
     *
     * @return Category[]
     */
    public function fetchCategories(): array;

    /**
     * Writes a collection of new orders to local database
     *
     * @param Order ...$orders
     * @return Order
     */
    public function createOrders(Order ...$orders): array;

    /**
     * Writes updates of a collection of orders to local database
     *
     * @param Order ...$orders
     * @return Order[]
     */
    public function updateOrders(Order ...$orders): array;

    /**
     * Returns all orders for a store/merchant from local database
     *
     * @return Order[]
     */
    public function fetchOrders(): array;

    /**
     * Writes a collection of new customers to local database
     *
     * @param Customer ...$customers
     * @return Customer[]
     */
    public function createCustomers(Customer ...$customers): array;

    /**
     * Writes a updates of a collection of customers to local database
     *
     * @param Customer ...$customers
     * @return Customer[]
     */
    public function updateCustomers(Customer ...$customers): array;

    /**
     * Returns all customers for a store/merchant in local database
     *
     * @return array
     */
    public function fetchCustomers(): array;

    /**
     * Writes an update of a given merchant to local database
     *
     * @param Merchant $merchant
     * @return Merchant
     */
    public function updateMerchant(Merchant $merchant): Merchant;
}