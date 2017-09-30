<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * Order status class
 *
 * @author cosman
 *        
 */
class OrderStatus extends BaseModel
{

    /**
     *
     * @var int
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $system_label;

    /**
     *
     * @var string
     */
    protected $custom_label;

    /**
     *
     * @var string
     */
    protected $system_description;

    /**
     *
     * @var int
     */
    protected $order;

    /**
     * Returns order status Id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets order status id
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
     * Returns order status name
     *
     * @return string|NULL
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets order status name
     *
     * @param string $name
     * @return self
     */
    public function setName(?string $name): self
    {
        if ($name) {
            $this->name = $name;
        }
        
        return $this;
    }

    /**
     * Returns order status system label
     *
     * @return string|NULL
     */
    public function getSystemLabel(): ?string
    {
        return $this->system_label;
    }

    /**
     * Sets order status system label
     *
     * @param string $name
     * @return self
     */
    public function setSystemLabel(?string $label): self
    {
        if ($label) {
            $this->system_label = $label;
        }
        
        return $this;
    }

    /**
     * Returns order status custom label
     *
     * @return string|NULL
     */
    public function getCustomLabel(): ?string
    {
        return $this->custom_label;
    }

    /**
     * Sets order status custom label
     *
     * @param string $label
     * @return self
     */
    public function setCustomLabel(?string $label): self
    {
        if ($label) {
            $this->custom_label = $label;
        }
        
        return $this;
    }

    /**
     * Returns order status system description
     *
     * @return string|NULL
     */
    public function getSystemDescription(): ?string
    {
        return $this->system_description;
    }

    /**
     * Sets order status system description
     *
     * @param string $description
     * @return self
     */
    public function setSystemDescription(?string $description): self
    {
        if ($description) {
            $this->system_description = $description;
        }
        
        return $this;
    }

    /**
     * Returns order status order
     *
     * @return int|NULL
     */
    public function getOrder(): ?int
    {
        return $this->order;
    }

    /**
     * Sets order status order
     *
     * @param int $order
     * @return self
     */
    public function setOrder(?int $order): self
    {
        $this->order = $order;
        
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
            $instance->setOrder((int) static::readAttribute($model, 'order'));
            $instance->setName((string) static::readAttribute($model, 'name'));
            $instance->setSystemLabel((string) static::readAttribute($model, 'system_label'));
            $instance->setCustomLabel((string) static::readAttribute($model, 'custom_label'));
            $instance->setSystemDescription((string) static::readAttribute($model, 'system_description'));
        }
        
        return $instance;
    }
}