<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Traits;

use MyCLabs\MUIH\Traits\AttributesTrait as MUIHAttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
trait AttributesTrait
{
    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes($attributes)
    {
        foreach ($attributes as $attributeName => $attributeValue) {
            $this->setAttribute($attributeName, $attributeValue);
        }

        return $this;
    }

    /**
     * @param string $attributeName
     * @param string $attributeValue
     * @return $this
     */
    public function setAttribute($attributeName, $attributeValue)
    {
        $this->uiElement->setAttribute($attributeName, $attributeValue);

        return $this;
    }

    /**
     * @param string $className
     * @return $this
     */
    public function addClass($className)
    {
        $this->uiElement->addClass($className);

        return $this;
    }
}
