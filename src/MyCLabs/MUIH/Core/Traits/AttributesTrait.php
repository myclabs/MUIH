<?php

namespace MyCLabs\MUIH\Core\Traits;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
trait AttributesTrait
{
    /**
     * @var array
     */
    protected $attributes = [];


    /**
     * @param string $attributeName
     * @param string $attributeValue
     * @return $this
     */
    public function setAttribute($attributeName, $attributeValue)
    {
        $this->attributes[$attributeName] = $attributeValue;

        return $this;
    }

    /**
     * @param string $attributeName
     * @return $this
     */
    public function unsetAttribute($attributeName)
    {
        unset($this->attributes[$attributeName]);

        return $this;
    }

    /**
     * @param string $attributeName
     * @return bool
     */
    public function hasAttribute($attributeName)
    {
        return isset($this->attributes[$attributeName]);
    }

    /**
     * @param string $attributeName
     * @return string
     */
    public function getAttribute($attributeName)
    {
        return ($this->hasAttribute($attributeName) ? $this->attributes[$attributeName] : null);
    }
}
