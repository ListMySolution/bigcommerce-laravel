<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Tests\Repository;

use Maverickslab\Integration\BigCommerce\Store\Repository\OrderRepository;

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
}