<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 *
 * @author cosman
 *        
 */
class Brand extends BaseModel
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
    protected $page_title;

    /**
     *
     * @var string
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
    protected $image_file;

    /**
     *
     * @var string
     */
    protected $search_keywords;

    /**
     * Returns brand id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets brand id
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
     * Returns brand name
     *
     * @return string|NULL
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets brand name
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
     * Returns page title for brand
     *
     * @return string|NULL
     */
    public function getPageTitle(): ?string
    {
        return $this->page_title;
    }

    /**
     * Sets page title for brand
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
     * Returns meta keywords
     *
     * @return string|NULL
     */
    public function getMetaKeywords(): ?array
    {
        return $this->meta_keywords;
    }

    /**
     * Sets meta keywords
     *
     * @param string $keywords
     * @return self
     */
    public function setMetaKeywords(?string $keywords): self
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
     * Returns search keywords
     *
     * @return string|NULL
     */
    public function getSearchKeywords(): ?string
    {
        return $this->search_keywords;
    }

    /**
     * Sets search keywords for brand
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
     * Returns image file
     *
     * @return string|NULL
     */
    public function getImageFile(): ?string
    {
        return $this->image_file;
    }

    /**
     * Sets image file for category
     *
     * @param string $file
     * @return self
     */
    public function setImageFile(?string $file): self
    {
        $this->image_file = $file;
        
        return $this;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Model\BaseModel::toBigCommerceEntity()
     */
    public function toBigCommerceEntity(): array
    {
        $entityArray = parent::toBigCommerceEntity();
        
        unset($entityArray['id']);
        
        return $entityArray;
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
        $instance->setName(static::readAttribute($model, 'name'));
        $instance->setPageTitle(static::readAttribute($model, 'page_title'));
        $instance->setSearchKeywords(static::readAttribute($model, 'search_keywords'));
        $instance->setMetaKeywords(static::readAttribute($model, 'meta_keywords'));
        $instance->setMetaDescription(static::readAttribute($model, 'meta_description'));
        $instance->setImageFile(static::readAttribute($model, 'image_file'));
        
        return $instance;
    }
}