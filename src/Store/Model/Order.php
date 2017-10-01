<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use DateTime;

/**
 * Order model
 *
 * @author cosman
 *        
 */
class Order extends BaseModel
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
    protected $customer_id = 0;

    /**
     *
     * @var Customer
     */
    protected $customer;

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
     * @var DateTime
     */
    protected $date_shipped;

    /**
     *
     * @var int
     */
    protected $status_id;

    /**
     *
     * @var string
     */
    protected $status;

    /**
     *
     * @var string
     */
    protected $custom_status;

    /**
     *
     * @var float
     */
    protected $subtotal_ex_tax;

    /**
     *
     * @var float
     */
    protected $subtotal_inc_tax;

    /**
     *
     * @var float
     */
    protected $subtotal_tax;

    /**
     *
     * @var float
     */
    protected $base_shipping_cost;

    /**
     * Shipping cost excluding tax
     *
     * @var float
     */
    protected $shipping_cost_ex_tax;

    /**
     * Shipping cost including tax
     *
     * @var float
     */
    protected $shipping_cost_inc_tax;

    /**
     *
     * @var float
     */
    protected $shipping_cost_tax;

    /**
     *
     * @var int
     */
    protected $shipping_cost_tax_class_id;

    /**
     *
     * @var float
     */
    protected $base_handling_cost;

    /**
     *
     * @var float
     */
    protected $handling_cost_ex_tax;

    /**
     *
     * @var float
     */
    protected $handling_cost_inc_tax;

    /**
     *
     * @var float
     */
    protected $handling_cost_tax;

    /**
     *
     * @var int
     */
    protected $handling_cost_tax_class_id;

    /**
     *
     * @var float
     */
    protected $base_wrapping_cost;

    /**
     *
     * @var float
     */
    protected $wrapping_cost_ex_tax;

    /**
     *
     * @var float
     */
    protected $wrapping_cost_inc_tax;

    /**
     *
     * @var float
     */
    protected $wrapping_cost_tax;

    /**
     *
     * @var int
     */
    protected $wrapping_cost_tax_class_id;

    /**
     *
     * @var float
     */
    protected $total_ex_tax;

    /**
     *
     * @var float
     */
    protected $total_inc_tax;

    /**
     *
     * @var float
     */
    protected $total_tax;

    /**
     *
     * @var int
     */
    protected $items_total;

    /**
     *
     * @var int
     */
    protected $items_shipped;

    /**
     *
     * @var string
     */
    protected $payment_method;

    /**
     *
     * @var string
     */
    protected $payment_provider_id;

    /**
     *
     * @var string
     */
    protected $payment_status;

    /**
     *
     * @var float
     */
    protected $refunded_amount;

    /**
     *
     * @var bool
     */
    protected $order_is_digital;

    /**
     *
     * @var float
     */
    protected $store_credit_amount;

    /**
     *
     * @var float
     */
    protected $gift_certificate_amount;

    /**
     *
     * @var string
     */
    protected $ip_address;

    /**
     *
     * @var string
     */
    protected $geoip_country;

    /**
     *
     * @var string
     */
    protected $geoip_country_iso2;

    /**
     *
     * @var int
     */
    protected $currency_id;

    /**
     *
     * @var string
     */
    protected $currency_code;

    /**
     *
     * @var float
     */
    protected $currency_exchange_rate;

    /**
     *
     * @var int
     */
    protected $default_currency_id;

    /**
     *
     * @var string
     */
    protected $default_currency_code;

    /**
     *
     * @var string
     */
    protected $staff_notes;

    /**
     *
     * @var string
     */
    protected $customer_message;

    /**
     *
     * @var float
     */
    protected $discount_amount;

    /**
     *
     * @var float
     */
    protected $coupon_discount;

    /**
     *
     * @var int
     */
    protected $shipping_address_count;

    /**
     *
     * @var bool
     */
    protected $is_deleted;

    /**
     *
     * @var bool
     */
    protected $is_email_opt_in;

    /**
     *
     * @var string
     */
    protected $ebay_order_id;

    /**
     *
     * @var BillingAddress
     */
    protected $billing_address;

    /**
     *
     * @var string
     */
    protected $order_source;

    /**
     *
     * @var string
     */
    protected $external_source;

    /**
     *
     * @var OrderedProduct[]
     */
    protected $products = [];

    /**
     *
     * @var ShippingAddress[]
     */
    protected $shipping_addresses = [];

    /**
     *
     * @var OrderCoupon[]
     */
    protected $coupons = [];

    /**
     * Returns order Id
     *
     * @return int|NULL
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Sets order Id
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
     * Returns order customer Id
     *
     * @return int|NULL
     */
    public function getCustomerId(): ?int
    {
        return $this->customer_id;
    }

    /**
     * Sets order customer Id
     *
     * @param int $id
     * @return self
     */
    public function setCustomerId(?int $id): self
    {
        $this->customer_id = $id;
        
        return $this;
    }

    /**
     * Returns order customer
     *
     * @return Customer|NULL
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * Sets customer for order
     *
     * @param Customer $customer
     * @return self
     */
    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;
        
        return $this;
    }

    /**
     * Returns date and time on which order was created
     *
     * @return DateTime|NULL
     */
    public function getDateCreated(): ?DateTime
    {
        return $this->date_created;
    }

    /**
     * Sets date and time on which order was created
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
     * Returns date and time on which order was last modified
     *
     * @return DateTime|NULL
     */
    public function getDateModified(): ?DateTime
    {
        return $this->date_modified;
    }

    /**
     * Sets date and time on which order was last modified
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
     * Return date and time on which order was shipped
     *
     * @return DateTime|NULL
     */
    public function getDateShipped(): ?DateTime
    {
        return $this->date_shipped;
    }

    /**
     * Sets date and time on which order was shipped
     *
     * @param DateTime $datetime
     * @return self
     */
    public function setDateShipped(?DateTime $datetime): self
    {
        $this->date_shipped = $datetime;
        
        return $this;
    }

    /**
     * Returns order status Id
     *
     * @return int|NULL
     */
    public function getStatusId(): ?int
    {
        return $this->status_id;
    }

    /**
     * Sets order status Id
     *
     * @param int $id
     * @return self
     */
    public function setStatusId(?int $id): self
    {
        $this->status_id = $id;
        
        return $this;
    }

    /**
     * Returns order status
     *
     * @return string|NULL
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets order status
     *
     * @param string $status
     * @return self
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;
        
        return $this;
    }

    /**
     * Returns order custom status
     *
     * @return string|NULL
     */
    public function getCustomStatus(): ?string
    {
        return $this->custom_status;
    }

    /**
     * Sets custom status for order
     *
     * @param string $status
     * @return self
     */
    public function setCustomStatus(?string $status): self
    {
        $this->custom_status = $status;
        
        return $this;
    }

    /**
     * Returns order sub total excluding tax
     *
     * @return float|NULL
     */
    public function getSubTotalExcludingTax(): ?float
    {
        return $this->subtotal_ex_tax;
    }

    /**
     * Sets order sub total excluding tax
     *
     * @param float $subtotal
     * @return self
     */
    public function setSubTotalExcludingTax(?float $subtotal): self
    {
        $this->subtotal_ex_tax = $subtotal;
        
        return $this;
    }

    /**
     * Returns order sub total including tax
     *
     * @return float|NULL
     */
    public function getSubTotalIncludingTax(): ?float
    {
        return $this->subtotal_inc_tax;
    }

    /**
     * Sets sub total including tax
     *
     * @param float $subtotal
     * @return self
     */
    public function setSubTotalIncludingTax(?float $subtotal): self
    {
        $this->subtotal_inc_tax = $subtotal;
        
        return $this;
    }

    /**
     * Returns sub total tax
     *
     * @return float|NULL
     */
    public function getSubTotalTax(): ?float
    {
        return $this->subtotal_tax;
    }

    /**
     * Sets sub total tax
     *
     * @param float $tax
     * @return self
     */
    public function setSubTotalTax(?float $tax): self
    {
        $this->subtotal_tax = $tax;
        
        return $this;
    }

    /**
     * Returns base shipping cost
     *
     * @return float|NULL
     */
    public function getBaseShippingCost(): ?float
    {
        return $this->base_shipping_cost;
    }

    /**
     * Sets base shipping cost
     *
     * @param float $amount
     * @return self
     */
    public function setBaseShippingCost(?float $amount): self
    {
        $this->base_shipping_cost = $amount;
        
        return $this;
    }

    /**
     * Returns shipping cost excluding tax
     *
     * @return float|NULL
     */
    public function getShippingCostExcludingTax(): ?float
    {
        return $this->shipping_cost_ex_tax;
    }

    /**
     * Sets shipping cost excluding tax
     *
     * @param float $amount
     * @return self
     */
    public function setShippingCostExcludingTax(?float $amount): self
    {
        $this->shipping_cost_ex_tax = $amount;
        
        return $this;
    }

    /**
     * Returns shipping cost including tax
     *
     * @return float|NULL
     */
    public function getShippingCostIncludingTax(): ?float
    {
        return $this->shipping_cost_inc_tax;
    }

    /**
     * Sets shipping cost including tax
     *
     * @param float $amount
     * @return self
     */
    public function setShippingCostIncludingTax(?float $amount): self
    {
        $this->shipping_cost_inc_tax = $amount;
        
        return $this;
    }

    /**
     * Returns shipping cost tax
     *
     * @return float|NULL
     */
    public function getShippingCostTax(): ?float
    {
        return $this->shipping_cost_tax;
    }

    /**
     * Sets shipping cost tax
     *
     * @param float $amount
     * @return self
     */
    public function setShippingCostTax(?float $amount): self
    {
        $this->shipping_cost_tax = $amount;
        
        return $this;
    }

    /**
     * Returns shipping cost tax class Id
     *
     * @return int|NULL
     */
    public function getShippingCostTaxClassId(): ?int
    {
        return $this->shipping_cost_tax_class_id;
    }

    /**
     * Sets shipping cost tax class id
     *
     * @param int $id
     * @return self
     */
    public function setShippingCostTaxClassId(?int $id): self
    {
        $this->shipping_cost_tax_class_id;
        
        return $this;
    }

    /**
     * Returns base handling cost
     *
     * @return float|NULL
     */
    public function getBaseHandlingCost(): ?float
    {
        return $this->base_handling_cost;
    }

    /**
     * Sets base handling cost
     *
     * @param float $amount
     * @return self
     */
    public function setBaseHandlingCost(?float $amount): self
    {
        $this->base_handling_cost = $amount;
        
        return $this;
    }

    /**
     * Returns handling cost excluding tax
     *
     * @return float|NULL
     */
    public function getHandlingCostExcludingTax(): ?float
    {
        return $this->handling_cost_ex_tax;
    }

    /**
     * Sets handling cost excluding tax
     *
     * @param float $amount
     * @return self
     */
    public function setHandlingCostExcludingTax(?float $amount): self
    {
        $this->handling_cost_ex_tax = $amount;
        
        return $this;
    }

    /**
     * Returns handling cost including tax
     *
     * @return float|NULL
     */
    public function getHandlingCostIncludingTax(): ?float
    {
        return $this->handling_cost_inc_tax;
    }

    /**
     * Sets handling cost including tax
     *
     * @param float $amount
     * @return self
     */
    public function setHandlingCostIncludingTax(?float $amount): self
    {
        $this->handling_cost_inc_tax = $amount;
        
        return $this;
    }

    /**
     * Returns handling cost tax
     *
     * @return float|NULL
     */
    public function getHandlingCostTax(): ?float
    {
        return $this->handling_cost_tax;
    }

    /**
     * Sets handling cost tax
     *
     * @param float $amount
     * @return self
     */
    public function setHandlingCostTax(?float $amount): self
    {
        $this->handling_cost_tax = $amount;
        
        return $this;
    }

    /**
     * Returns handling cost tax class id
     *
     * @return int|NULL
     */
    public function getHandlingCostTaxClassId(): ?int
    {
        return $this->handling_cost_tax_class_id;
    }

    /**
     * Sets handling cost tax class id
     *
     * @param int $id
     * @return self
     */
    public function setHandlingCostTaxClassId(?int $id): self
    {
        $this->handling_cost_tax_class_id = $id;
        
        return $this;
    }

    /**
     * Returns base wrapping cost
     *
     * @return float|NULL
     */
    public function getBaseWrappingCost(): ?float
    {
        return $this->base_wrapping_cost;
    }

    /**
     * Sets base wrapping cost
     *
     * @param float $amount
     * @return self
     */
    public function setBaseWrappingCost(?float $amount): self
    {
        $this->base_wrapping_cost = $amount;
        
        return $this;
    }

    /**
     * Returns wrapping cost excluding tax
     *
     * @return float|NULL
     */
    public function getWrappingCostExcludingTax(): ?float
    {
        return $this->wrapping_cost_ex_tax;
    }

    /**
     * Sets wrapping cost excluding tax
     *
     * @param float $amount
     * @return self
     */
    public function setWrappingCostExcludingTax(?float $amount): self
    {
        $this->wrapping_cost_ex_tax = $amount;
        
        return $this;
    }

    /**
     * Returns wrapping cost including tax
     *
     * @return float|NULL
     */
    public function getWrappingCostIncludingTax(): ?float
    {
        return $this->wrapping_cost_inc_tax;
    }

    /**
     * Sets wrapping cost including tax
     *
     * @param float $amount
     * @return self
     */
    public function setWrappingCostIncludingTax(?float $amount): self
    {
        $this->wrapping_cost_inc_tax = $amount;
        
        return $this;
    }

    /**
     * Returns wrapping cost tax
     *
     * @return float|NULL
     */
    public function getWrappingCostTax(): ?float
    {
        return $this->wrapping_cost_tax;
    }

    /**
     * Sets wrapping cost tax
     *
     * @param float $amount
     * @return self
     */
    public function setWrappingCostTax(?float $amount): self
    {
        $this->wrapping_cost_tax = $amount;
        
        return $this;
    }

    /**
     * Returns wrapping cost tax class id
     *
     * @return int|NULL
     */
    public function getWrappingCostTaxClassId(): ?int
    {
        return $this->wrapping_cost_tax_class_id;
    }

    /**
     * Sets wrapping cost tax class Id
     *
     * @param int $id
     * @return self
     */
    public function setWrappingCostTaxClassId(?int $id): self
    {
        $this->wrapping_cost_tax_class_id = $id;
        
        return $this;
    }

    /**
     * Returns total excluding tax
     *
     * @return float|NULL
     */
    public function getTotalExcludingTax(): ?float
    {
        return $this->total_ex_tax;
    }

    /**
     * Sets total excluding tax
     *
     * @param float $amount
     * @return self
     */
    public function setTotalExcludingTax(?float $amount): self
    {
        $this->total_ex_tax = $amount;
        return $this;
    }

    /**
     * Returns total including tax
     *
     * @return float|NULL
     */
    public function getTotalIncludingTax(): ?float
    {
        return $this->total_inc_tax;
    }

    /**
     * Sets total including tax
     *
     * @param float $amount
     * @return self
     */
    public function setTotalIncludingTax(?float $amount): self
    {
        $this->total_inc_tax = $amount;
        
        return $this;
    }

    /**
     * Returns total tax
     *
     * @return float|NULL
     */
    public function getTotalTax(): ?float
    {
        return $this->total_tax;
    }

    /**
     * Sets total tax
     *
     * @param float $amount
     * @return self
     */
    public function setTotalTax(?float $amount): self
    {
        $this->total_tax = $amount;
        
        return $this;
    }

    /**
     * Returns items total
     *
     * @return int|NULL
     */
    public function getItemsTotal(): ?int
    {
        return $this->items_total;
    }

    /**
     * Sets items total
     *
     * @param int $total
     * @return self
     */
    public function setItemsTotal(?int $total): self
    {
        $this->items_total = $total;
        
        return $this;
    }

    /**
     * Returns items shipped
     *
     * @return int|NULL
     */
    public function getItemsShipped(): ?int
    {
        return $this->items_shipped;
    }

    /**
     * Sets items shipped
     *
     * @param int $total
     * @return self
     */
    public function setItemsShipped(?int $total): self
    {
        $this->items_shipped = $total;
        
        return $this;
    }

    /**
     * Returns payment method
     *
     * @return string|NULL
     */
    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    /**
     * Sets payment method
     *
     * @param string $method
     * @return self
     */
    public function setPaymentMethod(?string $method): self
    {
        $this->payment_method = $method;
        
        return $this;
    }

    /**
     * Returns payment provider id
     *
     * @return string|NULL
     */
    public function getPaymentProviderId(): ?string
    {
        return $this->payment_provider_id;
    }

    /**
     * Sets payment provider id
     *
     * @param string $id
     * @return self
     */
    public function setPaymentProviderId(?string $id): self
    {
        $this->payment_provider_id = $id;
        
        return $this;
    }

    /**
     * Returns payment status
     *
     * @return string|NULL
     */
    public function getPaymentStatus(): ?string
    {
        return $this->payment_status;
    }

    /**
     * Sets payment status
     *
     * @param string $status
     * @return self
     */
    public function setPaymentStatus(?string $status): self
    {
        $this->payment_status = $status;
        
        return $this;
    }

    /**
     * Returns refunded amount
     *
     * @return float|NULL
     */
    public function getRefundedAmount(): ?float
    {
        return $this->refunded_amount;
    }

    /**
     * Sets refunded amount
     *
     * @param float $amount
     * @return self
     */
    public function setRefundedAmount(?float $amount): self
    {
        $this->refunded_amount = $amount;
        
        return $this;
    }

    /**
     * Tells if this is an order for digital product
     *
     * @return bool|NULL
     */
    public function isDigital(): ?bool
    {
        return $this->order_is_digital;
    }

    /**
     * Sets if whether this is an order for digital products
     *
     * @param bool $status
     * @return self
     */
    public function setIsDigital(?bool $status): self
    {
        $this->order_is_digital = $status;
        
        return $this;
    }

    /**
     * Returns store credit amount
     *
     * @return float|NULL
     */
    public function getStoreCreditAmount(): ?float
    {
        return $this->store_credit_amount;
    }

    /**
     * Sets store credit amount
     *
     * @param float $amount
     * @return self
     */
    public function setStoreCreditAmount(?float $amount): self
    {
        $this->store_credit_amount = $amount;
        
        return $this;
    }

    /**
     * Returns gift certificate amount
     *
     * @return float|NULL
     */
    public function getGiftCertificateAmount(): ?float
    {
        return $this->gift_certificate_amount;
    }

    /**
     * Sets gift certificate amount
     *
     * @param float $amount
     * @return self
     */
    public function setGiftCertificateAmount(?float $amount): self
    {
        $this->gift_certificate_amount = $amount;
        
        return $this;
    }

    /**
     * Returns customer ip address
     *
     * @return string|NULL
     */
    public function getCustomerIpAddress(): ?string
    {
        return $this->ip_address;
    }

    /**
     * Sets customer IP address
     *
     * @param string $ip
     * @return self
     */
    public function setCustomerIpAddress(?string $ip): self
    {
        $this->ip_address = $ip;
        
        return $this;
    }

    /**
     * Returns country where customer made the purchase based on IP address
     *
     * @return string|NULL
     */
    public function getCustomerCountry(): ?string
    {
        return $this->geoip_country;
    }

    /**
     * Sets country where country made the purchase based on IP address
     *
     * @param string $country
     * @return self
     */
    public function setCustomerCountry(?string $country): self
    {
        $this->geoip_country = $country;
        
        return $this;
    }

    /**
     * Returns ISO 2 country name where customer made purchase based on IP address
     *
     * @return string|NULL
     */
    public function getCustomerCountryIso2(): ?string
    {
        return $this->geoip_country_iso2;
    }

    /**
     * Sets ISO 2 country name where customer made purchase based on IP address
     *
     * @param string $country
     * @return self
     */
    public function setCustomerCountryIso2(?string $country): self
    {
        $this->geoip_country_iso2 = $country;
        
        return $this;
    }

    /**
     * Returns the ID of the currency being used in this transaction
     *
     * @return int|NULL
     */
    public function getCurrencyId(): ?int
    {
        return $this->currency_id;
    }

    /**
     * Sets the ID of the currency being used in this transaction
     *
     * @param int $id
     * @return self
     */
    public function setCurrencyId(?int $id): self
    {
        $this->currency_id = $id;
        
        return $this;
    }

    /**
     * Returns the currency code of the currency being used in this transaction
     *
     * @return string|NULL
     */
    public function getCurrencyCode(): ?string
    {
        return $this->currency_code;
    }

    /**
     * Sets the currency code of the currency being used in this transaction
     *
     * @param string $code
     * @return self
     */
    public function setCurrencyCode(?string $code): self
    {
        $this->currency_code = $code;
        
        return $this;
    }

    /**
     * Returns ccurrency exchange rate
     *
     * @return float|NULL
     */
    public function getCurrencyExchangeRate(): ?float
    {
        return $this->currency_exchange_rate;
    }

    /**
     * Sets currency exchange rate
     *
     * @param float $rate
     * @return self
     */
    public function setCurrencyExchangeRate(?float $rate): self
    {
        $this->currency_exchange_rate = $rate;
        
        return $this;
    }

    /**
     * Returns default currency id
     *
     * @return int|NULL
     */
    public function getDefaultCurrencyId(): ?int
    {
        return $this->default_currency_id;
    }

    /**
     * Sets default currency id
     *
     * @param int $id
     * @return self
     */
    public function setDefaultCurrencyId(?int $id): self
    {
        $this->default_currency_id = $id;
        
        return $this;
    }

    /**
     * Returns default currency code
     *
     * @return string|NULL
     */
    public function getDefaultCurrencyCode(): ?string
    {
        return $this->default_currency_code;
    }

    /**
     * Sets default currency code
     *
     * @param string $code
     * @return self
     */
    public function setDefaultCurrencyCode(?string $code): self
    {
        $this->default_currency_code = $code;
        
        return $this;
    }

    /**
     * Returns additional notes for staff
     *
     * @return string|NULL
     */
    public function getStaffNotes(): ?string
    {
        return $this->staff_notes;
    }

    /**
     * Sets additional notes for staff
     *
     * @param string $notes
     * @return self
     */
    public function setStaffNotes(?string $notes): self
    {
        $this->staff_notes = $notes;
        
        return $this;
    }

    /**
     * Returns message that the customer entered into the Order Comments box during checkout
     *
     * @return string|NULL
     */
    public function getCustomerMessage(): ?string
    {
        return $this->customer_message;
    }

    /**
     * Sets message that the customer entered into the Order Comments box during checkout
     *
     * @param string $message
     * @return self
     */
    public function setCustomerMessage(?string $message): self
    {
        $this->customer_message = $message;
        
        return $this;
    }

    /**
     * Returns amount of discount for this transaction
     *
     * @return float|NULL
     */
    public function getDiscountAmount(): ?float
    {
        return $this->discount_amount;
    }

    /**
     * Sets amount of discount for this transaction
     *
     * @param float $amount
     * @return self
     */
    public function setDiscountAmount(?float $amount): self
    {
        $this->discount_amount = $amount;
        
        return $this;
    }

    /**
     * Returns coupon discount
     *
     * @return float|NULL
     */
    public function getCouponDiscount(): ?float
    {
        return $this->coupon_discount;
    }

    /**
     * Sets coupon discount
     *
     * @param float $amount
     * @return self
     */
    public function setCouponDiscount(?float $amount): self
    {
        $this->coupon_discount = $amount;
        
        return $this;
    }

    /**
     * Returns shipping address count
     *
     * @return int|NULL
     */
    public function getShippingAddressCount(): ?int
    {
        return $this->shipping_address_count;
    }

    /**
     * Sets shipping address counts
     *
     * @param int $count
     * @return self
     */
    public function setShippingAddressCount(?int $count): self
    {
        $this->shipping_address_count = $count;
        
        return $this;
    }

    /**
     * Returns whether the order was deleted (archived)
     *
     * @return bool|NULL
     */
    public function isDeleted(): ?bool
    {
        return $this->is_deleted;
    }

    /**
     * Sets whether the order was deleted (archived)
     *
     * @param bool $state
     * @return self
     */
    public function setIsDeleted(?bool $state): self
    {
        $this->is_deleted = $state;
        
        return $this;
    }

    /**
     * Returns whether the shopper has selected an opt-in check box (on the checkout page) to receive emails
     *
     * @return bool|NULL
     */
    public function isEmailOptIn(): ?bool
    {
        return $this->is_email_opt_in;
    }

    /**
     * Sets whether the shopper has selected an opt-in check box (on the checkout page) to receive emails
     *
     * @param bool $state
     * @return self
     */
    public function setIsEmailOptIn(?bool $state): self
    {
        $this->is_email_opt_in = $state;
        
        return $this;
    }

    /**
     * Returns ebay order id
     *
     * @return string|NULL
     */
    public function getEbayOrderId(): ?string
    {
        return $this->ebay_order_id;
    }

    /**
     * Sets ebay order Id
     *
     * @param string $id
     * @return self
     */
    public function setEbayOrderId(?string $id): self
    {
        $this->ebay_order_id = $id;
        
        return $this;
    }

    /**
     * Returns order billing address
     *
     * @return BillingAddress|NULL
     */
    public function getBillingAddress(): ?BillingAddress
    {
        return $this->billing_address;
    }

    /**
     * Sets billing address
     *
     * @param BillingAddress $address
     * @return self
     */
    public function setBillingAddress(?BillingAddress $address): self
    {
        $this->billing_address = $address;
        
        return $this;
    }

    /**
     * Returns order source
     *
     * @return string|NULL
     */
    public function getOrderSource(): ?string
    {
        return $this->order_source;
    }

    /**
     * Sets order source
     *
     * @param string $source
     * @return self
     */
    public function setOrderSource(?string $source): self
    {
        $this->order_source = $source;
        
        return $this;
    }

    /**
     * Returns external source from which order was submitted
     *
     * @return string|NULL
     */
    public function getExternalSource(): ?string
    {
        return $this->external_source;
    }

    /**
     * Sets external source from which order was submitted
     *
     * @param string $source
     * @return self
     */
    public function setExternalSource(?string $source): self
    {
        $this->external_source = $source;
        
        return $this;
    }

    /**
     * Returns products in order
     *
     * @return OrderedProduct[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * Adds products to order
     *
     * @param OrderedProduct ...$products
     * @return self
     */
    public function addProducts(OrderedProduct ...$products): self
    {
        foreach ($products as $product) {
            $this->products[] = $product;
        }
        
        return $this;
    }

    /**
     * Returns shipping address for order
     *
     * @return array
     */
    public function getShippingAddresses(): array
    {
        return $this->shipping_addresses;
    }

    /**
     * Adds at least one shipping address to order
     *
     * @param ShippingAddress ...$addresses
     * @return self
     */
    public function addShippingAddresses(ShippingAddress ...$addresses): self
    {
        foreach ($addresses as $address) {
            $this->shipping_addresses[] = $address;
        }
        
        return $this;
    }

    /**
     * Returns coupons associated with order
     *
     * @return OrderCoupon[]
     */
    public function getCoupons(): array
    {
        return $this->coupons;
    }

    /**
     * Adds at least one coupon to order
     *
     * @param OrderCoupon ...$coupons
     * @return self
     */
    public function addCoupons(OrderCoupon ...$coupons): self
    {
        foreach ($coupons as $coupon) {
            $this->coupons[] = $coupon;
        }
        
        return $this;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Maverickslab\Integration\BigCommerce\Store\Model\BaseModel::toBigCommerceEntity()
     */
    public function toBigCommerceEntity(): array
    {
        $entityArray = parent::toBigCommerceEntity();
        
        $readOnlyProperties = array(
            'is_email_opt_in',
            'coupons',
            'is_deleted',
            'shipping_address_count',
            'coupon_discount',
            'default_currency_code',
            'default_currency_id',
            'currency_exchange_rate',
            'currency_code',
            'currency_id',
            'gift_certificate_amount',
            'store_credit_amount',
            'payment_status',
            'total_tax',
            'wrapping_cost_tax_class_id',
            'wrapping_cost_tax',
            'handling_cost_tax_class_id',
            'handling_cost_tax',
            'shipping_cost_tax_class_id',
            'shipping_cost_tax',
            'subtotal_tax',
            'status',
            'date_shipped',
            'date_modified',
            'id',
            'customer'
        );
        
        foreach ($readOnlyProperties as $property) {
            unset($entityArray[$property]);
        }
        
        return $entityArray;
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
            $instance->setId((int) static::readAttribute($model, 'id', 0));
            $instance->setCustomerId((int) static::readAttribute($model, 'customer_id', 0));
            
            $instance->setDateCreated(static::createDateTime(static::readAttribute($model, 'date_created')));
            
            $instance->setDateModified(static::createDateTime(static::readAttribute($model, 'date_modified')));
            
            $instance->setDateShipped(static::createDateTime(static::readAttribute($model, 'date_shipped')));
            
            $instance->setStatusId((int) static::readAttribute($model, 'status_id'));
            $instance->setStatus(static::readAttribute($model, 'status'));
            $instance->setCustomStatus(static::readAttribute($model, 'custom_status'));
            $instance->setSubTotalExcludingTax((float) static::readAttribute($model, 'subtotal_ex_tax', 0));
            $instance->setSubTotalIncludingTax((float) static::readAttribute($model, 'subtotal_inc_tax', 0));
            $instance->setSubTotalTax((float) static::readAttribute($model, 'subtotal_tax', 0));
            $instance->setBaseShippingCost((float) static::readAttribute($model, 'base_shipping_cost', 0));
            $instance->setShippingCostExcludingTax((float) static::readAttribute($model, 'shipping_cost_ex_tax', 0));
            $instance->setShippingCostIncludingTax((float) static::readAttribute($model, 'shipping_cost_inc_tax', 0));
            $instance->setShippingCostTax((float) static::readAttribute($model, 'shipping_cost_tax', 0));
            $instance->setShippingCostTaxClassId((int) static::readAttribute($model, 'shipping_cost_tax_class_id', 0));
            $instance->setBaseHandlingCost((float) static::readAttribute($model, 'base_handling_cost', 0));
            $instance->setHandlingCostExcludingTax((float) static::readAttribute($model, 'handling_cost_ex_tax', 0));
            $instance->setHandlingCostIncludingTax((float) static::readAttribute($model, 'handling_cost_inc_tax', 0));
            $instance->setHandlingCostTax((float) static::readAttribute($model, 'handling_cost_tax', 0));
            $instance->setHandlingCostTaxClassId((int) static::readAttribute($model, 'handling_cost_tax_class_id', 0));
            $instance->setBaseWrappingCost((float) static::readAttribute($model, 'base_wrapping_cost', 0));
            $instance->setWrappingCostExcludingTax((float) static::readAttribute($model, 'wrapping_cost_ex_tax', 0));
            $instance->setWrappingCostIncludingTax((float) static::readAttribute($model, 'wrapping_cost_inc_tax', 0));
            $instance->setWrappingCostTax((float) static::readAttribute($model, 'wrapping_cost_tax', 0));
            $instance->setWrappingCostTaxClassId((int) static::readAttribute($model, 'wrapping_cost_tax_class_id', 0));
            $instance->setTotalTax((float) static::readAttribute($model, 'total_tax', 0));
            $instance->setTotalExcludingTax((float) static::readAttribute($model, 'total_ex_tax', 0));
            $instance->setTotalIncludingTax((float) static::readAttribute($model, 'total_inc_tax', 0));
            $instance->setItemsTotal((int) static::readAttribute($model, 'items_total', 0));
            $instance->setItemsShipped((int) static::readAttribute($model, 'items_shipped', 0));
            $instance->setPaymentMethod(static::readAttribute($model, 'payment_method'));
            $instance->setPaymentProviderId(static::readAttribute($model, 'payment_provider_id'));
            $instance->setPaymentStatus(static::readAttribute($model, 'payment_status'));
            $instance->setRefundedAmount((float) static::readAttribute($model, 'refunded_amount', 0));
            $instance->setIsDigital(static::readAttribute($model, 'order_is_digital', false));
            $instance->setStoreCreditAmount((float) static::readAttribute($model, 'store_credit_amount', 0));
            $instance->setGiftCertificateAmount((float) static::readAttribute($model, 'gift_certificate_amount', 0));
            $instance->setCustomerIpAddress(static::readAttribute($model, 'ip_address'));
            $instance->setCustomerCountry(static::readAttribute($model, 'geoip_country'));
            $instance->setCustomerCountryIso2(static::readAttribute($model, 'geoip_country_iso2'));
            $instance->setCurrencyId((int) static::readAttribute($model, 'currency_id'));
            $instance->setCurrencyCode(static::readAttribute($model, 'currency_code'));
            $instance->setCurrencyExchangeRate((float) static::readAttribute($model, 'currency_exchange_rate'));
            $instance->setDefaultCurrencyId((int) static::readAttribute($model, 'default_currency_id'));
            $instance->setDefaultCurrencyCode(static::readAttribute($model, 'default_currency_code'));
            $instance->setStaffNotes(static::readAttribute($model, 'staff_notes'));
            $instance->setCustomerMessage(static::readAttribute($model, 'customer_message'));
            $instance->setDiscountAmount((float) static::readAttribute($model, 'discount_amount', 0));
            $instance->setCouponDiscount((float) static::readAttribute($model, 'coupon_discount', 0));
            $instance->setShippingAddressCount((int) static::readAttribute($model, 'shipping_address_count', 0));
            $instance->setIsDeleted(static::readAttribute($model, 'is_deleted', false));
            $instance->setIsEmailOptIn(static::readAttribute($model, 'is_email_opt_in', false));
            $instance->setEbayOrderId(static::readAttribute($model, 'ebay_order_id'));
            $instance->setBillingAddress(BillingAddress::fromBigCommerce(static::readAttribute($model, 'billing_address')));
            $instance->setOrderSource(static::readAttribute($model, 'order_source'));
            $instance->setExternalSource(static::readAttribute($model, 'external_source'));
            
            $productModelArray = static::readAttribute($model, 'products', []);
            
            if (is_array($productModelArray) && count($productModelArray) > 0) {
                $products = array_map(function ($productModel) {
                    return OrderedProduct::fromBigCommerce($productModelArray);
                }, $productModelArray);
                
                $instance->addProducts(...$products);
            }
            
            $customerModel = static::readAttribute($model, 'customer');
            
            if (null !== $customerModel) {
                $instance->setCustomer(Customer::fromBigCommerce($customerModel));
            }
            
            $shippingAddressesModels = static::readAttribute($model, 'shipping_addresses', []);
            
            if (is_array($shippingAddressesModels)) {
                $shippingAddresses = array_map(function ($shippingAddressModel) {
                    return ShippingAddress::fromBigCommerce($shippingAddressModel);
                }, $shippingAddressesModels);
                
                $instance->addShippingAddresses(...$shippingAddresses);
            }
            
            $couponModelArray = static::readAttribute($model, 'coupons', []);
            
            if (is_array($couponModelArray)) {
                $coupons = array_map(function ($couponModel) {
                    return OrderCoupon::fromBigCommerce($couponModel);
                }, $couponModelArray);
                
                $instance->addCoupons(...$coupons);
            }
        }
        
        return $instance;
    }
}