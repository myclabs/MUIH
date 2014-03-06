<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Modal as CoreModal;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\ZendViewHelper\Traits\ClassAttributeTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Modal
{
    use AttributesTrait;
    use ClassAttributeTrait;

    /**
     * @var CoreModal
     */
    protected $uiElement = null;


    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->uiElement;
    }

    /**
     * @param string $content
     * @param string $header
     * @param string $footer
     * @return $this
     */
    public function modal($content, $header=null, $footer=null)
    {
        $this->uiElement = new CoreModal($content, $header, $footer);

        return $this;
    }

    /**
     * @return $this
     */
    public function shown()
    {
        $this->uiElement->addClass('in');

        return $this;
    }

}
