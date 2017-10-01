<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use DateTime;

/**
 * Image class
 *
 * @author cosman
 *        
 */
class Image extends BaseModel
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
     * @var bool
     */
    protected $is_thumbnail;

    /**
     *
     * @var int
     */
    protected $sort_order = 0;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var string
     */
    protected $image_file;

    /**
     *
     * @var string
     */
    protected $url_zoom;

    /**
     *
     * @var string
     */
    protected $url_standard;

    /**
     *
     * @var string
     */
    protected $url_thumbnail;

    /**
     *
     * @var string
     */
    protected $url_tiny;

    /**
     *
     * @var DateTime
     */
    protected $date_created;

    /**
     *
     * @var DateTime
     */
    protected $date_modified;

    /**
     * Returns image id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets image id
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
     * Returns proudct id
     *
     * @return int|NULL
     */
    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    /**
     * Sets product id
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
     * Tells if image is a thumbnail
     *
     * @return bool|NULL
     */
    public function isThumbnail(): ?bool
    {
        return $this->is_thumbnail;
    }

    /**
     * Sets if image is thumbnail
     *
     * @param bool $state
     * @return self
     */
    public function setIsThumbnail(?bool $state): self
    {
        $this->is_thumbnail = $state;
        
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
        if ($order) {
            $this->sort_order = $order;
        }
        
        return $this;
    }

    /**
     * Returns description
     *
     * @return string|NULL
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets description
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
     * Returns image file
     *
     * @return string|NULL
     */
    public function getFile(): ?string
    {
        return $this->image_file;
    }

    /**
     * Sets image file
     *
     * @param string $file
     * @return self
     */
    public function setFile(?string $file): self
    {
        $this->image_file = $file;
        
        return $this;
    }

    /**
     * Returns zoom url
     *
     * @return string|NULL
     */
    public function getZoomUrl(): ?string
    {
        return $this->url_zoom;
    }

    /**
     * Sets zoom url
     *
     * @param string $url
     * @return self
     */
    public function setZoomUrl(?string $url): self
    {
        $this->url_zoom = $url;
        
        return $this;
    }

    /**
     * Returns standard url for image
     *
     * @return string|NULL
     */
    public function getStandardUrl(): ?string
    {
        return $this->url_standard;
    }

    /**
     * Sets standard url
     *
     * @param string $url
     * @return self
     */
    public function setStandardUrl(?string $url): self
    {
        $this->url_standard = $url;
        
        return $this;
    }

    /**
     * Returns thumbnail url for image
     *
     * @return string|NULL
     */
    public function getThumbnailUrl(): ?string
    {
        return $this->url_thumbnail;
    }

    /**
     * Sets thumbnail url
     *
     * @param string $url
     * @return self
     */
    public function setThumbnailUrl(?string $url): self
    {
        $this->url_thumbnail = $url;
        
        return $this;
    }

    /**
     * Returns tiny url for image
     *
     * @return string|NULL
     */
    public function getTinyUrl(): ?string
    {
        return $this->url_tiny;
    }

    /**
     * Sets tiny url
     *
     * @param string $url
     * @return self
     */
    public function setTinyUrl(?string $url): self
    {
        $this->url_tiny = $url;
        
        return $this;
    }

    /**
     * Returns date and time on which image was created
     *
     * @return DateTime|NULL
     */
    public function getDateCreated(): ?DateTime
    {
        return $this->date_created;
    }

    /**
     * Sets date and time on which image was created
     *
     * @param DateTime $datetime
     * @return self
     */
    public function setDateCreated(?DateTime $datetime): self
    {
        $this->date_created = $datetime;
        
        return $this;
    }

    /**
     * Returns date and time on which image was modified
     *
     * @return DateTime|NULL
     */
    public function getDateModified(): ?DateTime
    {
        return $this->date_modified;
    }

    /**
     * Sets date and time on which image was modified
     *
     * @param DateTime $datetime
     * @return self
     */
    public function setDateModified(?DateTime $datetime): self
    {
        $this->date_modified = $datetime;
        
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
            $instance->setProductId((int) static::readAttribute($model, 'product_id'));
            $instance->setDescription((string) static::readAttribute($model, 'description'));
            $instance->setIsThumbnail(true === static::readAttribute($model, 'is_thumbnail'));
            $instance->setSortOrder((int) static::readAttribute($model, 'sort_order'));
            $instance->setFile((string) static::readAttribute($model, 'image_file'));
            $instance->setZoomUrl((string) static::readAttribute($model, 'url_zoom'));
            $instance->setStandardUrl((string) static::readAttribute($model, 'url_standard'));
            $instance->setThumbnailUrl((string) static::readAttribute($model, 'url_thumbnail'));
            $instance->setTinyUrl((string) static::readAttribute($model, 'url_tiny'));
            
            $instance->setDateCreated(static::createDateTime(static::readAttribute($model, 'date_created')));
            
            $instance->setDateModified(static::createDateTime(static::readAttribute($model, 'date_modified')));
        }
        
        return $instance;
    }
}