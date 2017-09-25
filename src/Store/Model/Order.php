<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * Order model
 *
 * @author cosman
 *        
 */
class Order extends BaseModel
{

    /**
     *
     * @var int
     */
    protected $id;

    /**
     *
     * @var int
     */
    protected $customer_id;

    /**
     *
     * @var \DateTime
     */
    protected $date_created;

    /**
     *
     * @var \DateTime
     */
    protected $date_modified;

    /**
     *
     * @var \DateTime
     */
    protected $date_shipped;

    /**
     *
     * @var int
     */
    protected $status_id;

    /**
     *
     * @var string
     */
    protected $status;

    /**
     *
     * @var string
     */
    protected $custom_status;

    /**
     *
     * @var float
     */
    protected $subtotal_ex_tax;

    /**
     *
     * @var float
     */
    protected $subtotal_inc_tax;

    /**
     *
     * @var float
     */
    protected $subtotal_tax;

    /**
     *
     * @var float
     */
    protected $base_shipping_cost;
    
    /**
     * 
     * @var float
     */
    protected $shipping_cost_ex_tax;

    /**
     * Returns order Id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets order Id
     *
     * @param int $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        
        return $this;
    }
}