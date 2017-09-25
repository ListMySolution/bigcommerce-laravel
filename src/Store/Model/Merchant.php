<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

/**
 * Merchant model
 *
 * @author cosman
 *        
 */
class Merchant extends BaseModel
{

    /**
     *
     * @var string
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $domain;

    /**
     *
     * @var string
     */
    protected $secure_url;

    /**
     *
     * @var string
     */
    protected $name;

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
    protected $address;

    /**
     *
     * @var string
     */
    protected $country;

    /**
     *
     * @var string
     */
    protected $phone;

    /**
     *
     * @var string
     */
    protected $admin_email;

    /**
     *
     * @var string
     */
    protected $order_email;

    /**
     *
     * @var TimeZone
     */
    protected $timezone;

    /**
     *
     * @var string
     */
    protected $language;

    /**
     *
     * @var string
     */
    protected $currency;

    /**
     *
     * @var string
     */
    protected $currency_symbol;

    /**
     *
     * @var string
     */
    protected $decimal_separator;

    /**
     *
     * @var string
     */
    protected $thousands_separator;

    /**
     *
     * @var int
     */
    protected $decimal_places;

    /**
     *
     * @var string
     */
    protected $currency_symbol_location;

    /**
     *
     * @var string
     */
    protected $weight_units;

    /**
     *
     * @var string
     */
    protected $dimension_units;

    /**
     *
     * @var int
     */
    protected $dimension_decimal_places;

    /**
     *
     * @var string
     */
    protected $dimension_decimal_token;

    /**
     *
     * @var string
     */
    protected $dimension_thousands_token;

    /**
     *
     * @var string
     */
    protected $plan_name;

    /**
     *
     * @var string
     */
    protected $plan_level;

    /**
     *
     * @var string
     */
    protected $industry;

    /**
     *
     * @var Logo
     */
    protected $logo;

    /**
     *
     * @var bool
     */
    protected $is_price_entered_with_tax;

    /**
     * Returns store/merchant Id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets store Id
     *
     * @param string $id
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * Returns store/merchant domain
     *
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * Sets store/merchant domain
     *
     * @param string $domain
     * @return self
     */
    public function setDomain(?string $domain): self
    {
        $this->domain = $domain;
        
        return $this;
    }

    /**
     * Returns store/merchant's secure URL
     *
     * @return string|NULL
     */
    public function getSecureUrl(): ?string
    {
        return $this->secure_url;
    }

    /**
     * Sets store/merchant's secure URL
     *
     * @param string $url
     * @return self
     */
    public function setSecureUrl(?string $url): self
    {
        $this->secure_url = $url;
        
        return $this;
    }

    /**
     * Returns store name
     *
     * @return string|NULL
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets store name
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
     * Returns merchant's first name
     *
     * @return string|NULL
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * Sets merchant's last name
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
     * Retrns merchant's last name
     *
     * @return string|NULL
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * Sets merchant's last name
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
     * Returns merchant's address
     *
     * @return string|NULL
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Sets merchant's address
     *
     * @param string $address
     * @return self
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;
        
        return $this;
    }

    /**
     * Returns merchant's country
     *
     * @return string|NULL
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * Sets merchant's country
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
     * Returns merchant's phone
     *
     * @return string|NULL
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Sets merchant's phone
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
     * Returns admin email
     *
     * @return string|NULL
     */
    public function getAdminEmail(): ?string
    {
        return $this->admin_email;
    }

    /**
     * Sets store admin's email
     *
     * @param string $email
     * @return self
     */
    public function setAdminEmail(?string $email): self
    {
        $this->admin_email = $email;
        
        return $this;
    }

    /**
     * Returns order email
     *
     * @return string|NULL
     */
    public function getOrderEmail(): ?string
    {
        return $this->order_email;
    }

    /**
     * Sets order email
     *
     * @param string $email
     * @return self
     */
    public function setOrderEmail(?string $email): self
    {
        $this->order_email = $email;
        
        return $this;
    }

    /**
     * Returns timezone
     *
     * @return TimeZone|NULL
     */
    public function getTimeZone(): ?TimeZone
    {
        return $this->timezone;
    }

    /**
     * Sets timezone
     *
     * @param TimeZone $timezone
     * @return self
     */
    public function setTimeZone(?TimeZone $timezone): self
    {
        $this->timezone = $timezone;
        
        return $this;
    }

