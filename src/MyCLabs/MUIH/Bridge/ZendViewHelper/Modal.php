<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Modal as MUIHModal;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Modal
{
    use AttributesTrait;

    /**
     * @var MUIHModal
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
        $this->uiElement = new MUIHModal($content, $header, $footer);

        return $this;
    }

    /**
     * @return $this
     */
    public function small()
    {
        $this->uiElement->small();

        return $this;
    }

    /**
     * @return $this
     */
    public function large()
    {
        $this->uiElement->large();

        return $this;
    }

    /**
     * @return $this
     */
    public function withoutBackdrop()
    {
        $this->uiElement->removeBackdrop();

        return $this;
    }

    /**
     * @return $this
     */
    public function staticBackdrop()
    {
        $this->uiElement->setBackdropStatic();

        return $this;
    }
}
