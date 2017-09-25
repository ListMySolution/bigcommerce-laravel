<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

class ProductVariant extends Product
{

    /**
     *
     * @var int
     */
    protected $product_id;

    public function __construct(\stdClass $model = null)
    {
        parent::__construct($model);
        
        if (null !== $model) {
            $this->setProductId(static::readAttribute($model, 'product_id'));
        }
        
        unset($this->type, $this->variants, $this->categories, $this->description, $this->name);
    }

    /**
     * Sets product Id for this variant
     *
     * @param int $id
     * @return self
     */
    public function setProductId(?int $id): self
    {
        $this->product_id = $id;
        
        return $this;
    }

    /**
     * Returns product Id for this variant
     *
     * @return int|NULL
     */
    public function getProductId(): ?int
    {
        return $this->product_id;
    }
}