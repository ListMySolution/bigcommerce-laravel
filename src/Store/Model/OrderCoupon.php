<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 *
 * @author cosman
 *        
 */
class OrderCoupon extends BaseModel
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
    protected $coupon_id;

    /**
     *
     * @var int
     */
    protected $order_id;

    /**
     *
     * @var string
     */
    protected $code;

    /**
     *
     * @var float
     */
    protected $amount;

    /**
     *
     * @var int
     */
    protected $type;

    /**
     *
     * @var float
     */
    protected $discount;

    /**
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
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
     * @return int|NULL
     */
    public function getCouponId(): ?int
    {
        return $this->coupon_id;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setCouponId(?int $id): self
    {
        $this->coupon_id = $id;
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getOrderId(): ?int
    {
        return $this->order_id;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setOrderId(?int $id): self
    {
        $this->order_id = $id;
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     *
     * @param string $code
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;
        
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
     * @param float $id
     * @return self
     */
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setType(?int $type): self
    {
        $this->type = $type;
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     *
     * @param float $amount
     * @return self
     */
    public function setDiscount(?float $amount): self
    {
        $this->discount = $amount;
        
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
            $instance->setCouponId((int) static::readAttribute($model, 'coupon_id'));
            $instance->setOrderId((int) static::readAttribute($model, 'order_id'));
            $instance->setType((int) static::readAttribute($model, 'type'));
            $instance->setCode((string) static::readAttribute($model, 'code'));
            $instance->setAmount((float) static::readAttribute($model, 'amount'));
            $instance->setDiscount((float) static::readAttribute($model, 'discount'));
        }
        
        return $instance;
    }
}