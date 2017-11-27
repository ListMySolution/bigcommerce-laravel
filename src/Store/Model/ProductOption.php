<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use Maverickslab\Integration\BigCommerce\Exception\BigCommerceIntegrationException;

/**
 *
 * @author cosman
 *        
 */
class ProductOption extends BaseModel
{

    const TYPE_DROPDOWN = 'dropdown';

    const TYPE_RADIO_BUTTONS = 'radio_buttons';

    const TYPE_RECTANGLES = 'rectangles';

    const TYPE_PRODUCT_LIST = 'product_list';

    const TYPE_PRODUCT_LIST_WITH_IMAGES = 'product_list_with_images';

    const TYPE_SWATCH = 'swatch';

    /**
     *
     * @var array
     */
    public static $types = array(
        self::TYPE_DROPDOWN,
        self::TYPE_RADIO_BUTTONS,
        self::TYPE_RECTANGLES,
        self::TYPE_PRODUCT_LIST,
        self::TYPE_PRODUCT_LIST_WITH_IMAGES,
        self::TYPE_SWATCH
    );

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
    protected $display_name;

    /**
     *
     * @var string
     */
    protected $type = self::TYPE_DROPDOWN;

    /**
     *
     * @var int
     */
    protected $sort_order;

    /**
     *
     * @var ProductOptionValue[]
     */
    protected $option_values = [];

    /**
     *
     * @var array
     */
    protected $config = [];

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
        if (empty($type)) {
            $type = null;
        }
        
        if (null !== $type && ! in_array($type, static::$types)) {
            throw new BigCommerceIntegrationException(sprintf('"%s" is not an acceptable product option type.', $type));
        }
        
        $this->type = $type;
        
        return $this;
    }

    /**
     * Returns sort order
     *
     * @return int|NULL
     */
    public function getSortOrder(): ?int
    {
        return $this->sort_order;
    }

    /**
     * Sets sort order
     *
     * @param int $order
     * @return self
     */
    public function setSortOrder(?int $order): self
    {
        $this->sort_order = $order;
        
        return $this;
    }

    /**
     * Returns option value
     *
     * @return \Maverickslab\Integration\BigCommerce\Store\Model\ProductOptionValue[]
     */
    public function getOptionValues(): array
    {
        return $this->name;
    }

    /**
     * Adds at least one option values
     *
     * @param ProductOptionValue ...$optionValues
     * @return self
     */
    public function addOptionValues(ProductOptionValue ...$optionValues): self
    {
        foreach ($optionValues as $optionValue) {
            if (! $optionValue->getOptionId()) {
                $optionValue->setOptionId($this->getId());
            }
            
            $this->option_values[] = $optionValue;
        }
        
        return $this;
    }

    /**
     * Returns config
     *
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Sets config
     *
     * @param array $config
     * @return self
     */
    public function setConfig(array $config): self
    {
        $this->config = $config;
        
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
            $instance->setName((string) static::readAttribute($model, 'name'));
            $instance->setDisplayName((string) static::readAttribute($model, 'display_name'));
            $instance->setSortOrder((int) static::readAttribute($model, 'sort_order'));
            
            $optionValueModeArray = static::readAttribute($model, 'option_values', []);
            
            if (is_array($optionValueModeArray)) {
                $optionValues = array_map(function ($optionValueModel) {
                    return ProductOptionValue::fromBigCommerce($optionValueModel);
                }, $optionValueModeArray);
                
                $instance->addOptionValues(...$optionValues);
            }
            
            $config = static::readAttribute($model, 'config', []);
            
            if (is_array($config)) {
                $instance->setConfig($config);
            }
        }
        
        return $instance;
    }
}