<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

class ProductVariant extends BaseModel
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
    protected $product_id;

    /**
     *
     * @var string
     */
    protected $sku;

    /**
     *
     * @var int
     */
    protected $sku_id;

    /**
     *
     * @var float
     */
    protected $weight;

    /**
     *
     * @var float
     */
    protected $calculated_weight;

    /**
     *
     * @var float
     */
    protected $width;

    /**
     *
     * @var float
     */
    protected $depth;

    /**
     *
     * @var float
     */
    protected $height;

    /**
     *
     * @var float
     */
    protected $price;

    /**
     *
     * @var float
     */
    protected $calculated_price;

    /**
     *
     * @var float
     */
    protected $cost_price;

    /**
     *
     * @var float
     */
    protected $retail_price;

    /**
     *
     * @var float
     */
    protected $sale_price;

    /**
     *
     * @var string
     */
    protected $image_url;

    /**
     *
     * @var float
     */
    protected $fixed_cost_shipping_price;

    /**
     *
     * @var bool
     */
    protected $is_free_shipping;

    /**
     *
     * @var bool
     */
    protected $purchasing_disabled;

    /**
     *
     * @var string
     */
    protected $purchasing_disabled_message;

    /**
     *
     * @var string
     */
    protected $bin_picking_number;

    /**
     *
     * @var string
     */
    protected $upc;

    /**
     *
     * @var string
     */
    protected $mpn;

    /**
     *
     * @var string
     */
    protected $gtin;

    /**
     *
     * @var int
     */
    protected $inventory_level;

    /**
     *
     * @var int
     */
    protected $inventory_warning_level;

    /**
     *
     * @var ProductOptionValue[]
     */
    protected $option_values = [];

    /**
     * Returns Id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets Id
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
     * Sets product Id for this variant
     *
     * @param int $id
     * @return self
     */
    public function setProductId(?int $id): self
    {
        $this->product_id = $id;
        
        return $this;
    }

    /**
     * Returns product Id for this variant
     *
     * @return int|NULL
     */
    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    /**
     * Returns SKU
     *
     * @return string|NULL
     */
    public function getSKU(): ?string
    {
        return $this->sku;
    }

    /**
     * Sets SKU
     *
     * @param string $sku
     * @return self
     */
    public function setSKU(?string $sku): self
    {
        $this->sku = $sku;
        
        return $this;
    }

    /**
     * Returns SKU Id
     *
     * @return int|NULL
     */
    public function getSKUId(): ?int
    {
        return $this->sku_id;
    }

    /**
     * Sets SKU Id
     *
     * @param int $id
     * @return self
     */
    public function setSKUId(?int $id): self
    {
        $this->sku_id = $id;
        
        return $this;
    }

    /**
     * Returns product weight
     *
     * @return float|NULL
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * Sets product weight
     *
     * @param float $weight
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
     * Returns product calculated weight
     *
     * @return float|NULL
     */
    public function getCalculatedWeight(): ?float
    {
        return $this->calculated_weight;
    }

    /**
     * Sets product calculated weight
     *
     * @param float $weight
     * @return self
     */
    public function setCalculatedWeight(?float $weight): self
    {
        if ($weight) {
            $this->calculated_weight = $weight;
        }
        
        return $this;
    }

    /**
     * Returns product width
     *
     * @return float|NULL
     */
    public function getWidth(): ?float
    {
        return $this->width;
    }

    /**
     * Sets product width
     *
     * @param float $width
     * @return self
     */
    public function setWidth(?float $width): self
    {
        if ($width) {
            $this->width = $width;
        }
        
        return $this;
    }

    /**
     * Returns product height
     *
     * @return float|NULL
     */
    public function getHeight(): ?float
    {
        return $this->height;
    }

    /**
     * Sets product height
     *
     * @param float $height
     * @return self
     */
    public function setHeight(?float $height): self
    {
        if ($height) {
            $this->height = $height;
        }
        
        return $this;
    }

    /**
     * Returns product depth
     *
     * @return float|NULL
     */
    public function getDepth(): ?float
    {
        return $this->depth;
    }

    /**
     * Sets product depth
     *
     * @param float $depth
     * @return self
     */
    public function setDepth(?float $depth): self
    {
        if ($depth) {
            $this->depth = $depth;
        }
        
        return $this;
    }

    /**
     * Returns product price
     *
     * @return float|NULL
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * Sets product price
     *
     * @param float $price
     * @return self
     */
    public function setPrice(?float $price): self
    {
        if ($price) {
            $this->price = $price;
        }
        
        return $this;
    }

    /**
     * Returns product calculated price
     *
     * @return float|NULL
     */
    public function getCalculatedPrice(): ?float
    {
        return $this->calculated_price;
    }

    /**
     * Sets product calculated price
     *
     * @param float $price
     * @return self
     */
    public function setCalculatedPrice(?float $price): self
    {
        if ($price) {
            $this->calculated_price = $price;
        }
        
        return $this;
    }

    /**
     * Returns product cost price
     *
     * @return float|NULL
     */
    public function getCostPrice(): ?float
    {
        return $this->cost_price;
    }

    /**
     * Sets product cost price
     *
     * @param float $price
     * @return self
     */
    public function setCostPrice(?float $price): self
    {
        if ($price) {
            $this->cost_price = $price;
        }
        
        return $this;
    }

    /**
     * Returns product retail price
     *
     * @return float|NULL
     */
    public function getRetailPrice(): ?float
    {
        return $this->retail_price;
    }

    /**
     * Sets product retail price
     *
     * @param float $price
     * @return self
     */
    public function setRetailPrice(?float $price): self
    {
        if ($price) {
            $this->retail_price = $price;
        }
        
        return $this;
    }

    /**
     * Returns product sale price
     *
     * @return float|NULL
     */
    public function getSalePrice(): ?float
    {
        return $this->sale_price;
    }

    /**
     * Sets product sale price
     *
     * @param float $price
     * @return self
     */
    public function setSalePrice(?float $price): self
    {
        if ($price) {
            $this->sale_price = $price;
        }
        
        return $this;
    }

    /**
     * Returns image url
     *
     * @return string|NULL
     */
    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    /**
     * Sets image url
     *
     * @param string $src
     * @return self
     */
    public function setImageUrl(?string $src): self
    {
        $this->image_url = $src;
        
        return $this;
    }

    /**
     * Returns inventory level
     *
     * @return int|NULL
     */
    public function getInventoryLevel(): ?int
    {
        return $this->inventory_level;
    }

    /**
     * Sets product inventory level
     *
     * @param int $level
     * @return self
     */
    public function setInventoryLevel(?int $level): self
    {
        if ($level) {
            $this->inventory_level = $level;
        }
        
        return $this;
    }

    /**
     * Returns inventory warning level
     *
     * @return int|NULL
     */
    public function getInventoryWarningLevel(): ?int
    {
        return $this->inventory_warning_level;
    }

    /**
     * Sets inventory warning level
     *
     * @param int $warningLevel
     * @return self
     */
    public function setInventoryWarningLevel(?int $warningLevel): self
    {
        if ($warningLevel) {
            $this->inventory_warning_level = $warningLevel;
        }
        
        return $this;
    }

    /**
     * Returns fixed cost shipping price
     *
     * @return float|NULL
     */
    public function getFixedCostShippingPrice(): ?float
    {
        return $this->fixed_cost_shipping_price;
    }

    /**
     * Sets fixed cost shipping price
     *
     * @param float $price
     * @return self
     */
    public function setFixedCostShippingPrice(?float $price): self
    {
        if ($price) {
            $this->fixed_cost_shipping_price = $price;
        }
        
        return $this;
    }

    /**
     * Tells whether a product has free shipping option
     *
     * @return bool|NULL
     */
    public function isFreeShipping(): ?bool
    {
        return $this->is_free_shipping;
    }

    /**
     * Sets whether a product has a free shipping option
     *
     * @param bool $state
     * @return self
     */
    public function setIsFreeShipping(?bool $state): self
    {
        $this->is_free_shipping = $state;
        
        return $this;
    }

    /**
     * Return bin picking number
     *
     * @return string|NULL
     */
    public function getBinPickingNumber(): ?string
    {
        return $this->bin_picking_number;
    }

    /**
     * Sets bin picking number
     *
     * @param string $binNumber
     * @return self
     */
    public function setBinPickingNumber(?string $binNumber): self
    {
        $this->bin_picking_number = $binNumber;
        
        return $this;
    }

    /**
     * Returns product UPC
     *
     * @return string|NULL
     */
    public function getUPC(): ?string
    {
        return $this->upc;
    }

    /**
     * Sets product UPC
     *
     * @param string $upc
     * @return self
     */
    public function setUPC(?string $upc): self
    {
        $this->upc = $upc;
        
        return $this;
    }

    /**
     * Returns product MPN
     *
     * @return string|NULL
     */
    public function getMPN(): ?string
    {
        return $this->mpn;
    }

    /**
     * Sets product MPN
     *
     * @param string $mpn
     * @return self
     */
    public function setMPN(?string $mpn): self
    {
        $this->mpn = $mpn;
        
        return $this;
    }

    /**
     * Returns product GTIN
     *
     * @return string|NULL
     */
    public function getGTIN(): ?string
    {
        return $this->gtin;
    }

    /**
     * Sets product GTIN
     *
     * @param string $gtin
     * @return self
     */
    public function setGTIN(?string $gtin): self
    {
        $this->gtin = $gtin;
        
        return $this;
    }

    /**
     * Returns whether purchasing has been disabled for this variation
     *
     * @return bool|NULL
     */
    public function hasPurchasingDisabled(): ?bool
    {
        return $this->purchasing_disabled;
    }

    /**
     * Sets whether purchasing has been disabled for this variation
     *
     * @param bool $state
     * @return self
     */
    public function setHasPurchasingDisabled(?bool $state): self
    {
        $this->purchasing_disabled = $state;
        
        return $this;
    }

    /**
     * Returns message to display when purchaing is disabled for variant
     *
     * @return string|NULL
     */
    public function getPurchasingDisabledMessage(): ?string
    {
        return $this->purchasing_disabled_message;
    }

    /**
     * Sets message to show when purchasing is disabled for variant
     *
     * @param string $message
     * @return self
     */
    public function setPurchasingDisabledMessage(?string $message): self
    {
        $this->purchasing_disabled_message = $message;
        
        return $this;
    }

    /**
     * Returns variant option value
     *
     * @return array
     */
    public function getOptionValues(): array
    {
        return $this->option_values;
    }

    /**
     * Adds at least one option value to a variant
     *
     * @param ProductOptionValue ...$optionValues
     * @return self
     */
    public function addOptionValues(ProductOptionValue ...$optionValues): self
    {
        foreach ($optionValues as $optionValue) {
            $this->option_values[] = $optionValue;
        }
        
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
            
            $instance->setProductId((int) static::readAttribute($model, 'product_id'));
            $instance->setId((int) static::readAttribute($model, 'id'));
            $instance->setSKU(static::readAttribute($model, 'sku'));
            $instance->setSKUId(static::readAttribute($model, 'sku_id'));
            $instance->setMPN(static::readAttribute($model, 'mpn'));
            $instance->setGTIN(static::readAttribute($model, 'gtin'));
            $instance->setPrice((float) static::readAttribute($model, 'price', 0));
            $instance->setCalculatedPrice((float) static::readAttribute($model, 'calculated_price', 0));
            $instance->setCostPrice((float) static::readAttribute($model, 'cost_price', 0));
            $instance->setRetailPrice((float) static::readAttribute($model, 'retail_price', 0));
            $instance->setSalePrice((float) static::readAttribute($model, 'sale_price'));
            $instance->setWeight((float) static::readAttribute($model, 'weight', 0));
            $instance->setCalculatedWeight((float) static::readAttribute($model, 'calculated_weight', 0));
            $instance->setWidth((float) static::readAttribute($model, 'width', 0));
            $instance->setHeight((float) static::readAttribute($model, 'height', 0));
            $instance->setDepth((float) static::readAttribute($model, 'depth', 0));
            
            $instance->setInventoryLevel((int) static::readAttribute($model, 'inventory_level'));
            $instance->setInventoryWarningLevel((int) static::readAttribute($model, 'inventory_warning_level'));
            $instance->setFixedCostShippingPrice((float) static::readAttribute($model, 'fixed_cost_shipping_price'));
            $instance->setIsFreeShipping(true === static::readAttribute($model, 'is_free_shipping', false));
            $instance->setBinPickingNumber((string) static::readAttribute($model, 'bin_picking_number'));
            
            $instance->setImageUrl((string) static::readAttribute($model, 'image_url'));
            $instance->setHasPurchasingDisabled(true === static::readAttribute($model, 'purchasing_disabled', false));
            $instance->setPurchasingDisabledMessage((string) static::readAttribute($model, 'purchasing_disabled_message'));
            
            $optionValueModelArray = static::readAttribute($model, 'option_values', []);
            
            if (is_array($optionValueModelArray)) {
                $optionValues = array_map(function ($optionValueModel) {
                    return ProductOptionValue::fromBigCommerce($optionValueModel);
                }, $optionValueModelArray);
                
                $instance->addOptionValues(...$optionValues);
            }
        }
        
        return $instance;
    }
}