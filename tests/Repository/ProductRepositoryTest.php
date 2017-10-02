<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Tests\Repository;

use Maverickslab\Integration\BigCommerce\Store\Repository\ProductRepository;
use GuzzleHttp\Psr7\Response;
use Maverickslab\Integration\BigCommerce\Store\Model\Product;
use Maverickslab\Integration\BigCommerce\Store\Model\Category;

class ProductRepositoryTest extends BaseRepositoryTest
{

    /**
     *
     * @var ProductRepository
     */
    protected $repository;

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Tests\Repository\BaseRepositoryTest::setUp()
     */
    public function setUp()
    {
        parent::setUp();
        
        $this->repository = new ProductRepository($this->bigCommerceApi, $this->repositoryWriter);
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Tests\Repository\BaseRepositoryTest::tearDown()
     */
    public function tearDown()
    {
        $this->repository = null;
        
        parent::tearDown();
    }

    public function testImport()
    {
        $responseFile = 'product/list.json';
        
        $products = [];
        
        $this->assertCount(0, $products);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile($responseFile)));
        
        $productListInfo = json_decode($this->readResponseFile($responseFile));
        
        $productCounts = count($productListInfo->data);
        
        for ($counter = 0; $counter < $productCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile($responseFile)));
        }
        
        $products = $this->repository->import();
        
        $this->assertTrue(count($products) > 0);
        
        foreach ($products as $product) {
            $this->assertNotNull($product);
            
            $this->assertInstanceOf(Product::class, $product);
            
            foreach ($product->getCategories() as $category) {
                $this->assertNotNull($category);
                $this->assertInstanceOf(Category::class, $category);
            }
        }
    }
}