    /**
     * Returns language
     *
     * @return string|NULL
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * Sets store or merchant's language
     *
     * @param string $language
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        $this->language = $language;
        
        return $this;
    }

    /**
     * Returns store currency name
     *
     * @return string|NULL
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * Sets store currency
     *
     * @param string $currency
     * @return self
     */
    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;
        
        return $this;
    }

    /**
     * Returns store currency symbol
     *
     * @return string|NULL
     */
    public function getCurrencySymbol(): ?string
    {
        return $this->currency_symbol;
    }

    /**
     * Sets store currency symbol
     *
     * @param string $symbol
     * @return self
     */
    public function setCurrencySymbol(?string $symbol): self
    {
        $this->currency_symbol = $symbol;
        
        return $this;
    }

    /**
     * Returns store decimal separator
     *
     * @return string|NULL
     */
    public function getDecimalSeparator(): ?string
    {
        return $this->decimal_separator;
    }

    /**
     * Sets store's decimal separator
     *
     * @param string $separator
     * @return self
     */
    public function setDecimalSeparator(?string $separator): self
    {
        $this->decimal_separator = $separator;
        
        return $this;
    }

    /**
     * Returns store's thousand separator
     *
     * @return string|NULL
     */
    public function getThousandSeparator(): ?string
    {
        return $this->thousands_separator;
    }

    /**
     * Sets stores thousand separator
     *
     * @param string $separator
     * @return self
     */
    public function setThousandSeparator(?string $separator): self
    {
        $this->thousands_separator = $separator;
        
        return $this;
    }

    /**
     * Returns store/merchant prefered number of decimal places for numbers
     *
     * @return int|NULL
     */
    public function getDecimalPlaces(): ?int
    {
        return $this->decimal_places;
    }

    /**
     * Sets store's prefered number of decimal places
     *
     * @param int $points
     * @return self
     */
    public function setDecimalPlaces(?int $points): self
    {
        $this->decimal_places = $points;
        
        return $this;
    }

    /**
     * Returns store currency symbol location
     *
     * @return string|NULL
     */
    public function getCurrencySymbolLocation(): ?string
    {
        return $this->currency_symbol_location;
    }

    /**
     * Sets store's currency symbol location
     *
     * @param string $location
     * @return self
     */
    public function setCurrencySymbolLocation(?string $location): self
    {
        $this->currency_symbol_location = $location;
        
        return $this;
    }

    /**
     * Returns store weight units
     *
     * @return string|NULL
     */
    public function getWeightUnits(): ?string
    {
        return $this->weight_units;
    }

    /**
     * Sets store weight units
     *
     * @param string $unit
     * @return self
     */
    public function setWeightUnits(?string $unit): self
    {
        $this->weight_units = $unit;
        
        return $this;
    }

    /**
     * Returns store dimension units
     *
     * @return string|NULL
     */
    public function getDimensionUnits(): ?string
    {
        return $this->dimension_units;
    }

    /**
     * Sets store dimension units
     *
     * @param string $unit
     * @return self
     */
    public function setDimensionUnits(?string $unit): self
    {
        $this->dimension_units = $unit;
        
        return $this;
    }

    /**
     * Returns store dimension decimal places
     *
     * @return int|NULL
     */
    public function getDimensionDecimalPlaces(): ?int
    {
        return $this->dimension_decimal_places;
    }

    /**
     * Sets store prefered decimal places for dimensions
     *
     * @param int $points
     * @return self
     */
    public function setDimensionDecimalPlaces(?int $points): self
    {
        $this->dimension_decimal_places = $points;
        
        return $this;
    }

    /**
     * Returns store dimension decimal token
     *
     * @return string|NULL
     */
    public function getDimensionDecimalToken(): ?string
    {
        return $this->dimension_decimal_token;
    }

    /**
     * Sets token for dimension decimals
     *
     * @param string $token
     * @return self
     */
    public function setDimensionDecimalToken(?string $token): self
    {
        $this->dimension_decimal_token = $token;
        
        return $this;
    }

    /**
     * Returns dimension thousand separator token
     *
     * @return string|NULL
     */
    public function getDimensionThousandToken(): ?string
    {
        return $this->dimension_thousands_token;
    }

    /**
     * Sets dimension thousand separator token
     *
     * @param string $token
     * @return self
     */
    public function setDimensionThousandToken(?string $token): self
    {
        $this->dimension_thousands_token = $token;
        
        return $this;
    }

    /**
     * Returns store plan name
     *
     * @return string|NULL
     */
    public function getPlanName(): ?string
    {
        return $this->plan_name;
    }

    /**
     * Sets store plan name
     *
     * @param string $plan
     * @return self
     */
    public function setPlanName(?string $plan): self
    {
        $this->plan_name = $plan;
        
        return $this;
    }

    /**
     * Returns store plan level
     *
     * @return string|NULL
     */
    public function getPlanLevel(): ?string
    {
        return $this->plan_level;
    }

    /**
     * Sets store plan level
     *
     * @param string $level
     * @return self
     */
    public function setPlanLevel(?string $level): self
    {
        $this->plan_level = $level;
        
        return $this;
    }

    /**
     * Returns store industry
     *
     * @return string|NULL
     */
    public function getIndustry(): ?string
    {
        return $this->industry;
    }

    /**
     * Sets store industry
     *
     * @param string $industry
     * @return self
     */
    public function setIndustry(?string $industry): self
    {
        $this->industry = $industry;
        
        return $this;
    }

    /**
     * Returns store logo
     *
     * @return Logo|NULL
     */
    public function getLogo(): ?Logo
    {
        return $this->logo;
    }

    /**
     * Sets store logo
     *
     * @param Logo $logo
     * @return self
     */
    public function setLogo(?Logo $logo): self
    {
        $this->logo = $logo;
        
        return $this;
    }

    /**
     * Tells if store price is entered with tax
     *
     * @return bool|NULL
     */
    public function isPriceEnteredWithTax(): ?bool
    {
        return $this->is_price_entered_with_tax;
    }

    /**
     * Sets if store price is entered with tax
     *
     * @param bool $state
     * @return self
     */
    public function setIsPriceEnteredWithTax(?bool $state): self
    {
        $this->is_price_entered_with_tax = $state;
        
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
            $instance->setId(static::readAttribute($model, 'id'));
            $instance->setDomain(static::readAttribute($model, 'domain'));
            $instance->setSecureUrl(static::readAttribute($model, 'secure_url'));
            $instance->setName(static::readAttribute($model, 'name'));
            $instance->setFirstName(static::readAttribute($model, 'first_name'));
            $instance->setLastName(static::readAttribute($model, 'last_name'));
            $instance->setAddress(static::readAttribute($model, 'address'));
            $instance->setCountry(static::readAttribute($model, 'country'));
            $instance->setPhone(static::readAttribute($model, 'phone'));
            $instance->setAdminEmail(static::readAttribute($model, 'admin_email'));
            $instance->setOrderEmail(static::readAttribute($model, 'order_email'));
            $instance->setTimeZone(TimeZone::fromBigCommerce(static::readAttribute($model, 'timezone')));
            $instance->setLanguage(static::readAttribute($model, 'language'));
            $instance->setCurrency(static::readAttribute($model, 'currency'));
            $instance->setCurrencySymbol(static::readAttribute($model, 'currency_symbol'));
            $instance->setDecimalSeparator(static::readAttribute($model, 'decimal_separator'));
            $instance->setThousandSeparator(static::readAttribute($model, 'thousands_separator'));
            $instance->setDecimalPlaces((int) static::readAttribute($model, 'decimal_places'));
            $instance->setCurrencySymbolLocation(static::readAttribute($model, 'currency_symbol_location'));
            $instance->setWeightUnits(static::readAttribute($model, 'weight_units'));
            $instance->setDimensionUnits(static::readAttribute($model, 'dimension_units'));
            $instance->setDimensionDecimalPlaces((int) static::readAttribute($model, 'dimension_decimal_places'));
            $instance->setDimensionDecimalToken(static::readAttribute($model, 'dimension_decimal_token'));
            $instance->setDimensionThousandToken(static::readAttribute($model, 'dimension_thousands_token'));
            $instance->setPlanName(static::readAttribute($model, 'plan_name'));
            $instance->setPlanLevel(static::readAttribute($model, 'plan_level'));
            $instance->setIndustry(static::readAttribute($model, 'industry'));
            $instance->setLogo(Logo::fromBigCommerce(static::readAttribute($model, 'logo')));
            $instance->setIsPriceEnteredWithTax(static::readAttribute($model, 'is_price_entered_with_tax'));
        }
        
        return $instance;
    }
}
