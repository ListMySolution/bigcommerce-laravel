<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce;

use Maverickslab\Integration\BigCommerce\Store\Repository\ {
    MerchantRepository,
    ProductRepository,
    ProductCategoryRepository,
    OrderRepository,
    CustomerRepository,
    OptionRepository
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
     * @var OptionRepository
     */
    protected $optionRepository;

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
        $this->optionRepository = new OptionRepository($bigCommerceApi, $repositoryWriter);
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
    public static function createInstance(string $authToken, string $clientId, string $clientSecret, string $storeId, RepositoryWriterInterface $repositoryWriter = null): self
    {
        return new static($authToken, $clientId, $clientSecret, $storeId, $repositoryWriter);
    }

    /**
     *
     * @return \Maverickslab\Integration\BigCommerce\Store\Repository\MerchantRepository
     */
    public function merchant(): MerchantRepository
    {
        return $this->merchantRepository;
    }

    /**
     *
     * @return \Maverickslab\Integration\BigCommerce\Store\Repository\ProductCategoryRepository
     */
    public function category(): ProductCategoryRepository
    {
        return $this->categoryRepository;
    }

    /**
     *
     * @return \Maverickslab\Integration\BigCommerce\Store\Repository\ProductRepository
     */
    public function product(): ProductRepository
    {
        return $this->productRepository;
    }

    /**
     *
     * @return \Maverickslab\Integration\BigCommerce\Store\Repository\OrderRepository
     */
    public function order(): OrderRepository
    {
        return $this->orderRepository;
    }

    /**
     *
     * @return \Maverickslab\Integration\BigCommerce\Store\Repository\CustomerRepository
     */
    public function customer(): CustomerRepository
    {
        return $this->customerRepository;
    }

    /**
     *
     * @return \Maverickslab\Integration\BigCommerce\Store\Repository\OptionRepository
     */
    public function option(): OptionRepository
    {
        return $this->optionRepository;
    }
}