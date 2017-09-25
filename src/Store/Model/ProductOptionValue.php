<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 *
 * @author cosman
 *        
 */
class ProductOptionValue extends BaseModel
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
    protected $option_id;

    /**
     *
     * @var string
     */
    protected $label;

    /**
     *
     * @var string
     */
    protected $option_display_name;

    /**
     * Returns option value Id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Sets option value id
     *
     * @param int $id
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * Returns option Id
     *
     * @return int
     */
    public function getOptionId(): int
    {
        return $this->option_id;
    }

    /**
     * Sets option Id
     *
     * @param int $optionId
     * @return self
     */
    public function setOptionId(int $optionId): self
    {
        $this->option_id = $optionId;
        
        return $this;
    }

    /**
     * Returns option value label
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Sets option value label
     *
     * @param string $label
     * @return self
     */
    public function setLabel(string $label): self
    {
        $this->label = $label;
        
        return $this;
    }

    /**
     * Returns option display name
     *
     * @return string
     */
    public function getOptionDisplayName(): string
    {
        return $this->option_display_name;
    }

    /**
     * Sets option display name
     *
     * @param string $name
     * @return self
     */
    public function setOptionDisplayName(string $name): self
    {
        $this->option_display_name = $name;
        
        return $this;
    }
}