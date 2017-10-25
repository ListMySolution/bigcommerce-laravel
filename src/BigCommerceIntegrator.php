<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce;

use Maverickslab\Integration\BigCommerce\Store\Repository\ {
    MerchantRepository,
    ProductRepository,
    ProductCategoryRepository,
    OrderRepository,
    CustomerRepository
};
use Maverickslab\BigCommerce\BigCommerce;
use Maverickslab\BigCommerce\Http\Client\BigCommerceHttpClient;
use Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface;

/**
 *
 * @author cosman
 *        
 */
class BigCommerceIntegrator
{

    /**
     *
     * @var MerchantRepository
     */
    protected $merchantRepository;

    /**
     *
     * @var ProductCategoryRepository
     */
    protected $categoryRepository;

    /**
     *
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     *
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     *
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     *
     * @param string $authToken
     * @param string $clientId
     * @param string $clientSecret
     * @param string $storeId
     * @param RepositoryWriterInterface $repositoryWriter
     */
    public function __construct(string $authToken, string $clientId, string $clientSecret, string $storeId, RepositoryWriterInterface $repositoryWriter = null)
    {
        $bigCommerceHttpClient = new BigCommerceHttpClient($authToken, $clientId, $clientSecret, $storeId);
        $bigCommerceApi = new BigCommerce($bigCommerceHttpClient);
        
        $this->merchantRepository = new MerchantRepository($bigCommerceApi, $repositoryWriter);
        $this->categoryRepository = new ProductCategoryRepository($bigCommerceApi, $repositoryWriter);
        $this->productRepository = new ProductRepository($bigCommerceApi, $repositoryWriter);
        $this->orderRepository = new OrderRepository($bigCommerceApi, $repositoryWriter);
        $this->customerRepository = new CustomerRepository($bigCommerceApi, $repositoryWriter);
    }

    /**
     * Creates a new instance statically
     * 
     * @param string $authToken
     * @param string $clientId
     * @param string $clientSecret
     * @param string $storeId
     * @param RepositoryWriterInterface $repositoryWriter
     * @return \Maverickslab\Integration\BigCommerce\BigCommerceIntegrator
     */
    public function createInstance(string $authToken, string $clientId, string $clientSecret, string $storeId, RepositoryWriterInterface $repositoryWriter = null)
    {
        return new static($authToken, $clientId, $clientSecret, $storeId, $repositoryWriter);
    }

    /**
     *
     * @return MerchantRepository
     */
    public function merchant(): MerchantRepository
    {
        return $this->merchantRepository;
    }

    /**
     *
     * @return ProductCategoryRepository
     */
    public function category(): ProductCategoryRepository
    {
        return $this->categoryRepository;
    }

    /**
     *
     * @return ProductRepository
     */
    public function product(): ProductRepository
    {
        return $this->productRepository;
    }

    /**
     *
     * @return OrderRepository
     */
    public function order(): OrderRepository
    {
        return $this->orderRepository;
    }

    /**
     *
     * @return CustomerRepository
     */
    public function customer(): CustomerRepository
    {
        return $this->customerRepository;
    }
}