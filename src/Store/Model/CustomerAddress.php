<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * Customer address class
 *
 * @author cosman
 *        
 */
class CustomerAddress extends Address
{

    /**
     *
     * @var int
     */
    protected $customer_id;

    /**
     * Returns customer id
     *
     * @return int|NULL
     */
    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    /**
     * Returns customer id
     *
     * @param int $id
     * @return self
     */
    public function setCustomerId(?int $id): self
    {
        $this->customer_id = $id;
        
        return $this;
    }

    /**
     * Creates an instance of this class from a BigCommerce entity/model
     *
     * @param mixed $model
     * @return self
     */
    public static function fromBigCommerce($model = null)
    {
        $instance = parent::fromBigCommerce($model);
        
        $instance->setCustomerId((int) static::readAttribute($model, 'customer_id'));
        
        return $instance;
    }
}