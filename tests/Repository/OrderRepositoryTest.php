<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Tests\Repository;

use Maverickslab\Integration\BigCommerce\Store\Repository\OrderRepository;
use GuzzleHttp\Psr7\Response;
use Maverickslab\Integration\BigCommerce\Store\Model\Order;
use Maverickslab\Integration\BigCommerce\Store\Model\OrderStatus;

class OrderRepositoryTest extends BaseRepositoryTest
{

    /**
     *
     * @var OrderRepository
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
        
        $this->repository = new OrderRepository($this->bigCommerceApi, $this->repositoryWriter);
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
        $orders = [];
        
        $this->assertCount(0, $orders);
        
        $orderCounts = count(json_decode($this->readResponseFile('order/list.json')));
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/list.json')));
        
        for ($counter = 0; $counter < $orderCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('customer/fetch-one.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('product/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('address/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('coupon/list.json')));
        }
        
        $orders = $this->repository->import();
        
        $this->assertCount($orderCounts, $orders);
        
        foreach ($orders as $order) {
            $this->assertNotNull($order);
            $this->assertInstanceOf(Order::class, $order);
        }
    }

    public function testImportById()
    {
        $id = 103;
        
        $order = null;
        
        $this->assertNull($order);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/fetch-one.json')));
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('customer/fetch-one.json')));
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('product/list.json')));
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('address/list.json')));
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('coupon/list.json')));
        
        $order = $this->repository->importById($id);
        
        $this->assertNotNull($order);
        
        $this->assertInstanceOf(Order::class, $order);
        
        $this->assertEquals($id, $order->getId());
    }

    public function testImportStatuses()
    {
        $responseFile = 'order/statuses.json';
        $statusCounts = count(json_decode($this->readResponseFile($responseFile)));
        
        $statuses = [];
        
        $this->assertCount(0, $statuses);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile($responseFile)));
        
        $statuses = $this->repository->importStatuses();
        
        $this->assertCount($statusCounts, $statuses);
        
        foreach ($statuses as $status) {
            $this->assertNotNull($status);
            $this->assertInstanceOf(OrderStatus::class, $status);
        }
    }

    public function testImportBetweenDates()
    {
        $orders = [];
        
        $this->assertCount(0, $orders);
        
        $orderCounts = count(json_decode($this->readResponseFile('order/list.json')));
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/list.json')));
        
        for ($counter = 0; $counter < $orderCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('customer/fetch-one.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('product/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('address/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('coupon/list.json')));
        }
        
        $startDate = new \DateTime('Fri, 22 Aug 2014 06:25:36 +0000');
        $endDate = new \DateTime();
        
        $orders = $this->repository->importBetweenDates($startDate, $endDate);
        
        $this->assertCount($orderCounts, $orders);
        
        foreach ($orders as $order) {
            $this->assertNotNull($order);
            $this->assertInstanceOf(Order::class, $order);
        }
    }

    public function testImportByFilters()
    {
        $orders = [];
        
        $this->assertCount(0, $orders);
        
        $orderCounts = count(json_decode($this->readResponseFile('order/list.json')));
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/list.json')));
        
        for ($counter = 0; $counter < $orderCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('customer/fetch-one.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('product/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('address/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('coupon/list.json')));
        }
        
        $filters = array(
            'min_date_created' => 'Fri, 22 Aug 2014 06:25:36 +0000',
            'status_id' => 1,
            'min_total' => 100
        );
        
        $orders = $this->repository->importByFilters($filters);
        
        $this->assertCount($orderCounts, $orders);
        
        foreach ($orders as $order) {
            $this->assertNotNull($order);
            $this->assertInstanceOf(Order::class, $order);
        }
    }

    public function orderDataProvider(): array
    {
        $this->setUp();
        $orderCounts = count(json_decode($this->readResponseFile('order/list.json')));
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/list.json')));
        
        for ($counter = 0; $counter < $orderCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('customer/fetch-one.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('product/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('address/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('coupon/list.json')));
        }
        
        return array_map(function (Order $order) {
            return array(
                $order
            );
        }, $this->repository->import());
    }

    /**
     * @dataProvider orderDataProvider
     *
     * @param Order $order
     */
    public function testExportUpdate(?Order $order)
    {
        $this->assertNotNull($order);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/update.json')));
        
        $updatedOrders = $this->repository->exportUpdate($order);
        
        $this->assertCount(1, $updatedOrders);
        
        $this->assertInstanceOf(Order::class, $updatedOrders[0]);
    }

    public function testExportUpdateMany()
    {
        $orderCounts = count(json_decode($this->readResponseFile('order/list.json')));
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/list.json')));
        
        for ($counter = 0; $counter < $orderCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('customer/fetch-one.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('product/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('address/list.json')));
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('coupon/list.json')));
        }
        
        $orders = $this->repository->import();
        
        for ($counter = 0; $counter < $orderCounts; $counter ++) {
            $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('customer/fetch-one.json')));
        }
        
        $updatedOrders = $this->repository->exportUpdate(...$orders);
        
        $this->assertCount($orderCounts, $updatedOrders);
        
        foreach ($updatedOrders as $order) {
            $this->assertNotNull($order);
            $this->assertInstanceOf(Order::class, $order);
        }
    }

    /**
     * @dataProvider orderDataProvider
     * 
     * @param Order $order
     */
    public function testSave(?Order $order)
    {
        $this->assertNotNull($order);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/update.json')));
        
        $savedOrders = $this->repository->save($order);
        
        $this->assertCount(1, $savedOrders);
        
        $this->assertInstanceOf(Order::class, $savedOrders[0]);
    }
    
    /**
     * @dataProvider orderDataProvider
     *
     * @param Order $order
     */
    public function testUpdate(?Order $order)
    {
        $this->assertNotNull($order);
        
        $this->mockHandler->append(new Response(200, $this->responseHeaders, $this->readResponseFile('order/update.json')));
        
        $updatedOrders = $this->repository->update($order);
        
        $this->assertCount(1, $updatedOrders);
        
        $this->assertInstanceOf(Order::class, $updatedOrders[0]);
    }
    
}