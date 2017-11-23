<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 *
 * @author cosman
 *        
 */
class ShippingAddress extends Address
{

    /**
     *
     * @var int
     */
    protected $order_id;

    /**
     *
     * @var int
     */
    protected $items_total;

    /**
     *
     * @var int
     */
    protected $items_shipped;

    /**
     *
     * @var string
     */
    protected $shipping_method;

    /**
     *
     * @var float
     */
    protected $base_cost;

    /**
     *
     * @var float
     */
    protected $cost_ex_tax;

    /**
     *
     * @var float
     */
    protected $cost_inc_tax;

    /**
     *
     * @var float
     */
    protected $cost_tax;

    /**
     *
     * @var int
     */
    protected $cost_tax_class_id;

    /**
     *
     * @var float
     */
    protected $base_handling_cost;

    /**
     *
     * @var float
     */
    protected $handling_cost_ex_tax;

    /**
     *
     * @var float
     */
    protected $handling_cost_inc_tax;

    /**
     *
     * @var float
     */
    protected $handling_cost_tax;

    /**
     *
     * @var int
     */
    protected $handling_cost_tax_class_id;

    /**
     *
     * @var int
     */
    protected $shipping_zone_id;

    /**
     *
     * @var string
     */
    protected $shipping_zone_name;

    /**
     * Returns order id for shipping address
     *
     * @return int|NULL
     */
    public function getOrderId(): ?int
    {
        return $this->order_id;
    }

    /**
     * Set order Id for shipping address
     *
     * @param int $orderId
     * @return self
     */
    public function setOrderId(?int $orderId): self
    {
        $this->order_id = $orderId;
        
        return $this;
    }

    /**
     * Returns total number of items
     *
     * @return int|NULL
     */
    public function getItemsTotal(): ?int
    {
        return $this->items_total;
    }

    /**
     * Set total number of items for shipping address
     *
     * @param int $total
     * @return self
     */
    public function setItemsTotal(?int $total): self
    {
        $this->items_total = $total;
        
        return $this;
    }

    /**
     * Returns number of items shipped
     *
     * @return int|NULL
     */
    public function getItemsShipped(): ?int
    {
        return $this->items_shipped;
    }

    /**
     * Sets number of items shipped
     *
     * @param int $total
     * @return self
     */
    public function setItemsShipped(?int $total): self
    {
        $this->items_shipped = $total;
        
        return $this;
    }

    /**
     * Returns shipping method
     *
     * @return int|NULL
     */
    public function getShippingMethod(): ?int
    {
        return $this->shipping_method;
    }

    /**
     * Sets shipping method
     *
     * @param string $method
     * @return self
     */
    public function setShippingMethod(?string $method): self
    {
        $this->shipping_method = $method;
        
        return $this;
    }

    /**
     * Returns base cost
     *
     * @return float|NULL
     */
    public function getBaseCost(): ?float
    {
        return $this->base_cost;
    }

    /**
     * Sets base cost
     *
     * @param float $cost
     * @return self
     */
    public function setBaseCost(?float $cost): self
    {
        $this->base_cost = $cost;
        
        return $this;
    }

    /**
     * Returns cost excluding tax
     *
     * @return float|NULL
     */
    public function getCostExcludingTax(): ?float
    {
        return $this->cost_ex_tax;
    }

    /**
     * Sets cost excluding tax
     *
     * @param float $cost
     * @return self
     */
    public function setCostExcludingTax(?float $cost): self
    {
        $this->cost_ex_tax = $cost;
        
        return $this;
    }

    /**
     * Returns cost including tax
     *
     * @return float|NULL
     */
    public function getCostIncludingTax(): ?float
    {
        return $this->cost_inc_tax;
    }

    /**
     * Sets cost including tax
     *
     * @param float $cost
     * @return self
     */
    public function setCostIncludingTax(?float $cost): self
    {
        $this->cost_inc_tax = $cost;
        
        return $this;
    }

    /**
     * Returns cost tax
     *
     * @return float|NULL
     */
    public function getCostTax(): ?float
    {
        return $this->cost_tax;
    }

    /**
     * Sets cost tax
     *
     * @param float $tax
     * @return self
     */
    public function setCostTax(?float $tax): self
    {
        $this->cost_tax = $tax;
        
        return $this;
    }

    /**
     * Returns cost tax class id
     *
     * @return int|NULL
     */
    public function getCostTaxClassId(): ?int
    {
        return $this->cost_tax_class_id;
    }

    /**
     * Sets cost tax class id
     *
     * @param int $id
     * @return self
     */
    public function setCostTaxClassId(?int $id): self
    {
        $this->cost_tax_class_id = $id;
        
        return $this;
    }

