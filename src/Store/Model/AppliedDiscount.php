<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

class AppliedDiscount extends BaseModel
{

    /**
     *
     * @var int
     */
    protected $id;

    /**
     *
     * @var float
     */
    protected $amount;

    /**
     * Returns discount/coupon id
     *
     * @return int|NULL
     */
    public function getid(): ?int
    {
        return $this->id;
    }

    /**
     * Sets discount/coupon id
     * 
     * @param int $id
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     *
     * @param float $amount
     * @return self
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;
        
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
        $instance = new static();
        
        if (null !== $model) {
            $instance->setId((int) static::readAttribute($model, 'id'));
            $instance->setAmount((float) static::readAttribute($model, 'amount'));
        }
        
        return $instance;
    }
}