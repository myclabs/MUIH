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

    /**
     * @param $className
     * @return $this
     */
    public function addClass($className)
    {
        if (!isset($this->attributes['class'])) {
            $this->attributes['class'] = '';
        }
        if (!$this->hasClass($className)) {
            if (!empty($this->attributes['class'])) {
                $this->attributes['class'] .= ' ';
            }

            $this->attributes['class'] .= $className;
        }

        return $this;
    }

    /**
     * @param $className
     * @return bool
     */
    public function hasClass($className)
    {
        return preg_match('#' . $className . '(\s|$)#', $this->attributes['class']);
    }

    /**
     * @param $className
     * @return bool
     */
    public function containsClass($className)
    {
        return preg_match('#' . $className . '.*(\s|$)#', $this->attributes['class']);
    }

    /**
     * @param $className
     * @return $this
     */
    public function removeClass($className)
    {
        $this->attributes['class'] = trim(preg_replace(
                '#' . $className . '(\s|$)#',
                '',
                $this->attributes['class']
            ));

        return $this;
    }
}
