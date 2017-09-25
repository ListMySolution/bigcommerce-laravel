<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * Customer model
 *
 * @author cosman
 *        
 */
class Customer extends BaseModel
{

    const SOURCE_STORE_FRONT = 'storefront';

    const SOURCE_ORDER = 'order';

    const SOURCE_CUSTOM = 'custom';

    /**
     *
     * @var int
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $first_name;

    /**
     *
     * @var string
     */
    protected $last_name;

    /**
     *
     * @var string
     */
    protected $source;

    /**
     *
     * @var int
     */
    protected $order_id;

    /**
     * Returns customer Id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets customer Id
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
     * Returns customer email
     *
     * @return string|NULL
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Sets customer email address
     *
     * @param string $email
     * @return self
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        
        return $this;
    }

    /**
     * Returns first name
     *
     * @return string|NULL
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * Sets first name
     *
     * @param string $name
     * @return self
     */
    public function setFirstName(?string $name): self
    {
        $this->first_name = $name;
        
        return $this;
    }

    /**
     * Returns last name
     *
     * @return string|NULL
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * Sets last name
     *
     * @param string $name
     * @return self
     */
    public function setLastName(?string $name): self
    {
        $this->last_name = $name;
        
        return $this;
    }

    /**
     * Returns customer source
     *
     * @return string|NULL
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * Sets customer source
     *
     * @param string $source
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->source = $source;
        
        return $this;
    }

    /**
     * Return order id
     *
     * @return int|NULL
     */
    public function getOrderId(): ?int
    {
        return $this->order_id;
    }

    /**
     * Sets order id
     * 
     * @param int $orderId
     * @return self
     */
    public function setOrderId(?int $orderId): self
    {
        $this->order_id = $orderId;
        
        return $this;
    }
}