<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use Maverickslab\Integration\BigCommerce\Exception\BigCommerceIntegrationException;

class Product extends BaseModel
{

    const TYPE_PHYSICAL = 'physical';

    const TYPE_DIGITAL = 'digital';

    /**
     *
     * @var array
     */
    static $types = array(
        Self::TYPE_DIGITAL,
        self::TYPE_PHYSICAL
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
    protected $weight;

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
    protected $description;

    /**
     *
     * @var Category[]
     */
    protected $categories = [];

    /**
     *
     * @var Image[]
     */
    protected $images = [];

    /**
     *
     * @var ProductVariant[]
     */
    protected $variants = [];

    public function __construct(\stdClass $model = null)
    {
        if (null !== $model) {
            $this->setId(static::readAttribute($model, 'id'));
            $this->setName(static::readAttribute($model, 'name'));
            $this->setSKU(static::readAttribute($model, 'sku'));
            $this->setPrice(static::readAttribute($model, 'price', 0));
            $this->setCostPrice(static::readAttribute($model, 'cost_price', 0));
            $this->setRetailPrice(static::readAttribute($model, 'retail_price', 0));
            $this->setSalePrice(static::readAttribute($model, 'sale_price'));
            $this->setDescription(static::readAttribute($model, 'description'));
            $this->setType(static::readAttribute($model, 'type'));
            $this->setWeight(static::readAttribute($model, 'weight', 0));
            $this->setWidth(static::readAttribute($model, 'width', 0));
            $this->setHeight(static::readAttribute($model, 'height', 0));
            $this->setDepth(static::readAttribute($model, 'depth', 0));
            
            $variants = array_map(function ($variantModel) {
                return ProductVariant::fromBigCommerce($variantModel);
            }, static::readAttribute($model, 'variants', []));
            
            $this->addVariants(...$variants);
            
            $images = array_map(function ($imageModel) {
                return Image::fromBigCommerce($imageModel);
            }, static::readAttribute($model, 'images', []));
            
            $this->addImages(...$images);
        }
    }

    /**
     * Returns product Id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets product Id
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
     * Returns product name
     *
     * @return string|NULL
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets product name
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
     * Returns product SKU
     *
     * @return string|NULL
     */
    public function getSKU(): ?string
    {
        return $this->sku;
    }

    /**
     * Sets product SKU
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
     * Returns product type
     *
     * @return string|NULL
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets product type
     *
     * @param string $type
     * @throws BigCommerceIntegrationException::
     * @return self
     */
    public function setType(?string $type): self
    {
        if (! is_null($type) && ! in_array($type, self::$types)) {
            throw new BigCommerceIntegrationException(sprintf('Unsupported product type "%s".', $type));
        }
        
        $this->type = $type;
        
        return $this;
    }

    /**
     * Returns product description
     *
     * @return string|NULL
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets product description
     *
     * @param string $description
     * @return self
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        
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
        $this->weight = $weight;
        
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
        $this->width = $width;
        
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
        $this->height = $height;
        
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
        $this->depth = $depth;
        
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
        $this->price = $price;
        
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
        $this->cost_price = $price;
        
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
        $this->retail_price = $price;
        
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
        $this->sale_price = $price;
        
        return $this;
    }

    /**
     * Returns product categories
     *
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * Sets product categories
     *
     * @param array $categories
     * @return self
     */
    public function setCategories(array $categories): self
    {
        $this->categories = [];
        
        $this->addCategory(...$categories);
        
        return $this;
    }

    /**
     * Adds at least one category to current instance
     *
     * @param Category ...$categories
     * @return self
     */
    public function addCategory(Category ...$categories): self
    {
        foreach ($categories as $category) {
            $this->categories[] = $category;
        }
        
        return $this;
    }

    /**
     * Returns variants
     *
     * @return ProductVariant[]
     */
    public function getVariants(): array
    {
        return $this->variants;
    }

    /**
     * Adds variants to current product
     *
     * @param ProductVariant ...$variants
     * @return self
     */
    public function addVariants(ProductVariant ...$variants): self
    {
        foreach ($variants as $variant) {
            $this->variants[] = $variant;
        }
        
        return $this;
    }

    /**
     * Returns product images
     *
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * Adds images to current product
     *
     * @param Image ...$images
     * @return self
     */
    public function addImages(Image ...$images): self
    {
        foreach ($images as $image) {
            $this->images[] = $image;
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
            $instance->setId(static::readAttribute($model, 'id'));
            $instance->setName(static::readAttribute($model, 'name'));
            $instance->setSKU(static::readAttribute($model, 'sku'));
            $instance->setPrice(static::readAttribute($model, 'price', 0));
            $instance->setCostPrice(static::readAttribute($model, 'cost_price', 0));
            $instance->setRetailPrice(static::readAttribute($model, 'retail_price', 0));
            $instance->setSalePrice(static::readAttribute($model, 'sale_price'));
            $instance->setDescription(static::readAttribute($model, 'description'));
            $instance->setType(static::readAttribute($model, 'type'));
            $instance->setWeight((float) static::readAttribute($model, 'weight', 0));
            $instance->setWidth((float) static::readAttribute($model, 'width', 0));
            $instance->setHeight((float) static::readAttribute($model, 'height', 0));
            $instance->setDepth((float) static::readAttribute($model, 'depth', 0));
            
            $variants = array_map(function ($variantModel) {
                return ProductVariant::fromBigCommerce($variantModel);
            }, static::readAttribute($model, 'variants', []));
            
            $instance->addVariants(...$variants);
            
            $images = array_map(function ($imageModel) {
                return Image::fromBigCommerce($imageModel);
            }, static::readAttribute($model, 'images', []));
            
            $instance->addImages(...$images);
        }
        
        return $instance;
    }
}



