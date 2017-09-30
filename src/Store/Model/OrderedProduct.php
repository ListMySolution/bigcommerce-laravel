<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use DateTime;

/**
 * This class represents an ordered product
 *
 * @author cosman
 *        
 */
class OrderedProduct extends BaseModel
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
    protected $order_id;

    /**
     *
     * @var int
     */
    protected $order_address_id;

    /**
     *
     * @var int
     */
    protected $product_id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $sku;

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @var float
     */
    protected $base_price;

    /**
     *
     * @var float
     */
    protected $price_ex_tax;

    /**
     *
     * @var float
     */
    protected $price_inc_tax;

    /**
     *
     * @var float
     */
    protected $price_tax;

    /**
     *
     * @var float
     */
    protected $base_total;

    /**
     *
     * @var float
     */
    protected $total_ex_tax;

    /**
     *
     * @var float
     */
    protected $total_inc_tax;

    /**
     *
     * @var float
     */
    protected $total_tax;

    /**
     *
     * @var float
     */
    protected $weight;

    /**
     *
     * @var int
     */
    protected $quantity;

    /**
     *
     * @var float
     */
    protected $base_cost_price;

    /**
     *
     * @var float
     */
    protected $cost_price_inc_tax;

    /**
     *
     * @var float
     */
    protected $cost_price_ex_tax;

    /**
     *
     * @var float
     */
    protected $cost_price_tax;

    /**
     *
     * @var bool
     */
    protected $is_refunded;

    /**
     *
     * @var int
     */
    protected $quantity_refunded;

    /**
     *
     * @var float
     */
    protected $refund_amount;

    /**
     *
     * @var int
     */
    protected $return_id;

    /**
     *
     * @var string
     */
    protected $wrapping_name;

    /**
     *
     * @var float
     */
    protected $base_wrapping_cost;

    /**
     *
     * @var float
     */
    protected $wrapping_cost_ex_tax;

    /**
     *
     * @var float
     */
    protected $wrapping_cost_inc_tax;

    /**
     *
     * @var float
     */
    protected $wrapping_cost_tax;

    /**
     *
     * @var string
     */
    protected $wrapping_message;

    /**
     *
     * @var int
     */
    protected $quantity_shipped;

    /**
     *
     * @var string
     */
    protected $event_name;

    /**
     *
     * @var DateTime
     */
    protected $event_date;

    /**
     *
     * @var float
     */
    protected $fixed_shipping_cost;

    /**
     *
     * @var string
     */
    protected $ebay_item_id;

    /**
     *
     * @var string
     */
    protected $ebay_transaction_id;

    /**
     *
     * @var int
     */
    protected $option_set_id;

    /**
     *
     * @var int
     */
    protected $parent_order_product_id;

    /**
     *
     * @var bool
     */
    protected $is_bundled_product;

    /**
     *
     * @var string
     */
    protected $bin_picking_number;

    /**
     *
     * @var int
     */
    protected $external_id;

    /**
     *
     * @var AppliedDiscount[]
     */
    protected $applied_discounts = [];

    /**
     *
     * @var ProductOption[]
     */
    protected $product_options = [];

    /**
     *
     * @var array
     */
    protected $configurable_fields = [];

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
        if ($id) {
            $this->id = $id;
        }
        
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
        if ($id) {
            $this->order_id = $id;
        }
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getOrderAddressId(): ?int
    {
        return $this->order_address_id;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setOrderAddressId(?int $id): self
    {
        if ($id) {
            $this->order_address_id = $id;
        }
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setProductId(?int $id): self
    {
        if ($id) {
            $this->product_id = $id;
        }
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     *
     * @param string $name
     * @return self
     */
    public function setOrderId(?string $name): self
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getSKU(): ?string
    {
        return $this->sku;
    }

    /**
     *
     * @param string $sku
     * @return self
     */
    public function setSKU(?string $sku): self
    {
        if ($sku) {
            $this->sku = $sku;
        }
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     *
     * @param string $type
     * @return self
     */
    public function setType(?string $type): self
    {
        if ($type) {
            $this->type = $type;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getBasePrice(): ?float
    {
        return $this->base_price;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setOrderId(?float $price): self
    {
        if ($price) {
            $this->base_price = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getPriceExcludingTax(): ?float
    {
        return $this->price_ex_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setPriceExcludingTax(?float $price): self
    {
        if ($price) {
            $this->price_ex_tax = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getPriceIncludingTax(): ?float
    {
        return $this->price_inc_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setPriceIncludingTax(?float $price): self
    {
        if ($price) {
            $this->price_inc_tax = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getPriceTax(): ?float
    {
        return $this->price_tax;
    }

    /**
     *
     * @param float $tax
     * @return self
     */
    public function setPriceTax(?float $tax): self
    {
        if ($tax) {
            $this->price_tax = $tax;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getBaseTotal(): ?float
    {
        return $this->base_total;
    }

    /**
     *
     * @param float $total
     * @return self
     */
    public function setBaseTotal(?float $total): self
    {
        if ($total) {
            $this->base_total = $total;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getTotalExcludingTax(): ?float
    {
        return $this->total_ex_tax;
    }

    /**
     *
     * @param float $total
     * @return self
     */
    public function setTotalExcludingTax(?float $total): self
    {
        if ($total) {
            $this->total_ex_tax = $total;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getTotalIncludingTax(): ?float
    {
        return $this->total_inc_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setTotalIncludingTax(?float $total): self
    {
        if ($total) {
            $this->total_inc_tax = $total;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getTotalTax(): ?float
    {
        return $this->total_tax;
    }

    /**
     *
     * @param float $tax
     * @return self
     */
    public function setTotalTax(?float $tax): self
    {
        if ($tax) {
            $this->total_tax = $tax;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setWeight(?float $weight): self
    {
        if ($weight) {
            $this->weight = $weight;
        }
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantity(?int $quantity): self
    {
        if ($quantity) {
            $this->quantity = $quantity;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getBaseCostPrice(): ?float
    {
        return $this->base_cost_price;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setBaseCostPrice(?float $price): self
    {
        if ($price) {
            $this->base_cost_price = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getCostPriceExcludingTax(): ?float
    {
        return $this->cost_price_ex_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setCostPriceExcludingTax(?float $price): self
    {
        if ($price) {
            $this->cost_price_ex_tax = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getCostPriceIncludingTax(): ?float
    {
        return $this->cost_price_inc_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setCostPriceIncluding(?float $price): self
    {
        if ($price) {
            $this->cost_price_inc_tax = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getCostPriceTax(): ?float
    {
        return $this->cost_price_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setCostPriceTax(?float $tax): self
    {
        if ($tax) {
            $this->cost_price_tax = $tax;
        }
        
        return $this;
    }

    /**
     *
     * @return bool|NULL
     */
    public function isRefunded(): ?bool
    {
        return $this->is_refunded;
    }

    /**
     *
     * @param bool $state
     * @return self
     */
    public function setIsRefunded(?bool $state): self
    {
        $this->is_refunded = $state;
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getQuantityRefunded(): ?int
    {
        return $this->quantity_refunded;
    }

    /**
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantityRefunded(?int $quantity): self
    {
        if ($quantity) {
            $this->quantity_refunded = $quantity;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getAmountRefunded(): ?float
    {
        return $this->refund_amount;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setAmountRefunded(?float $amount): self
    {
        if ($amount) {
            $this->refund_amount = $amount;
        }
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getReturnId(): ?int
    {
        return $this->return_id;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setReturnId(?int $id): self
    {
        if ($id) {
            $this->return_id = $id;
        }
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getWrappingName(): ?string
    {
        return $this->wrapping_name;
    }

    /**
     *
     * @param string $name
     * @return self
     */
    public function setWrappingName(?string $name): self
    {
        $this->wrapping_name = $name;
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getBaseWrappingCost(): ?float
    {
        return $this->base_wrapping_cost;
    }

    /**
     *
     * @param float $cost
     * @return self
     */
    public function setBaseWrappingCost(?float $cost): self
    {
        if ($cost) {
            $this->base_wrapping_cost = $cost;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getWrappingCostExcludingTax(): ?float
    {
        return $this->wrapping_cost_ex_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setWrappingCostExcludingTax(?float $price): self
    {
        if ($price) {
            $this->wrapping_cost_ex_tax = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getWrappingCostIncludingTax(): ?float
    {
        return $this->wrapping_cost_inc_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setWrappingCostIncludingTax(?float $price): self
    {
        if ($price) {
            $this->wrapping_cost_inc_tax = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getWrappingCostTax(): ?float
    {
        return $this->wrapping_cost_tax;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setWrappingCostTax(?float $price): self
    {
        if ($price) {
            $this->wrapping_cost_tax = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getWrappingMessage(): ?string
    {
        return $this->wrapping_message;
    }

    /**
     *
     * @param string $message
     * @return self
     */
    public function setWrappingMessage(?string $message): self
    {
        $this->base_price = $price;
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getQuantityShipped(): ?float
    {
        return $this->quantity_shipped;
    }

    /**
     *
     * @param int $quantity
     * @return self
     */
    public function setQuantityShipped(?int $quantity): self
    {
        if ($quantity) {
            $this->quantity_shipped = $quantity;
        }
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getEventName(): ?string
    {
        return $this->event_name;
    }

    /**
     *
     * @param string $name
     * @return self
     */
    public function setEventName(?string $name): self
    {
        $this->event_name = $name;
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getEventDate(): ?DateTime
    {
        return $this->event_date;
    }

    /**
     *
     * @param DateTime $price
     * @return self
     */
    public function setEventDate(?DateTime $date): self
    {
        $this->event_date = $date;
        
        return $this;
    }

    /**
     *
     * @return float|NULL
     */
    public function getFixedShippingCostPrice(): ?float
    {
        return $this->fixed_shipping_cost;
    }

    /**
     *
     * @param float $price
     * @return self
     */
    public function setFixedShippingCostPrice(?float $price): self
    {
        if ($price) {
            $this->fixed_shipping_cost = $price;
        }
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getEbayItemId(): ?string
    {
        return $this->ebay_item_id;
    }

    /**
     *
     * @param string $id
     * @return self
     */
    public function setEbayItemId(?string $id): self
    {
        $this->ebay_item_id = $id;
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getEbayTransactionId(): ?string
    {
        return $this->ebay_transaction_id;
    }

    /**
     *
     * @param string $id
     * @return self
     */
    public function setEbayTransactionId(?string $id): self
    {
        $this->ebay_transaction_id = $id;
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getOptionSetId(): ?int
    {
        return $this->option_set_id;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setOptionSetId(?int $id): self
    {
        if ($id) {
            $this->option_set_id = $id;
        }
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getParentOrderProductId(): ?int
    {
        return $this->parent_order_product_id;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setParentOrderProductId(?int $id): self
    {
        if ($id) {
            $this->parent_order_product_id = $id;
        }
        
        return $this;
    }

    /**
     *
     * @return bool|NULL
     */
    public function isBundledProduct(): ?float
    {
        return $this->is_bundled_product;
    }

    /**
     *
     * @param bool $state
     * @return self
     */
    public function setIsBundledProduct(?bool $state): self
    {
        $this->is_bundled_product = $state;
        
        return $this;
    }

    /**
     *
     * @return string|NULL
     */
    public function getBinKeepingNumber(): ?float
    {
        return $this->bin_picking_number;
    }

    /**
     *
     * @param string $binNumber
     * @return self
     */
    public function setBindKeepingNumber(?string $binNumber): self
    {
        $this->bin_picking_number = $binNumber;
        
        return $this;
    }

    /**
     *
     * @return int|NULL
     */
    public function getExternalId(): ?int
    {
        return $this->external_id;
    }

    /**
     *
     * @param int $id
     * @return self
     */
    public function setExternalId(?int $id): self
    {
        if ($id) {
            $this->external_id = $id;
        }
        
        return $this;
    }

    /**
     *
     * @return AppliedDiscount[]
     */
    public function getAppliedDiscounts(): array
    {
        return $this->applied_discounts;
    }

    /**
     *
     * @param AppliedDiscount ...$discount
     * @return self
     */
    public function addAppliedDiscounts(AppliedDiscount ...$discounts): self
    {
        foreach ($discounts as $discount) {
            $this->applied_discounts[] = $discount;
        }
        
        return $this;
    }

    /**
     *
     * @return ProductOption[]
     */
    public function getProductOptions(): array
    {
        return $this->product_options;
    }

    /**
     *
     * @param ProductOption ...$options
     * @return self
     */
    public function addProductOptions(ProductOption ...$options): self
    {
        foreach ($options as $option) {
            $this->product_options[] = $option;
        }
        
        return $this;
    }

    /**
     *
     * @return \stdClass[]
     */
    public function getConfiguration(): array
    {
        return $this->configurable_fields;
    }

    /**
     *
     * @param \stdClass ...$configurations
     * @return self
     */
    public function addConfigurations(\stdClass ...$configs): self
    {
        foreach ($configs as $config) {
            $this->configurable_fields[] = $config;
        }
        
        return $this;
    }
}