    /**
     * Returns base handling cost
     *
     * @return float|NULL
     */
    public function getBaseHandlingCost(): ?float
    {
        return $this->base_handling_cost;
    }

    /**
     * Sets base handling cost
     *
     * @param float $cost
     * @return self
     */
    public function setBaseHandlingCost(?float $cost): self
    {
        $this->base_handling_cost = $cost;
        
        return $this;
    }

    /**
     * Returns handling cost excluding tax
     *
     * @return float|NULL
     */
    public function getHandlingCostExcludingTax(): ?float
    {
        return $this->handling_cost_ex_tax;
    }

    /**
     * Sets handling cost excluding tax
     *
     * @param float $cost
     * @return self
     */
    public function setHandlingCostExcludingTax(?float $cost): self
    {
        $this->handling_cost_ex_tax = $cost;
        
        return $this;
    }

    /**
     * Returns handling cost including tax
     *
     * @return float|NULL
     */
    public function getHandlingCostIncludingTax(): ?float
    {
        return $this->handling_cost_inc_tax;
    }

    /**
     * Sets handling cost including tax
     *
     * @param float $cost
     * @return self
     */
    public function setHandlingCostIncludingTax(?float $cost): self
    {
        $this->handling_cost_inc_tax = $cost;
        
        return $this;
    }

    /**
     * Returns handling cost tax
     *
     * @return float|NULL
     */
    public function getHandlingCostTax(): ?float
    {
        return $this->handling_cost_tax;
    }

    /**
     * Sets handling cost tax
     *
     * @param float $tax
     * @return self
     */
    public function setHandlingCostTax(?float $tax): self
    {
        $this->handling_cost_tax = $tax;
        
        return $this;
    }

    /**
     * Returns handling cost tax id
     *
     * @return int|NULL
     */
    public function getHandlingCostTaxClassId(): ?int
    {
        return $this->handling_cost_tax_class_id;
    }

    /**
     * Sets handling cost tax class id
     *
     * @param int $id
     * @return self
     */
    public function setHandlingCostTaxClassId(?int $id): self
    {
        $this->handling_cost_tax_class_id = $id;
        
        return $this;
    }

    /**
     * Returns shipping zone id
     *
     * @return int|NULL
     */
    public function getShippingZoneId(): ?int
    {
        return $this->shipping_zone_id;
    }

    /**
     * Sets shipping zone id
     *
     * @param int $id
     * @return self
     */
    public function setShippingZoneId(?int $id): self
    {
        $this->shipping_zone_id = $id;
        
        return $this;
    }

    /**
     * Returns shipping zone name
     *
     * @return string|NULL
     */
    public function getShippingZoneName(): ?string
    {
        return $this->shipping_zone_name;
    }

    /**
     * Returns shipping zone name
     *
     * @param string $name
     * @return self
     */
    public function setShippingZoneName(?string $name): self
    {
        $this->shipping_zone_name = $name;
        
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
        
        if (null !== $model) {
            $instance->setOrderId((int) static::readAttribute($model, 'order_id'));
            $instance->setEmail(static::readAttribute($model, 'email'));
            $instance->setItemsTotal((int) static::readAttribute($model, 'items_total'));
            $instance->setItemsShipped((int) static::readAttribute($model, 'items_shipped'));
            $instance->setShippingMethod(static::readAttribute($model, 'shipping_method'));
            $instance->setBaseCost((float) static::readAttribute($model, 'base_cost'));
            $instance->setCostExcludingTax((float) static::readAttribute($model, 'cost_ex_tax'));
            $instance->setCostIncludingTax((float) static::readAttribute($model, 'cost_inc_tax'));
            $instance->setCostTax((float) static::readAttribute($model, 'cost_tax'));
            $instance->setCostTaxClassId((int) static::readAttribute($model, 'cost_tax_class_id'));
            $instance->setBaseHandlingCost((float) static::readAttribute($model, 'base_handling_cost'));
            $instance->setHandlingCostExcludingTax((float) static::readAttribute($model, 'handling_cost_ex_tax'));
            $instance->setHandlingCostIncludingTax((float) static::readAttribute($model, 'handling_cost_inc_tax'));
            $instance->setHandlingCostTax((float) static::readAttribute($model, 'handling_cost_tax'));
            $instance->setHandlingCostTaxClassId((int) static::readAttribute($model, 'handling_cost_tax_class_id'));
            $instance->setShippingZoneId((int) static::readAttribute($model, 'shipping_zone_id'));
            $instance->setShippingZoneName(static::readAttribute($model, 'shipping_zone_name'));
        }
        
        return $instance;
    }
}