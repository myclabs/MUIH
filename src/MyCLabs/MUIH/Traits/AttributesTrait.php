<?php

namespace MyCLabs\MUIH\Traits;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Traits
 */
trait AttributesTrait
{
    /**
     * @var array
     */
    protected $attributes = [];


    /**
     * @param string $attributeName
     * @return $this
     */
    public function setBooleanAttribute($attributeName)
    {
        return $this->setAttribute($attributeName, null);
    }

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
        if ($this->hasAttribute($attributeName)) {
            unset($this->attributes[$attributeName]);
        }

        return $this;
    }

    /**
     * @param string $attributeName
     * @return bool
     */
    public function hasAttribute($attributeName)
    {
        return array_key_exists($attributeName, $this->attributes);
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
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return string
     */
    public function getAttributesAsString()
    {
        $attributes = '';

        foreach ($this->attributes as $name => $value) {
            $attributes .= ' ' . $name;
            if ($value !== null) {
                $attributes .= '="'.$value.'"';
            }
        }

        return $attributes;
    }

    /**
     * @param $className
     * @return $this
     */
    public function addClass($className)
    {
        if (!$this->hasAttribute('class')) {
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
        if ($this->hasAttribute('class')) {
            return (preg_match('#' . $className . '(\s|$)#', $this->attributes['class']) > 0);
        }
        return false;
    }

    /**
     * @param $className
     * @return bool
     */
    public function containsClass($className)
    {
        if ($this->hasAttribute('class')) {
            return (preg_match('#' . $className . '.*(\s|$)#', $this->attributes['class']) > 0);
        }
        return false;
    }

    /**
     * @param $className
     * @return $this
     */
    public function removeClass($className)
    {
        if ($this->hasAttribute('class')) {
            $this->attributes['class'] = trim(
                preg_replace(
                    '#' . $className . '(\s|$)#',
                    '',
                    $this->attributes['class']
                )
            );
            if (empty($this->attributes['class'])) {
                $this->unsetAttribute('class');
            }
        }

        return $this;
    }
}
