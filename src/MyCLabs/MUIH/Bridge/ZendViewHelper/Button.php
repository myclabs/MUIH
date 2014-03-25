<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Button as UIButton;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\IconContentTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Button
{
    use AttributesTrait;
    use IconContentTrait;

    /**
     * @var UIButton
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
     * @param string $type
     * @param string $icon
     * @return $this
     */
    public function button($content, $type=UIButton::TYPE_DEFAULT, $icon=null)
    {
        $this->uiElement = new UIButton($content, $type);

        if ($icon !== null) {
            $this->prependIcon($icon);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function mini()
    {
        $this->uiElement->mini();

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
     * @param string $url
     * @param string $target
     * @return $this
     */
    public function link($url, $target=null)
    {
        $this->uiElement->link($url, $target);

        return $this;
    }

    /**
     * @param string $idModal
     * @return $this
     */
    public function showModal($idModal)
    {
        $this->uiElement->showModal($idModal);

        return $this;
    }

    /**
     * @param string $idModal
     * @param string $url
     * @return $this
     */
    public function showAjaxModal($idModal, $url)
    {
        $this->uiElement->showAjaxModal($idModal, $url);

        return $this;
    }

    /**
     * @param string $idModal
     * @return $this
     */
    public function closeModal($idModal)
    {
        $this->uiElement->closeModal($idModal);

        return $this;
    }
}
