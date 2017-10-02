<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use Maverickslab\Integration\BigCommerce\Exception\BigCommerceIntegrationException;
use DateTime;

class Product extends BaseModel
{

    const TYPE_PHYSICAL = 'physical';

    const TYPE_DIGITAL = 'digital';

    const CONDITION_NEW = 'New';

    const CONDITION_USED = 'Used';

    const CONDITION_REFURBISHED = 'Refurbished';

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
     * @var array
     */
    static $conditions = array(
        self::CONDITION_NEW,
        self::CONDITION_USED,
        self::CONDITION_REFURBISHED
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
    protected $description;

    /**
     *
     * @var Category[]
     */
    protected $categories = [];

    /**
     *
     * @var int[]
     */
    protected $category_ids = [];

    /**
     *
     * @var Image[]
     */
    protected $images = [];

    /**
     *
     * @var int
     */
    protected $tax_class_id;

    /**
     *
     * @var string
     */
    protected $product_tax_code;

    /**
     *
     * @var int
     */
    protected $brand_id;

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
     * @var string
     */
    protected $inventory_tracking;

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
    protected $is_visible;

    /**
     *
     * @var bool
     */
    protected $is_featured;

    /**
     *
     * @var int[]
     */
    protected $related_products = [];

    /**
     *
     * @var string
     */
    protected $warranty;

    /**
     *
     * @var string
     */
    protected $bin_picking_number;

    /**
     *
     * @var string
     */
    protected $layout_file;

    /**
     *
     * @var string
     */
    protected $upc;

    /**
     *
     * @var string
     */
    protected $search_keywords;

    /**
     *
     * @var string
     */
    protected $availability;

    /**
     *
     * @var string
     */
    protected $availability_description;

    /**
     *
     * @var string
     */
    protected $gift_wrapping_options_type;

    /**
     *
     * @var int[]
     */
    protected $gift_wrapping_options_list = [];

    /**
     *
     * @var int
     */
    protected $sort_order;

    /**
     *
     * @var string
     */
    protected $condition = self::CONDITION_NEW;

    /**
     *
     * @var bool
     */
    protected $is_condition_shown;

    /**
     *
     * @var int
     */
    protected $order_quantity_minimum;

    /**
     *
     * @var int
     */
    protected $order_quantity_maximum;

    /**
     *
     * @var string
     */
    protected $page_title;

    /**
     *
     * @var string[]
     */
    protected $meta_keywords = [];

    /**
     *
     * @var string
     */
    protected $meta_description;

    /**
     *
     * @var int
     */
    protected $view_count;

    /**
     *
     * @var DateTime
     */
    protected $preorder_release_date;

    /**
     *
     * @var string
     */
    protected $preorder_message;

    /**
     *
     * @var bool
     */
    protected $is_preorder_only;

    /**
     *
     * @var bool
     */
    protected $is_price_hidden;

    /**
     *
     * @var string
     */
    protected $price_hidden_label;

    /**
     *
     * @var CustomUrl
     */
    protected $custom_url;

    /**
     *
     * @var CustomField[]
     */
    protected $custom_fields = [];

    /**
     *
     * @var BulkPricingRule[]
     */
    protected $bulk_pricing_rules = [];

    /**
     *
     * @var ProductVariant[]
     */
    protected $variants = [];

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
        if ($id) {
            $this->id = $id;
        }
        
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
        if (empty($type)) {
            $type = null;
        }
        
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
        if ($weight) {
            $this->weight = $weight;
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
     * Returns product category ids
     *
     * @return int[]
     */
    public function getCategoryIds(): array
    {
        return $this->category_ids;
    }

    /**
     * Sets product categories
     *
     * @param
     *            int[]
     * @return self
     */
    public function setCategoryIds(int ...$categories): self
    {
        $this->category_ids = [];
        
        $this->addCategoryIds(...$categories);
        
        return $this;
    }

    /**
     * Adds at least one category id to current instance
     *
     * @param int ...$categories
     * @return self
     */
    public function addCategoryIds(int ...$categories): self
    {
        foreach ($categories as $category) {
            $this->category_ids[] = $category;
        }
        
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
     * @return Image[]
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
     * Returns tax class id
     *
     * @return int|NULL
     */
    public function getTaxClassId(): ?int
    {
        return $this->tax_class_id;
    }

    /**
     * Sets tax class id
     *
     * @param int $id
     * @return self
     */
    public function setTaxClassId(?int $id): self
    {
        if ($id) {
            $this->tax_class_id = $id;
        }
        
        return $this;
    }

    /**
     * Returns product tax code
     *
     * @return string|NULL
     */
    public function getTaxCode(): ?string
    {
        return $this->product_tax_code;
    }

    /**
     * Sets product tax code
     *
     * @param string $code
     * @return self
     */
    public function setTaxCode(?string $code): self
    {
        $this->product_tax_code = $code;
        
        return $this;
    }

    /**
     * Return product brand id
     *
     * @return int|NULL
     */
    public function getBrandId(): ?int
    {
        return $this->brand_id;
    }

    /**
     * Sets product brand id
     *
     * @param int $id
     * @return self
     */
    public function setBrandId(?int $id): self
    {
        if ($id) {
            $this->brand_id = $id;
        }
        
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
     * Returns inventory tracking
     *
     * @return string|NULL
     */
    public function getInventoryTracking(): ?string
    {
        return $this->inventory_tracking;
    }

    /**
     * Sets inventory tracking
     *
     * @param string $tracking
     * @return self
     */
    public function setInventoryTracking(?string $tracking): self
    {
        $this->inventory_tracking = $tracking;
        
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
     * Tells whether a product is visible in store
     *
     * @return bool|NULL
     */
    public function isVisible(): ?bool
    {
        return $this->is_visible;
    }

    /**
     * Sets whether a product should be visible in the store
     *
     * @param bool $state
     * @return self
     */
    public function setIsVisible(?bool $state): self
    {
        $this->is_visible = $state;
        
        return $this;
    }

    /**
     * Tells whether a product is featured in the store
     *
     * @return bool|NULL
     */
    public function isFeatured(): ?bool
    {
        return $this->is_featured;
    }

    /**
     * Sets whether a product should be featured in the store
     *
     * @param bool $state
     * @return self
     */
    public function setIsFeatured(?bool $state): self
    {
        $this->is_featured = $state;
        
        return $this;
    }

    /**
     * Returns a list of id's related products
     *
     * @return int[]
     */
    public function getRelatedProductIds(): array
    {
        return $this->related_products;
    }

    /**
     * Adds a list of id's related products for this product
     *
     * @return self
     */
    public function addRelatedProductIds(int ...$ids): self
    {
        foreach ($ids as $id) {
            $this->related_products[] = $id;
        }
        
        return $this;
    }

    /**
     * Returns product warranty
     *
     * @return string|NULL
     */
    public function getWarranty(): ?string
    {
        return $this->warranty;
    }

    /**
     * Sets product warranty
     *
     * @param string $warranty
     * @return self
     */
    public function setWarranty(?string $warranty): self
    {
        $this->warranty = $warranty;
        
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
     * Returns layout file
     *
     * @return string|NULL
     */
    public function getLayoutFile(): ?string
    {
        return $this->layout_file;
    }

    /**
     * Sets layout file
     *
     * @param string $layout
     * @return self
     */
    public function setLayoutFile(?string $layout): self
    {
        $this->layout_file = $layout;
        
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
     * Returns search keywords
     *
     * @return string|NULL
     */
    public function getSearchKeywords(): ?string
    {
        return $this->search_keywords;
    }

    /**
     * Sets search keywords
     *
     * @param string $keywords
     * @return self
     */
    public function setSearchKeywords(?string $keywords): self
    {
        $this->search_keywords = $keywords;
        
        return $this;
    }

    /**
     * Returns product availability
     *
     * @return string|NULL
     */
    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    /**
     * Sets product availability
     *
     * @param string $availability
     * @return self
     */
    public function setAvailability(?string $availability): self
    {
        $this->availability = $availability;
        
        return $this;
    }

    /**
     * Returns product availability description
     *
     * @return string|NULL
     */
    public function getAvailabilityDescription(): ?string
    {
        return $this->availability_description;
    }

    /**
     * Sets product availability description
     *
     * @param string $description
     * @return self
     */
    public function setAvailabilityDescription(?string $description): self
    {
        $this->availability_description = $description;
        
        return $this;
    }

    /**
     * Returns gift wrapping option type for product
     *
     * @return string|NULL
     */
    public function getGiftWrappingOptionType(): ?string
    {
        return $this->gift_wrapping_options_type;
    }

    /**
     * Sets gift wrapping option type for product
     *
     * @param string $type
     * @return self
     */
    public function setGiftWrappingOptionType(?string $type): self
    {
        $this->gift_wrapping_options_type = $type;
        
        return $this;
    }

    /**
     * Returns gift wrapping option list for product
     *
     * @return int[]
     */
    public function getGiftWrappingOptionList(): array
    {
        return $this->gift_wrapping_options_list;
    }

    /**
     * Adds at least one gift wrapping option list for product
     *
     * @param int ...$list
     * @return self
     */
    public function addGiftWrappingOptionList(int ...$list): self
    {
        foreach ($list as $item) {
            $this->gift_wrapping_options_list[] = $item;
        }
        
        return $this;
    }

    /**
     * Returns product sort order
     *
     * @return int|NULL
     */
    public function getSortOrder(): ?int
    {
        return $this->sort_order;
    }

    /**
     * Sets product sort order
     *
     * @param int $order
     * @return self
     */
    public function setSortOrder(?int $order): self
    {
        if ($order) {
            $this->sort_order = $order;
        }
        
        return $this;
    }

    /**
     * Returns product condition
     *
     * @return string|NULL
     */
    public function getCondition(): ?string
    {
        return $this->condition;
    }

    /**
     * Sets product condition
     *
     * @param string $condition
     * @return self
     */
    public function setCondition(?string $condition): self
    {
        if (empty($condition)) {
            $condition = null;
        }
        
        if (null !== $condition && ! in_array($condition, static::$conditions)) {
            throw new BigCommerceIntegrationException(sprintf('"%s" is not an acceptable product condition.', $condition));
        }
        $this->condition = $condition;
        
        return $this;
    }

    /**
     * Tells whether product condition is shown on the store
     *
     * @return bool|NULL
     */
    public function isConditionShown(): ?bool
    {
        return $this->is_condition_shown;
    }

    /**
     * Sets whether product condition should be shown on the store
     *
     * @param bool $state
     * @return self
     */
    public function setIsConditionShown(?bool $state): self
    {
        $this->is_condition_shown = $state;
        
        return $this;
    }

    /**
     * Returns the minimum quantity that can be order
     *
     * @return int|NULL
     */
    public function getMinimumOrderQuantity(): ?int
    {
        return $this->order_quantity_minimum;
    }

    /**
     * Sets the minimum quantity that can be order
     *
     * @param int $quantity
     * @return self
     */
    public function setMinimumOrderQuantity(?int $quantity): self
    {
        if ($quantity) {
            $this->order_quantity_minimum = $quantity;
        }
        
        return $this;
    }

    /**
     * Returns the maximum quantity that can be order
     *
     * @return int|NULL
     */
    public function getMaximumOrderQuantity(): ?int
    {
        return $this->order_quantity_maximum;
    }

    /**
     * Sets the maximum quantity that can be order
     *
     * @param int $quantity
     * @return self
     */
    public function setMaximumOrderQuantity(?int $quantity): self
    {
        if ($quantity) {
            $this->order_quantity_maximum = $quantity;
        }
        
        return $this;
    }

    /**
     * Returns product page title
     *
     * @return string|NULL
     */
    public function getPageTitle(): ?string
    {
        return $this->page_title;
    }

    /**
     * Sets product page title
     */
    public function setPageTitle(?string $title): self
    {
        $this->page_title = $title;
        
        return $this;
    }

    /**
     * Returns meta keywords
     *
     * @return string[]
     */
    public function getMetaKeywords(): array
    {
        return $this->meta_keywords;
    }

    /**
     * Adds at least one meta keyword for product
     *
     * @param string ...$keywords
     * @return self
     */
    public function addMetaKeywords(string ...$keywords): self
    {
        foreach ($keywords as $keyword) {
            $this->meta_keywords[] = $keyword;
        }
        
        return $this;
    }

    /**
     * Returns meta description for product
     *
     * @return string|NULL
     */
    public function getMetaDescription(): ?string
    {
        return $this->meta_description;
    }

    /**
     * Sets meta description for product
     *
     * @param string $description
     * @return self
     */
    public function setMetaDescription(?string $description): self
    {
        $this->meta_description = $description;
        
        return $this;
    }

    /**
     * Returns number of times product has been viewed
     *
     * @return int|NULL
     */
    public function getViewCount(): ?int
    {
        return $this->view_count;
    }

    /**
     * Sets number of times product has been viewed
     *
     * @param int $views
     * @return self
     */
    public function setViewCount(?int $views): self
    {
        if ($views) {
            $this->view_count = $views;
        }
        
        return $this;
    }

    /**
     * Returns preorder release date
     *
     * @return DateTime|NULL
     */
    public function getPreorderReleaseDate(): ?DateTime
    {
        return $this->preorder_release_date;
    }

    /**
     * Sets preorder release date
     *
     * @param DateTime $date
     * @return self
     */
    public function setPreorderReleaseDate(?DateTime $date): self
    {
        $this->preorder_release_date = $date;
        
        return $this;
    }

    /**
     * Returns preorder message
     *
     * @return string|NULL
     */
    public function getPreorderMessage(): ?string
    {
        return $this->preorder_message;
    }

    /**
     * Sets preorder message
     *
     * @param string $message
     * @return self
     */
    public function setPreorderMessage(?string $message): self
    {
        $this->preorder_message = $message;
        
        return $this;
    }

    /**
     * Tells whether product is only to preordered
     *
     * @return bool|NULL
     */
    public function isPreorderOnly(): ?bool
    {
        return $this->is_preorder_only;
    }

    /**
     * Sets whether product is only to preordered
     *
     * @param bool $state
     * @return self
     */
    public function setIsPreorderOnly(?bool $state): self
    {
        $this->is_preorder_only = $state;
        
        return $this;
    }

    /**
     * Tells whether product price should be hidden
     *
     * @return bool|NULL
     */
    public function isPriceHidden(): ?bool
    {
        return $this->is_price_hidden;
    }

    /**
     * Sets whether product price should be hidden
     *
     * @param bool $state
     * @return self
     */
    public function setIsPriceHidden(?bool $state): self
    {
        $this->is_price_hidden = $state;
        
        return $this;
    }

    /**
     * Returns label to show when product price is set hidden
     *
     * @return string|NULL
     */
    public function getPriceHiddenLabel(): ?string
    {
        return $this->price_hidden_label;
    }

    /**
     * Sets label to show when product price is set hidden
     *
     * @param string $label
     * @return self
     */
    public function setPriceHiddenLabel(?string $label): self
    {
        $this->price_hidden_label = $label;
        
        return $this;
    }

    /**
     * Returns custom url
     *
     * @return CustomUrl|NULL
     */
    public function getCustomUrl(): ?CustomUrl
    {
        return $this->custom_url;
    }

    /**
     * Sets custom url
     *
     * @param CustomUrl $url
     * @return self
     */
    public function setCustomUrl(?CustomUrl $url): self
    {
        $this->custom_url = $url;
        
        return $this;
    }

    /**
     * Returns custom fields
     *
     * @return array
     */
    public function getCustomFields(): array
    {
        return $this->custom_fields;
    }

    /**
     * Adds at least one custom fields to product
     *
     * @param CustomField ...$fields
     * @return self
     */
    public function addCustomFields(CustomField ...$fields): self
    {
        foreach ($fields as $field) {
            $this->custom_fields[] = $field;
        }
        
        return $this;
    }

    /**
     * Returns product bulk pricing rules
     *
     * @return array
     */
    public function getBulkPricingRules(): array
    {
        return $this->bulk_pricing_rules;
    }

    /**
     * Adds at least one bulk pricing rules to product
     *
     * @param BulkPricingRule ...$rules
     * @return self
     */
    public function addBulkPricingRules(BulkPricingRule ...$rules): self
    {
        foreach ($rules as $rule) {
            $this->bulk_pricing_rules[] = $rule;
        }
        
        return $this;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Model\BaseModel::toBigCommerceEntity()
     */
    public function toBigCommerceEntity(): array
    {
        $copy = clone $this;
        
        if (count($copy->categories)) {
            $copy->categories = array_map(function (Category $category) {
                return $category->getId();
            }, $copy->categories);
        } else {
            $copy->categories = $copy->category_ids;
        }
        
        unset($copy->category_ids);
        
        $copyArray = $copy->toArray();
        
        $copy->propertyUnsetter($copyArray);
        
        return $copyArray;
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
            $instance->setName(static::readAttribute($model, 'name'));
            $instance->setSKU(static::readAttribute($model, 'sku'));
            $instance->setPrice((float) static::readAttribute($model, 'price', 0));
            $instance->setCalculatedPrice((float) static::readAttribute($model, 'calculated_price', 0));
            $instance->setCostPrice((float) static::readAttribute($model, 'cost_price', 0));
            $instance->setRetailPrice((float) static::readAttribute($model, 'retail_price', 0));
            $instance->setSalePrice((float) static::readAttribute($model, 'sale_price'));
            $instance->setDescription((string) static::readAttribute($model, 'description'));
            $instance->setType((string) static::readAttribute($model, 'type'));
            $instance->setWeight((float) static::readAttribute($model, 'weight', 0));
            $instance->setWidth((float) static::readAttribute($model, 'width', 0));
            $instance->setHeight((float) static::readAttribute($model, 'height', 0));
            $instance->setDepth((float) static::readAttribute($model, 'depth', 0));
            $instance->setTaxClassId((int) static::readAttribute($model, 'tax_class_id'));
            $instance->setTaxCode((string) static::readAttribute($model, 'product_tax_code '));
            $categoriesIds = static::readAttribute($model, 'categories', []);
            
            if (is_array($categoriesIds)) {
                $instance->addCategoryIds(...$categoriesIds);
            }
            
            $instance->setBrandId((int) static::readAttribute($model, 'brand_id'));
            $instance->setInventoryLevel((int) static::readAttribute($model, 'inventory_level'));
            $instance->setInventoryWarningLevel((int) static::readAttribute($model, 'inventory_warning_level'));
            $instance->setInventoryTracking((string) static::readAttribute($model, 'inventory_tracking'));
            $instance->setFixedCostShippingPrice((float) static::readAttribute($model, 'fixed_cost_shipping_price'));
            $instance->setIsFreeShipping(true === static::readAttribute($model, 'is_free_shipping', false));
            $instance->setIsVisible(true === static::readAttribute($model, 'is_visible', false));
            $instance->setIsFeatured(true === static::readAttribute($model, 'is_featured', false));
            
            $relatedProductModelArray = static::readAttribute($model, 'related_products', []);
            
            if (is_array($relatedProductModelArray)) {
                $instance->addRelatedProductIds(...$relatedProductModelArray);
            }
            
            $instance->setWarranty((string) static::readAttribute($model, 'warranty'));
            $instance->setBinPickingNumber((string) static::readAttribute($model, 'bin_picking_number'));
            $instance->setLayoutFile((string) static::readAttribute($model, 'layout_file'));
            $instance->setUPC((string) static::readAttribute($model, 'upc'));
            $instance->setSearchKeywords((string) static::readAttribute($model, 'search_keywords'));
            $instance->setAvailability((string) static::readAttribute($model, 'availability'));
            $instance->setAvailabilityDescription((string) static::readAttribute($model, 'availability_description'));
            $instance->setGiftWrappingOptionType((string) static::readAttribute($model, 'gift_wrapping_options_type'));
            
            $giftListArray = static::readAttribute($model, 'gift_wrapping_options_list', []);
            
            if (is_array($giftListArray)) {
                $instance->addGiftWrappingOptionList(...$giftListArray);
            }
            
            $instance->setSortOrder((int) static::readAttribute($model, 'sort_order'));
            $instance->setCondition((string) static::readAttribute($model, 'condition'));
            
            $instance->setIsConditionShown(true === static::readAttribute($model, 'is_condition_shown', false));
            $instance->setMinimumOrderQuantity((int) static::readAttribute($model, 'order_quantity_minimum'));
            $instance->setMaximumOrderQuantity((int) static::readAttribute($model, 'order_quantity_maximum'));
            $instance->setPageTitle((string) static::readAttribute($model, 'page_title'));
            
            $metaKeywordsArray = static::readAttribute($model, 'meta_keywords', []);
            
            if (is_array($metaKeywordsArray)) {
                $instance->addMetaKeywords(...$metaKeywordsArray);
            }
            
            $instance->setMetaDescription((string) static::readAttribute($model, 'meta_description'));
            $instance->setViewCount((int) static::readAttribute($model, 'view_count'));
            
            $preorderDate = DateTime::createFromFormat(DateTime::RSS, (string) static::readAttribute($model, 'preorder_release_date'));
            if (false !== $preorderDate) {
                $instance->setPreorderReleaseDate($preorderDate);
            }
            
            $instance->setPreorderMessage((string) static::readAttribute($model, 'preorder_message'));
            $instance->setIsPreorderOnly(true === static::readAttribute($model, 'is_preorder_only', false));
            $instance->setIsPriceHidden(true === static::readAttribute($model, 'is_price_hidden', false));
            $instance->setPriceHiddenLabel((string) static::readAttribute($model, 'price_hidden_label'));
            
            $customUrlModel = static::readAttribute($model, 'custom_url');
            if (null !== $customUrlModel) {
                $instance->setCustomUrl(CustomUrl::fromBigCommerce(static::readAttribute($model, 'custom_url')));
            }
            
            $customFieldsArray = static::readAttribute($model, 'custom_fields', []);
            
            if (is_array($customFieldsArray)) {
                $customFields = array_map(function ($customFieldModel) {
                    return CustomField::fromBigCommerce($customFieldModel);
                }, $customFieldsArray);
                
                $instance->addCustomFields(...$customFields);
            }
            
            $bulkPricingRuleArray = static::readAttribute($model, 'bulk_pricing_rules', []);
            if (is_array($bulkPricingRuleArray)) {
                $bulkPricingRules = array_map(function ($ruleModel) {
                    return BulkPricingRule::fromBigCommerce($ruleModel);
                }, $bulkPricingRuleArray);
                
                $instance->addBulkPricingRules(...$bulkPricingRules);
            }
            
            $variantModelArray = static::readAttribute($model, 'variants', []);
            
            if (is_array($variantModelArray)) {
                $variants = array_map(function ($variantModel) {
                    return ProductVariant::fromBigCommerce($variantModel);
                }, $variantModelArray);
                
                $instance->addVariants(...$variants);
            }
            
            $imageModelArray = static::readAttribute($model, 'images', []);
            
            if (is_array($imageModelArray)) {
                $images = array_map(function ($imageModel) {
                    return Image::fromBigCommerce($imageModel);
                }, $imageModelArray);
                
                $instance->addImages(...$images);
            }
        }
        
        return $instance;
    }
}



