<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Button as UIButton;
use MyCLabs\MUIH\Core\Icon as UIIcon;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Button
{
    use AttributesTrait;

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
        if ($icon !== null) {
            if (!($icon instanceof UIIcon)) {
                $icon = new UIIcon($icon);
            }
            $content = $icon . ' ' . $content;
        }

        $this->uiElement = new UIButton($content, $type);

        return $this;
    }

    /**
     * @param string $url
     * @param string $target
     * @return $this
     */
    public function link($url, $target=null)
    {
        $this->uiElement->setAttribute('href', $url);
        if ($target !== null) {
            $this->uiElement->setAttribute('target', $target);
        }

        return $this;
    }

    /**
     * @param string $idModal
     * @return $this
     */
    public function showModal($idModal)
    {
        $this->uiElement->setAttribute('href', '#');
        $this->uiElement->setAttribute('data-toggle', 'modal');
        $this->uiElement->setAttribute('data-remote', 'false');
        $this->uiElement->setAttribute('data-target', '#'.$idModal);

        return $this;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function ajax($url)
    {
        $this->uiElement->setAttribute('href', $url);
        $this->uiElement->setAttribute('data-ajax', 'modal');

        return $this;
    }

    /**
     * @param string $idModal
     * @return $this
     */
    public function closeModal($idModal)
    {
        $this->uiElement->setAttribute('href', '#');
        $this->uiElement->setAttribute('data-dismiss', 'modal');
        $this->uiElement->setAttribute('data-target', '#'.$idModal);

        return $this;
    }

}
