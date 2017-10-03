<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Tests\Repository;

use Maverickslab\Integration\BigCommerce\Store\Model\Customer;
use Maverickslab\Integration\BigCommerce\Store\Repository\CustomerRepository;
use GuzzleHttp\Psr7\Response;

class CustomerRepositoryTest extends BaseRepositoryTest
{

    /**
     *
     * @var CustomerRepository
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
        
        $this->repository = new CustomerRepository($this->bigCommerceApi, $this->repositoryWriter);
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
        $responseFile = 'customer/list.json';
        
        $customerData = json_decode($this->readResponseFile($responseFile));
        
        $customerCounts = count($customerData);
        
        $customers = [];
        
        $this->assertCount(0, $customers);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('customer/list.json')));
        
        for ($counter = 0; $counter < $customerCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('address/list.json')));
        }
        
        $customers = $this->repository->import();
        
        $this->assertTrue(count($customers) > 0);
        
        $this->assertContainsOnlyInstancesOf(Customer::class, $customers);
    }
}