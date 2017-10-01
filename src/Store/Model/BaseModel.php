<?php
declare(strict_types = 1);
namespace Maverickslab\Integration\BigCommerce\Store\Model;

use DateTime;
use Exception;

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
        $filteredProperties = get_object_vars($this);
        
        array_walk_recursive($filteredProperties, function (&$value) {
            if ($value instanceof self) {
                $value = $value->toArray();
            }
            
            if ($value instanceof \DateTime) {
                $value = $value->format(\DateTime::RSS);
            }
        });
        
        return $filteredProperties;
    }

    /**
     * Returns the internal representation of this model as expected by the
     * BigCommerce service
     *
     * @return array
     */
    public function toBigCommerceEntity(): array
    {
        $entityArray = $this->toArray();
        
        $this->propertyUnsetter($entityArray);
        
        return $entityArray;
    }

    /**
     * Removes un-needed properties from a given array
     *
     * @param array $arrayData
     */
    protected function propertyUnsetter(array &$arrayData)
    {
        foreach ($arrayData as $key => &$subData) {
            if (is_array($subData)) {
                
                $this->propertyUnsetter($subData);
                
                if (empty($subData)) {
                    unset($arrayData[$key]);
                }
            } else {
                if (! $subData && ! is_bool($subData)) {
                    unset($arrayData[$key]);
                }
            }
        }
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
    protected static function readAttribute($data, string $key, $default = null)
    {
        if (is_array($data)) {
            return array_key_exists($key, $data) ? $data[$key] : $default;
        }
        
        if (is_object($data)) {
            return isset($data->{$key}) ? $data->{$key} : $default;
        }
        
        return $default;
    }

    /**
     * Creates a new datetime instance from a given string
     *
     * @param string $datetime
     * @return DateTime|NULL
     */
    protected static function createDateTime(?string $datetime): ?DateTime
    {
        if (empty($datetime)) {
            return null;
        }
        
        try {
            return new DateTime($datetime);
        } catch (Exception $e) {
            return null;
        }
    }
}