<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * BigCommerce Timezone calss
 *
 * @author cosman
 *        
 */
class TimeZone extends BaseModel
{

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var int
     */
    protected $raw_offset;

    /**
     *
     * @var int
     */
    protected $dst_offset;

    /**
     *
     * @var boolean
     */
    protected $dst_correction;

    /**
     *
     * @var DateFormat
     */
    protected $date_format;

    /**
     * Returns Timezone name
     *
     * @return string|NULL
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets timezone name
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
     * Returns raw timezone offset
     *
     * @return int|NULL
     */
    public function getRawOffset(): ?int
    {
        return $this->raw_offset;
    }

    /**
     * Sets raw timezone offset
     *
     * @param int $offset
     * @return self
     */
    public function setRawOffset(?int $offset): self
    {
        $this->raw_offset = $offset;
        
        return $this;
    }

    /**
     * Sets day saving time offset (DST) of a timezone
     *
     * @param int $offset
     * @return self
     */
    public function setDaySavingTimeOffset(?int $offset): self
    {
        $this->dst_offset = $offset;
        
        return $this;
    }

    /**
     * Returns DST correction state
     *
     * @return bool|NULL
     */
    public function getDaySavingTimeCorrection(): ?bool
    {
        return $this->dst_correction;
    }

    /**
     * Sets DTS correction
     *
     * @param bool $state
     * @return self
     */
    public function setDaySavingTimeCorrection(?bool $state): self
    {
        $this->dst_correction = $state;
        
        return $this;
    }

    /**
     * Returns date format
     *
     * @return DateFormat|NULL
     */
    public function getDateFormat(): ?DateFormat
    {
        return $this->date_format;
    }

    /**
     * Sets date format
     *
     * @param DateFormat $format
     * @return self
     */
    public function setDateFormat(?DateFormat $format): self
    {
        $this->date_format = $format;
        
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
            $instance->setName(static::readAttribute($model, 'name'));
            $instance->setRawOffset(static::readAttribute($model, 'raw_offset'));
            $instance->setDaySavingTimeOffset(static::readAttribute($model, 'dst_offset'));
            $instance->setDaySavingTimeCorrection(static::readAttribute($model, 'dst_correction'));
            
            $dateFormat = DateFormat::fromBigCommerce(static::readAttribute($model, 'date_format'));
            $instance->setDateFormat($dateFormat);
        }
        
        return $instance;
    }
}