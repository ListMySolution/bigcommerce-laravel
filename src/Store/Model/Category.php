<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * Product category class
 *
 * @author cosman
 *        
 */
class Category extends BaseModel
{

    const DEFAULT_SORT_USE_STORE_SETTINGS = 'use_store_settings';

    const DEFAULT_SORT_FEATURED = 'featured';

    const DEFAULT_SORT_NEWEST = 'newest';

    const DEFAULT_SORT_BEST_SELLING = 'best_selling';

    const DEFAULT_SORT_ALPHA_ASCENDING = 'alpha_asc';

    const DEFAULT_SORT_ALPHA_DESCENDING = 'alpha_desc';

    const DEFAULT_SORT_AVERAGE_CUSTOMER_REVIEW = 'avg_customer_review';

    const DEFAULT_SORT_PRICE_ASCENDING = 'price_asc';

    const DEFAULT_SORT_PRICE_DESCENDING = 'price_desc';

    /**
     *
     * @var int
     */
    protected $id;

    /**
     *
     * @var int
     */
    protected $parent_id = 0;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var int
     */
    protected $views;

    /**
     *
     * @var int
     */
    protected $sort_order = 0;

    /**
     *
     * @var string
     */
    protected $page_title;

    /**
     *
     * @var boolean
     */
    protected $is_visible;

    /**
     *
     * @var string
     */
    protected $search_keywords;

    /**
     *
     * @var string[]
     */
    protected $meta_keywords;

    /**
     *
     * @var string
     */
    protected $meta_description;

    /**
     *
     * @var string
     */
    protected $layout_file;

    /**
     *
     * @var string
     */
    protected $default_product_sort = self::DEFAULT_SORT_USE_STORE_SETTINGS;

    /**
     *
     * @var string
     */
    protected $image_url;

    /**
     *
     * @var CustomUrl
     */
    protected $custom_url;

    /**
     * Returns category id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets category id
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
     * Returns parent Id for category
     *
     * @return int|NULL
     */
    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    /**
     * Returns parent Id
     *
     * @param int $parentId
     * @return self
     */
    public function setParentId(?int $parentId): self
    {
        $this->parent_id = $parentId;
        
        return $this;
    }

    /**
     * Returns category name
     *
     * @return string|NULL
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets category name
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
     * Returns category description
     *
     * @return string|NULL
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets description of category
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
     * Returns category views
     *
     * @return int|NULL
     */
    public function getViews(): ?int
    {
        return $this->views;
    }

    /**
     * Sets category views
     *
     * @param int $views
     * @return self
     */
    public function setViews(?int $views): self
    {
        if ($views) {
            $this->views = $views;
        }
        
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
     * Returns page title for category
     *
     * @return string|NULL
     */
    public function getPageTitle(): ?string
    {
        return $this->page_title;
    }

    /**
     * Sets page title for category
     *
     * @param string $title
     * @return self
     */
    public function setPageTitle(?string $title): self
    {
        $this->page_title = $title;
        
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
     * Sets search keywords for category
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
     * Returns meta keywords
     *
     * @return string[]|NULL
     */
    public function getMetaKeywords(): ?array
    {
        return $this->meta_keywords;
    }

    /**
     * Sets meta keywords
     *
     * @param string[] $keywords
     * @return self
     */
    public function setMetaKeywords(?array $keywords): self
    {
        $this->meta_keywords = $keywords;
        
        return $this;
    }

    /**
     * Returns description
     *
     * @return string|NULL
     */
    public function getMetaDescription(): ?string
    {
        return $this->meta_description;
    }

    /**
     * Sets meta description
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
     * Returns layout file
     *
     * @return string|NULL
     */
    public function getLayoutFile(): ?string
    {
        return $this->layout_file;
    }

    /**
     * Sets layout file for category
     *
     * @param string $file
     * @return self
     */
    public function setLayoutFile(?string $file): self
    {
        $this->layout_file = $file;
        
        return $this;
    }

    /**
     * Tells whether a category is visible
     *
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->is_visible;
    }

    /**
     * Sets category visibility
     *
     * @param bool $state
     * @return self
     */
    public function setVisibility(?bool $state): self
    {
        $this->is_visible = $state;
        
        return $this;
    }

    /**
     * Returns defaulf sorting for category
     *
     * @return string|NULL
     */
    public function getDefaultProductSort(): ?string
    {
        return $this->default_product_sort;
    }

    /**
     * Sets default sorting for category
     *
     * @param string $sort
     * @return self
     */
    public function setDefaultProductSort(?string $sort): self
    {
        $this->default_product_sort = $sort;
        
        return $this;
    }

    /**
     * Returns category image url
     *
     * @return string|NULL
     */
    public function getImageUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Sets category image url
     *
     * @param string $url
     * @return self
     */
    public function setImageUrl(?string $url): self
    {
        $this->url = $url;
        
        return $this;
    }

    /**
     * Returns custom url for this category
     *
     * @return CustomUrl|NULL
     */
    public function getCustomUrl(): ?CustomUrl
    {
        return $this->custom_url;
    }

    /**
     * Sets custom url for this category
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
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Model\BaseModel::propertyUnsetter()
     */
    protected function propertyUnsetter(array &$arrayData)
    {
        parent::propertyUnsetter($arrayData);
        
        if (empty($arrayData['parent_id'])) {
            $arrayData['parent_id'] = 0;
        }
    }

    /**
     * Creates an instance of this class from a BigCommerce entity/model
     *
     * @param mixed $model
     * @return self
     */
    public static function fromBigCommerce($model = null)
    {
        $instance = new static($model);
        $instance->setId(static::readAttribute($model, 'id'));
        $instance->setParentId(static::readAttribute($model, 'parent_id'));
        $instance->setName(static::readAttribute($model, 'name'));
        $instance->setDescription(static::readAttribute($model, 'description'));
        $instance->setViews(static::readAttribute($model, 'views'));
        $instance->setSortOrder(static::readAttribute($model, 'sort_order'));
        $instance->setPageTitle(static::readAttribute($model, 'page_title'));
        $instance->setSearchKeywords(static::readAttribute($model, 'search_keywords'));
        $instance->setMetaKeywords(static::readAttribute($model, 'meta_keywords'));
        $instance->setMetaDescription(static::readAttribute($model, 'meta_description'));
        $instance->setLayoutFile(static::readAttribute($model, 'layout_file'));
        $instance->setImageUrl(static::readAttribute($model, 'image_url'));
        $instance->setVisibility(static::readAttribute($model, 'is_visible', false));
        $instance->setCustomUrl(CustomUrl::fromBigCommerce(static::readAttribute($model, 'custom_url')));
        $instance->setDefaultProductSort(static::readAttribute($model, 'default_product_sort '));
        
        return $instance;
    }
}