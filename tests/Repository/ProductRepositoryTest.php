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
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile($responseFile)));
        }
        
        $products = $this->repository->import();
        
        $this->assertTrue(count($products) > 0);
        
        foreach ($products as $product) {
            $this->assertNotNull($product);
            
            $this->assertInstanceOf(Product::class, $product);
            
            $this->assertContainsOnlyInstancesOf(Category::class, $product->getCategories());
        }
    }

    public function productDataProvider(): array
    {
        $this->setUp();
        
        $responseFile = 'product/list.json';
        
        $products = [];
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile($responseFile)));
        
        $productListInfo = json_decode($this->readResponseFile($responseFile));
        
        $productCounts = count($productListInfo->data);
        
        for ($counter = 0; $counter < $productCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile($responseFile)));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile($responseFile)));
        }
        
        return array_map(function (Product $product) {
            return [
                $product
            ];
        }, $this->repository->import());
        
    }

    /**
     * @dataProvider productDataProvider
     *
     * @param Product $product
     */
    public function testExport(?Product $product)
    {
        $this->assertNotNull($product);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('product/fetch-one.json')));
        
        for ($counter = 0; $counter <= count($product->getImages()); $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('image/create.json')));
        }
        
        $exportedProducts = [];
        
        $this->assertCount(0, $exportedProducts);
        
        $exportedProducts = $this->repository->export($product);
        
        $this->assertCount(1, $exportedProducts);
        
        $this->assertInstanceOf(Product::class, $exportedProducts[0]);
    }

    /**
     * @dataProvider productDataProvider
     *
     * @param Product $product
     */
    public function testExportUpdate(?Product $product)
    {
        $this->assertNotNull($product);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('product/fetch-one.json')));
        
        for ($counter = 0; $counter <= count($product->getImages()); $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('image/create.json')));
        }
        
        $exportedProducts = [];
        
        $this->assertCount(0, $exportedProducts);
        
        $exportedProducts = $this->repository->exportUpdate($product);
        
        $this->assertCount(1, $exportedProducts);
        
        $this->assertInstanceOf(Product::class, $exportedProducts[0]);
    }

    /**
     * @dataProvider productDataProvider
     *
     * @param Product $product
     */
    public function testSave(?Product $product)
    {
        $this->assertNotNull($product);
        
        $savedProducts = [];
        
        $this->assertCount(0, $savedProducts);
        
        $savedProducts = $this->repository->save($product);
        
        $this->assertCount(1, $savedProducts);
        
        $this->assertInstanceOf(Product::class, $savedProducts[0]);
    }

    /**
     * @dataProvider productDataProvider
     *
     * @param Product $product
     */
    public function testUpdate(?Product $product)
    {
        $this->assertNotNull($product);
        
        $updatedProducts = [];
        
        $this->assertCount(0, $updatedProducts);
        
        $updatedProducts = $this->repository->update($product);
        
        $this->assertCount(1, $updatedProducts);
        
        $this->assertInstanceOf(Product::class, $updatedProducts[0]);
    }
}