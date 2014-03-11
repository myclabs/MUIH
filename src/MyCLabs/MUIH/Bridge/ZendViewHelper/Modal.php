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
    public function shown()
    {
        $this->uiElement->addClass('in');

        return $this;
    }

    /**
     * @return $this
     */
    public function small()
    {
        $this->uiElement->getMainContent()->addClass('modal-sm');

        return $this;
    }

    /**
     * @return $this
     */
    public function large()
    {
        $this->uiElement->getMainContent()->addClass('modal-lg');

        return $this;
    }

    /**
     * @return $this
     */
    public function withoutBackdrop()
    {
        $this->uiElement->setAttribute('data-backdrop', 'false');

        return $this;
    }

    /**
     * @return $this
     */
    public function staticBackdrop()
    {
        $this->uiElement->setAttribute('data-backdrop', 'static');

        return $this;
    }

}
