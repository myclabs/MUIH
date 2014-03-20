<?php

namespace MyCLabs\MUIH\Interfaces;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Interfaces
 */
interface AttributesInterface
{
    /**
     * @param string $attributeName
     * @return $this
     */
    public function setBooleanAttribute($attributeName);
    
    /**
     * @param string $attributeName
     * @param string $attributeValue
     * @return $this
     */
    public function setAttribute($attributeName, $attributeValue);

    /**
     * @param string $attributeName
     * @return $this
     */
    public function unsetAttribute($attributeName);

    /**
     * @param string $attributeName
     * @return bool
     */
    public function hasAttribute($attributeName);

    /**
     * @param string $attributeName
     * @return string
     */
    public function getAttribute($attributeName);

    /**
     * @return array
     */
    public function getAttributes();

    /**
     * @return string
     */
    public function getAttributesAsString();

    /**
     * @param $className
     * @return $this
     */
    public function addClass($className);

    /**
     * @param $className
     * @return bool
     */
    public function hasClass($className);

    /**
     * @param $className
     * @return bool
     */
    public function containsClass($className);

    /**
     * @param $className
     * @return $this
     */
    public function removeClass($className);
}
