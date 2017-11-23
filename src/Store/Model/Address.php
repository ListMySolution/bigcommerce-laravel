<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 *
 * @author cosman
 *        
 */
class Address extends BaseModel
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
    protected $company;

    /**
     *
     * @var string
     */
    protected $street_1;

    /**
     *
     * @var string
     */
    protected $street_2;

    /**
     *
     * @var string
     */
    protected $city;

    /**
     *
     * @var string
     */
    protected $state;

    /**
     *
     * @var string
     */
    protected $zip;

    /**
     *
     * @var string
     */
    protected $country;

    /**
     *
     * @var string
     */
    protected $country_iso2;

    /**
     *
     * @var string
     */
    protected $phone;
    
    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $address_type;

    /**
     * Returns address id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets address id
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
     * Returns first name attached to address
     *
     * @return string|NULL
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * Sets first name attached to address
     *
     * @param string $first_name
     * @return self
     */
    public function setFirstName(?string $first_name): self
    {
        $this->first_name = $first_name;
        
        return $this;
    }

    /**
     * Returns last name attached to address
     *
     * @return string|NULL
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * Sets last name for address
     *
     * @param string $last_name
     * @return self
     */
    public function setLastName(?string $last_name): self
    {
        $this->last_name = $last_name;
        
        return $this;
    }

    /**
     * Returns company associated with this address
     *
     * @return string|NULL
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * Sets company associated with this address
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
     * Returns phone
     * 
     * @return string|NULL
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Sets phone
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
     * Returns email for address
     *
     * @return string|NULL
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    /**
     * Sets email for address
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
     * Returns street one for address
     *
     * @return string|NULL
     */
    public function getStreetOne(): ?string
    {
        return $this->street_1;
    }

    /**
     * Sets street one for address
     *
     * @param string $street
     * @return self
     */
    public function setStreetOne(?string $street): self
    {
        $this->street_1 = $street;
        
        return $this;
    }

    /**
     * Returns street two for address
     *
     * @return string|NULL
     */
    public function getStreetTwo(): ?string
    {
        return $this->street_2;
    }

    /**
     * Sets street two for address
     *
     * @param string $street
     * @return self
     */
    public function setStreetTwo(?string $street): self
    {
        $this->street_2 = $street;
        
        return $this;
    }

    /**
     * Returns city for address
     *
     * @return string|NULL
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Sets city for address
     *
     * @param string $city
     * @return self
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;
        
        return $this;
    }

    /**
     * Returns country for address
     *
     * @return string|NULL
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Sets country for address
     *
     * @param string $country
     * @return self
     */
    public function setCountry(?string $country): self
    {
        $this->country = $country;
        
        return $this;
    }

    /**
     * Returns iso 2 country for address
     *
     * @return string|NULL
     */
    public function getCountryIso2(): ?string
    {
        return $this->country_iso2;
    }

    /**
     * Sets iso 2 country for address
     *
     * @param string $country
     * @return self
     */
    public function setCountryIso2(?string $country): self
    {
        $this->country_iso2 = $country;
        
        return $this;
    }

    /**
     * Returns zip code for address
     *
     * @return string|NULL
     */
    public function getZipCode(): ?string
    {
        return $this->zip;
    }

    /**
     * Sets zip code for address
     *
     * @param string $street
     * @return self
     */
    public function setZipCode(?string $zip): self
    {
        $this->zip = $zip;
        
        return $this;
    }

    /**
     * Returns state for address
     *
     * @return string|NULL
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets state for address
     *
     * @param string $state
     * @return self
     */
    public function setState(?string $state): self
    {
        $this->state = $state;
        
        return $this;
    }

    /**
     * Returns address type
     *
     * @return string|NULL
     */
    public function getType(): ?string
    {
        return $this->address_type;
    }

    /**
     * Sets address type
     *
     * @param string $type
     * @return self
     */
    public function setType(?string $type): self
    {
        $this->address_type = $type;
        
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
            $instance->setId((int)static::readAttribute($model, 'id'));
            $instance->setFirstName(static::readAttribute($model, 'first_name'));
            $instance->setLastName(static::readAttribute($model, 'last_name'));
            $instance->setCompany(static::readAttribute($model, 'company'));
            $instance->setStreetOne(static::readAttribute($model, 'street_1'));
            $instance->setStreetTwo(static::readAttribute($model, 'street_2'));
            $instance->setCity(static::readAttribute($model, 'city'));
            $instance->setState(static::readAttribute($model, 'state'));
            $instance->setZipCode(static::readAttribute($model, 'zip'));
            $instance->setCountry(static::readAttribute($model, 'country'));
            $instance->setCountryIso2(static::readAttribute($model, 'country_iso2'));
            $instance->setPhone(static::readAttribute($model, 'phone'));
            $instance->setEmail(static::readAttribute($model, 'email'));
            $instance->setType(static::readAttribute($model, 'address_type'));
            
        }
        
        return $instance;
    }
}