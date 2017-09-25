<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

abstract class BaseModel implements \JsonSerializable
{

    /**
     *
     * {@inheritdoc}
     * @see \JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Converts current instance to an associative array
     *
     * @return array
     */
    public function toArray()
    {
        return array_filter(get_object_vars($this), function ($value) {
            return is_array($value) ? ! empty($value) : isset($value);
        });
    }

    /**
     * Returns the internal representation of this model as expected by the
     * BigCommerce service
     *
     * @return array
     */
    public function toBigCommerceEntity(): array
    {
        return $this->toArray();
    }

    /**
     * Returns the internal representation of this model as expected by the SynCommerce system
     *
     * @return array
     */
    public function toSynCommerceEntity(): array
    {
        return $this->toArray();
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
        
        $modelArray = [];
        
        if (is_object($model)) {
            $modelArray = get_object_vars($model);
        } else {
            $modelArray = is_array($model) ? $model : (array) $model;
        }
        
        foreach ($modelArray as $key => $value) {
            $instance->{$key} = $value;
        }
        
        return $instance;
    }

    /**
     * Reads a property from a given data
     *
     * @param mixed $data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function readAttribute($data, string $key, $default = null)
    {
        if (is_array($data)) {
            return array_key_exists($key, $data) ? $data[$key] : $default;
        }
        
        if (is_object($data)) {
            return isset($data->{$key}) ? $data->{$key} : $default;
        }
        
        return $default;
    }
}