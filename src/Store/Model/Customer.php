<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use DateTime;

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
    protected $company;

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
    protected $phone;

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
     *
     * @var float
     */
    protected $store_credit;

    /**
     *
     * @var string
     */
    protected $registration_ip_address;

    /**
     *
     * @var int
     */
    protected $customer_group_id;

    /**
     *
     * @var string
     */
    protected $notes;

    /**
     *
     * @var string
     */
    protected $tax_exempt_category;

    /**
     *
     * @var bool
     */
    protected $accepts_marketing = false;

    /**
     *
     * @var CustomerAddress[]
     */
    protected $addresses = [];

    /**
     *
     * @var \stdClass[]
     */
    protected $form_fields;

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
     * Returns customer's company
     *
     * @return string|NULL
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * Sets customer's company
     *
     * @param string $company
     * @return self
     */
    public function setCompany(?string $company): self
    {
        $this->company = $company;
        
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
     * Returns customer email address
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
     * Returns phone number
     *
     * @return string|NULL
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Sets customer phone number
     *
     * @param string $phone
     * @return self
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        
        return $this;
    }

    /**
     * Returns date customer was created or added
     *
     * @return DateTime|NULL
     */
    public function getDateCreated(): ?DateTime
    {
        return $this->date_created;
    }

    /**
     * Sets date and time customer was created or added
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
     * Returns date and time customer was last modified
     *
     * @return DateTime|NULL
     */
    public function getDateModified(): ?DateTime
    {
        return $this->date_modified;
    }

    /**
     * Sets date and time customer was last modified
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
     * Returns customer's store credit
     *
     * @return float|NULL
     */
    public function getStoreCredit(): ?float
    {
        return $this->store_credit;
    }

    /**
     * Sets store credit for customer
     *
     * @param float $credit
     * @return self
     */
    public function setStoreCredit(?float $credit): self
    {
        $this->store_credit = $credit;
        
        return $this;
    }

    /**
     * Returns IP address from which customer registered
     *
     * @return string|NULL
     */
    public function getRegistrationIpAddress(): ?string
    {
        return $this->registration_ip_address;
    }

    /**
     * Sets IP address from which customer registered
     *
     * @param string $ip
     * @return self
     */
    public function setRegistrationIpAddress(?string $ip): self
    {
        $this->registration_ip_address = $ip;
        
        return $this;
    }

    /**
     * Returns customer group id
     *
     * @return int|NULL
     */
    public function getGroupId(): ?int
    {
        return $this->customer_group_id;
    }

    /**
     * Sets customer group id
     *
     * @param int $id
     * @return self
     */
    public function setGroupId(?int $id): self
    {
        $this->customer_group_id = $id;
        
        return $this;
    }

    /**
     * Returns store notes to customer
     *
     * @return string|NULL
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * Sets store notes to customer
     *
     * @param string $notes
     * @return self
     */
    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;
        
        return $this;
    }

    /**
     * Returns tax exempt category for customer
     *
     * @return string|NULL
     */
    public function getTaxExemptCategory(): ?string
    {
        return $this->tax_exempt_category;
    }

    /**
     * Sets tax exempt category for customer
     *
     * @param string $category
     * @return self
     */
    public function setTaxExemptCategory(?string $category): self
    {
        $this->tax_exempt_category = $category;
        
        return $this;
    }

    /**
     * Tells whether customer has agree to receive marketing content from store
     *
     * @return bool|NULL
     */
    public function hasAcceptedMarketing(): ?bool
    {
        return $this->accepts_marketing;
    }

    /**
     * Sets whether customer has agree to receive marketing content from store
     *
     * @param bool $state
     * @return self
     */
    public function setHasAcceptedMarketing(?bool $state): self
    {
        $this->accepts_marketing = $state;
        
        return $this;
    }

    /**
     * Returns customer addresses
     *
     * @return CustomerAddress[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * Adds at least one address to customer
     *
     * @param CustomerAddress ...$addresses
     * @return self
     */
    public function addAddresses(CustomerAddress ...$addresses): self
    {
        foreach ($addresses as $address) {
            $this->addresses[] = $address;
        }
        
        return $this;
    }

    /**
     * Returns custom/form fields associated with customer
     *
     * @return mixed
     */
    public function getFormFields()
    {
        return $this->form_fields;
    }

    /**
     * Adds custom/form fields to a customer
     *
     * @param mixed $fields
     * @return self
     */
    public function setFormFields($fields): self
    {
        $this->form_fields = $fields;
        
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
            $instance->setCompany(static::readAttribute($model, 'company'));
            $instance->setFirstName(static::readAttribute($model, 'first_name'));
            $instance->setLastName(static::readAttribute($model, 'last_name'));
            $instance->setEmail(static::readAttribute($model, 'email'));
            $instance->setPhone(static::readAttribute($model, 'phone'));
            
            $instance->setDateCreated(static::createDateTime(static::readAttribute($model, 'date_created')));
            
            $instance->setDateModified(static::createDateTime(static::readAttribute($model, 'date_modified')));
            
            $instance->setStoreCredit((float) static::readAttribute($model, 'store_credit', 0));
            $instance->setRegistrationIpAddress(static::readAttribute($model, 'registration_ip_address'));
            $instance->setGroupId((int) static::readAttribute($model, 'customer_group_id'));
            $instance->setNotes(static::readAttribute($model, 'notes'));
            $instance->setTaxExemptCategory(static::readAttribute($model, 'tax_exempt_category'));
            $instance->setHasAcceptedMarketing(true === static::readAttribute($model, 'accepts_marketing', false));
            
            $addressModelArray = static::readAttribute($model, 'addresses', []);
            
            if (is_array($addressModelArray)) {
                $addresses = array_map(function ($addressModel) {
                    return Address::fromBigCommerce($addressModel);
                }, $addressModelArray);
                
                $instance->addAddresses(...$addresses);
            }
            
            $instance->setFormFields(static::readAttribute($model, 'form_fields'));
        }
        
        return $instance;
    }
}