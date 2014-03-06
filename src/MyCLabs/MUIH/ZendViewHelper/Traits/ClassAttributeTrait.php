<?php

namespace MyCLabs\MUIH\ZendViewHelper\Traits;

use MyCLabs\MUIH\Core\Traits\ClassAttributeTrait as CoreClassAttributeTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
trait ClassAttributeTrait
{
    /**
     * @var CoreClassAttributeTrait
     */
    protected $uiElement = null;


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
