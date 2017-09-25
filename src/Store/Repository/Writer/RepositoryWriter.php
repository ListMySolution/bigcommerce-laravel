<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Repository\Writer;

use Maverickslab\Integration\BigCommerce\Store\Model\Category;
use Maverickslab\Integration\BigCommerce\Store\Model\Customer;
use Maverickslab\Integration\BigCommerce\Store\Model\Merchant;
use Maverickslab\Integration\BigCommerce\Store\Model\Order;
use Maverickslab\Integration\BigCommerce\Store\Model\Product;

/**
 * Repository writer
 *
 * @author cosman
 *        
 */
class RepositoryWriter implements RepositoryWriterInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::updateOrders()
     */
    public function updateOrders(Order ...$orders): array
    {
        return $orders;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::createCustomers()
     */
    public function createCustomers(Customer ...$customers): array
    {
        return $customers;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::updateProducts()
     */
    public function updateProducts(Product ...$products): array
    {
        return $products;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::createOrders()
     */
    public function createOrders(Order ...$orders): array
    {
        return $orders;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::updateCustomers()
     */
    public function updateCustomers(Customer ...$customers): array
    {
        return $customers;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::updateCategories()
     */
    public function updateCategories(Category ...$categories): array
    {
        return $categories;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::createProducts()
     */
    public function createProducts(Product ...$products): array
    {
        return $products;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::createCategories()
     */
    public function createCategories(Category ...$categories): array
    {
        return $categories;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::updateMerchant()
     */
    public function updateMerchant(Merchant $merchant): Merchant
    {
        return $merchant;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::fetchOrders()
     */
    public function fetchOrders(): array
    {
        return [];
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::fetchCustomers()
     */
    public function fetchCustomers(): array
    {
        return [];
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::fetchCategories()
     */
    public function fetchCategories(): array
    {
        return [];
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface::fetchProducts()
     */
    public function fetchProducts(): array
    {
        return [];
    }
}