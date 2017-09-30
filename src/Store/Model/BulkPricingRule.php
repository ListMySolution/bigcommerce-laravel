<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use Maverickslab\Integration\BigCommerce\Exception\BigCommerceIntegrationException;

/**
 * BulkPricingRule Model
 *
 * @author cosman
 *        
 */
class BulkPricingRule extends BaseModel
{

    const TYPE_PRICE = 'price';

    const TYPE_PERCENT = 'percent';

    const TYPE_FIXED = 'fixed';

    /**
     *
     * @var array
     */
    public static $types = array(
        self::TYPE_FIXED,
        self::TYPE_PERCENT,
        self::TYPE_PRICE
    );

    /**
     *
     * @var int
     */
    protected $quantity_min;

    /**
     *
     * @var int
     */
    protected $quantity_max;

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @var float
     */
    protected $amount;

    /**
     * Returns min quantity for rule
     *
     * @return int|NULL
     */
    public function getMinQuantity(): ?int
    {
        return $this->quantity_min;
    }

    /**
     * Sets min quantity for rule
     *
     * @param int $quantity
     * @return self
     */
    public function setMinQuantity(?int $quantity): self
    {
        $this->quantity_min;
        
        return $this;
    }

    /**
     * Returns max quantity for rule
     *
     * @return int|NULL
     */
    public function getMaxQuantity(): ?int
    {
        return $this->quantity_max;
    }

    /**
     * Sets max quantity for rule
     *
     * @param int $quantity
     * @return self
     */
    public function setMaxQuantity(?int $quantity): self
    {
        $this->quantity_max;
        
        return $this;
    }

    /**
     * Returns type of rule
     *
     * @return string|NULL
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets type of rule
     *
     * @param string $type
     * @return self
     */
    public function setType(?string $type): self
    {
        if (null !== $type && ! in_array($type, static::$types)) {
            throw new BigCommerceIntegrationException(sprintf('%s is not a valid bulk pricing type.', $type));
        }
        
        $this->type = $type;
        
        return $this;
    }

    /**
     * Returns amount
     *
     * @return float|NULL
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
     * Sets amount
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
            $instance->setAmount((float) static::readAttribute($model, 'amount'));
            $instance->setType(static::readAttribute($model, 'type'));
            $instance->setMinQuantity((int) static::readAttribute($model, 'quantity_min'));
            $instance->setMaxQuantity((int) static::readAttribute($model, 'quantity_max'));
        }
        
        return $instance;
    }
}