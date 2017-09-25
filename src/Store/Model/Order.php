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
     * @var string
     */
    protected $date_created;

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