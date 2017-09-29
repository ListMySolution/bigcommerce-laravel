<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 *
 * @author cosman
 *        
 */
class Logo extends BaseModel
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
    protected $mobile_url;

    /**
     * Returns logo url
     *
     * @return string|NULL
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Sets logo url
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
     * Tells if logo url is a mobile compatible url
     *
     * @return bool|NULL
     */
    public function isMobileUrl(): ?bool
    {
        return $this->mobile_url;
    }

    /**
     * Set if url is mobile compactible
     *
     * @param bool $state
     * @return self
     */
    public function setIsMobileUrl(?bool $state): self
    {
        $this->mobile_url = $state;
        
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
            $instance->setIsMobileUrl(static::readAttribute($model, 'mobile_url', false));
        }
        
        return $instance;
    }
}