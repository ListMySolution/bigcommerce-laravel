<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Tests\Repository;

use Maverickslab\Integration\BigCommerce\Store\Repository\MerchantRepository;
use Maverickslab\Integration\BigCommerce\Store\Model\Merchant;
use GuzzleHttp\Psr7\Response;

class MerchantRepositoryTest extends BaseRepositoryTest
{

    /**
     *
     * @var MerchantRepository
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
        
        $this->repository = new MerchantRepository($this->bigCommerceApi, $this->repositoryWriter);
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

    public function testDetails()
    {
        $merchant = null;
        
        $this->assertNull($merchant);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('merchant/details.json')));
        
        $merchant = $this->repository->details();
        
        $this->assertNotNull($merchant);
        
        $this->assertInstanceOf(Merchant::class, $merchant);
    }
}