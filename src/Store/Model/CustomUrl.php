<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * Custom Url class
 *
 * @author cosman
 *        
 */
class CustomUrl extends BaseModel
{

    /**
     *
     * @var string
     */
    protected $url;

    /**
     *
     * @var bool
     */
    protected $is_customized = false;

    /**
     * Returns custom url
     *
     * @return string|NULL
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Sets a custom url
     *
     * @param string $url
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;
        
        return $this;
    }

    /**
     * Tells whether a given url is customized
     *
     * @return bool
     */
    public function isCustomized(): bool
    {
        return $this->is_customized;
    }

    /**
     * Sets if a given url is customized
     *
     * @param bool $state
     * @return self
     */
    public function setIsCustomized(?bool $state): self
    {
        $this->is_customized = true === $state;
        
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
            $instance->setUrl(static::readAttribute($model, 'url'));
            $instance->setIsCustomized(static::readAttribute($model, 'is_customized', false));
        }
        
        return $instance;
    }
}