<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 *
 * @author cosman
 *        
 */
class OrderedProductOption extends BaseModel
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
    protected $option_id;

    /**
     *
     * @var int
     */
    protected $order_product_id;

    /**
     *
     * @var int
     */
    protected $product_option_id;

    /**
     *
     * @var string
     */
    protected $display_name;

    /**
     *
     * @var string
     */
    protected $display_value;

    /**
     *
     * @var int
     */
    protected $value;

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $display_style;

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
     * Returns option Id
     *
     * @return int|NULL
     */
    public function getOptionId(): ?int
    {
        return $this->option_id;
    }

    /**
     * Sets option Id
     *
     * @param int $id
     * @return self
     */
    public function setOptionId(?int $id): self
    {
        $this->option_id = $id;
        
        return $this;
    }

    /**
     * Returns order product Id
     *
     * @return int|NULL
     */
    public function getOrderProductId(): ?int
    {
        return $this->order_product_id;
    }

    /**
     * Sets order product Id
     *
     * @param int $id
     * @return self
     */
    public function setOrderProductId(?int $id): self
    {
        $this->order_product_id = $id;
        
        return $this;
    }

    /**
     * Returns product option Id
     *
     * @return int|NULL
     */
    public function getProductOptionId(): ?int
    {
        return $this->product_option_id;
    }

    /**
     * Sets product option Id
     *
     * @param int $id
     * @return self
     */
    public function setProductOptionId(?int $id): self
    {
        $this->product_option_id = $id;
        
        return $this;
    }

    /**
     * Returns name
     *
     * @return string|NULL
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets name
     *
     * @param string $name
     * @return self
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * Returns display name
     *
     * @return string|NULL
     */
    public function getDisplayName(): ?string
    {
        return $this->display_name;
    }

    /**
     * Sets display name
     *
     * @param string $name
     * @return self
     */
    public function setDisplayName(?string $name): self
    {
        $this->display_name = $name;
        
        return $this;
    }

    /**
     * Returns display value
     *
     * @return string|NULL
     */
    public function getDisplayValue(): ?string
    {
        return $this->display_value;
    }

    /**
     * Sets display value
     *
     * @param string $value
     * @return self
     */
    public function setDisplayValue(?string $value): self
    {
        $this->display_value = $value;
        
        return $this;
    }

    /**
     * Returns value
     *
     * @return int|NULL
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * Sets value
     *
     * @param int $value
     * @return self
     */
    public function setValue(?int $value): self
    {
        $this->value = $value;
        
        return $this;
    }

    /**
     * Returns type
     *
     * @return string|NULL
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets type
     *
     * @param string $type
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        
        return $this;
    }

    /**
     * Returns display style
     *
     * @return string|NULL
     */
    public function getDisplayStyle(): ?string
    {
        return $this->display_style;
    }

    /**
     * Sets display style
     *
     * @param string $style
     * @return self
     */
    public function setDisplayStyle(?string $style): self
    {
        $this->display_style = $style;
        
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
            $instance->setOptionId((int) static::readAttribute($model, 'option_id'));
            $instance->setProductOptionId((int) static::readAttribute($model, 'product_option_id'));
            $instance->setOrderProductId((int) static::readAttribute($model, 'order_product_id'));
            $instance->setValue((int) static::readAttribute($model, 'value'));
            $instance->setName((string) static::readAttribute($model, 'name'));
            $instance->setDisplayName((string) static::readAttribute($model, 'display_name'));
            $instance->setDisplayValue((string) static::readAttribute($model, 'display_value'));
            $instance->setDisplayStyle((string) static::readAttribute($model, 'display_style'));
            $instance->setType((string) static::readAttribute($model, 'type'));
        }
        
        return $instance;
    }
}