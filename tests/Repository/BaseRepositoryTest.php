<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Tests\Repository;

use PHPUnit\Framework\TestCase;
use Maverickslab\BigCommerce\Http\Client\BigCommerceHttpClient;
use Maverickslab\BigCommerce\BigCommerce;
use Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriter;
use Maverickslab\Integration\BigCommerce\Store\Repository\Writer\RepositoryWriterInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;

class BaseRepositoryTest extends TestCase
{

    /**
     *
     * @var BigCommerce
     */
    protected $bigCommerceApi;

    /**
     *
     * @var RepositoryWriter
     */
    protected $repositoryWriter;

    /**
     *
     * @var MockHandler
     */
    protected $mockHandler;

    /**
     *
     * {@inheritdoc}
     * @see \PHPUnit\Framework\TestCase::setUp()
     */
    public function setUp()
    {
        $this->mockHandler = new MockHandler();
        
        $handler = HandlerStack::create($this->mockHandler);
        
        $config = array(
            'handler' => $handler
        );
        
        $accessToken = '';
        $clientId = '';
        $clientSecret = '';
        $storeId = '';
        
        $httpClient = new BigCommerceHttpClient($accessToken, $clientId, $clientSecret, $storeId, $config);
        
        $this->bigCommerceApi = new BigCommerce($httpClient);
        
        $this->repositoryWriter = new RepositoryWriter();
    }

    /**
     *
     * {@inheritdoc}
     * @see \PHPUnit\Framework\TestCase::tearDown()
     */
    public function tearDown()
    {
        $this->bigCommerceApi = null;
        
        $this->repositoryWriter = null;
        
        $this->mockHandler = null;
    }

    public function testBigCommerceClient()
    {
        $this->assertInstanceOf(BigCommerce::class, $this->bigCommerceApi);
    }

    public function testRepositoryWriter()
    {
        $this->assertInstanceOf(RepositoryWriterInterface::class, $this->repositoryWriter);
    }

    public function testHttpHandler()
    {
        $this->assertInstanceOf(MockHandler::class, $this->mockHandler);
    }
}