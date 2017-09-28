<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

class ProductVariant extends Product
{

    /**
     *
     * @var int
     */
    protected $product_id;

    /**
     *
     * @var string
     */
    protected $image_url;

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
     * @var ProductOptionValue[]
     */
    protected $option_values = [];

    public function __construct()
    {
        parent::__construct();
        
        unset($this->type, $this->variants, $this->categories, $this->description, $this->name);
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
        $instance = parent::fromBigCommerce($model);
        
        if (null !== $model) {
            
            $instance->setProductId((int) static::readAttribute($model, 'product_id'));
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