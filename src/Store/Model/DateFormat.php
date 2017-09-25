<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * class to represent BigCommerce date format
 *
 * @author cosman
 *        
 */
class DateFormat extends BaseModel
{

    /**
     *
     * @var string
     */
    protected $display;

    /**
     *
     * @var string
     */
    protected $export;

    /**
     *
     * @var string
     */
    protected $extended_display;

    /**
     * Returns display format
     *
     * @return string|NULL
     */
    public function getDisplayFormat(): ?string
    {
        return $this->display;
    }

    /**
     * Sets display format
     *
     * @param string $format
     * @return self
     */
    public function setDisplayFormat(?string $format): self
    {
        $this->display = $format;
        
        return $this;
    }

    /**
     * Returns export format
     *
     * @return string|NULL
     */
    public function getExportFormat(): ?string
    {
        return $this->export;
    }

    /**
     * Sets export format
     *
     * @param string $format
     * @return self
     */
    public function setExportFormat(?string $format): self
    {
        $this->export = $format;
        
        return $this;
    }

    /**
     * Returns extended display format
     *
     * @return string|NULL
     */
    public function getExtendDisplayFormat(): ?string
    {
        return $this->extended_display;
    }

    /**
     * Sets extended display format
     *
     * @param string $format
     * @return self
     */
    public function setExtendedDisplayFormat(?string $format): self
    {
        $this->extended_display = $format;
        
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
            $instance->setDisplayFormat(static::readAttribute($model, 'display'));
            $instance->setExportFormat(static::readAttribute($model, 'export'));
            $instance->setExtendedDisplayFormat(static::readAttribute($model, 'extended_display'));
        }
        
        return $instance;
    }
}