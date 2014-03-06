<?php

namespace MyCLabs\MUIH\ZendViewHelper\Traits;

use MyCLabs\MUIH\Core\Traits\AttributesTrait as CoreAttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
trait AttributesTrait
{
    /**
     * @var CoreAttributesTrait
     */
    protected $uiElement;


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
}
