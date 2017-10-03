<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Tests\Repository;

use Maverickslab\Integration\BigCommerce\Store\Repository\ProductCategoryRepository;
use GuzzleHttp\Psr7\Response;
use Maverickslab\Integration\BigCommerce\Store\Model\Category;

class CategoryRepositoryTest extends BaseRepositoryTest
{

    /**
     *
     * @var ProductCategoryRepository
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
        
        $this->repository = new ProductCategoryRepository($this->bigCommerceApi, $this->repositoryWriter);
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
        $categories = [];
        
        $this->assertCount(0, $categories);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('category/list.json')));
        
        $categories = $this->repository->import();
        
        $this->assertTrue(is_array($categories));
        
        $this->assertTrue(count($categories) > 0);
        
        $this->assertContainsOnlyInstancesOf(Category::class, $categories);
    }

    public function categoryDataProvider(): array
    {
        $this->setUp();
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('category/list.json')));
        
        return array_map(function (Category $cateogy) {
            return [
                $cateogy
            ];
        }, $this->repository->import());
    }

    /**
     * @dataProvider categoryDataProvider
     *
     * @param Category $category
     */
    public function testExport(?Category $category)
    {
        $this->assertNotNull($category);
        
        $exportedCategorys = [];
        
        $this->assertCount(0, $exportedCategorys);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('category/create.json')));
        
        $exportedCategorys = $this->repository->export($category);
        
        $this->assertTrue(count($exportedCategorys) > 0);
        
        $this->assertInstanceOf(Category::class, $exportedCategorys[0]);
    }
    
    /**
     * @dataProvider categoryDataProvider
     *
     * @param Category $category
     */
    public function testExportUpdate(?Category $category)
    {
        $this->assertNotNull($category);
        
        $exportedCategorys = [];
        
        $this->assertCount(0, $exportedCategorys);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('category/update.json')));
        
        $exportedCategorys = $this->repository->exportUpdate($category);
        
        $this->assertTrue(count($exportedCategorys) > 0);
        
        $this->assertInstanceOf(Category::class, $exportedCategorys[0]);
    }
}