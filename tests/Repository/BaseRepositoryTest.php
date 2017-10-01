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
use GuzzleHttp\Psr7\Response;

class BaseRepositoryTest extends TestCase
{

    /**
     *
     * @var array
     */
    protected $responseHeaders = array(
        'Content-Type' => 'application/json'
    );

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

    /**
     * Decodes json content of a given response
     *
     * @param Response $response
     * @return \stdClass|NULL
     */
    protected function responseToJson(Response $response = null): ?\stdClass
    {
        $json = null;
        
        if (null !== $response) {
            $json = json_decode($response->getBody()->getContents());
        }
        
        return $json;
    }

    /**
     *
     * @param string $file
     * @return string
     */
    protected function readResponseFile(string $file): string
    {
        return file_get_contents(dirname(__DIR__) . '/responses/' . $file);
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