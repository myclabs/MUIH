<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Traits;

use MyCLabs\MUIH\Traits\AttributesTrait as MUIHAttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
trait TitleEnhancementTrait
{
    /**
     * @var MUIHAttributesTrait
     */
    protected $uiElement = null;


    /**
     * @param string $title
     * @param string $placement
     * @param string $trigger
     * @param bool $isHTML
     * @return $this
     */
    public function tooltip($title, $placement='top', $trigger='hover', $isHTML=true)
    {
        $this->uiElement->addClass('withTooltip');

        $this->uiElement->setAttribute('title', $title);
        if (!empty($placement)) {
            $this->uiElement->setAttribute('data-placement', $placement);
        }
        if (!empty($trigger)) {
            $this->uiElement->setAttribute('data-trigger', $trigger);
        }
        $this->uiElement->setAttribute('data-html', ($isHTML) ? 'true' : 'false');

        return $this;
    }

    /**
     * @param string $title
     * @param string $content
     * @param string $placement
     * @param string $trigger
     * @param bool $isHTML
     * @return $this
     */
    public function popover($title, $content, $placement='top', $trigger='hover', $isHTML=true)
    {
        $this->uiElement->addClass('withPopover');

        $this->uiElement->setAttribute('title', $title);
        $this->uiElement->setAttribute('data-content', $content);
        if (!empty($placement)) {
            $this->uiElement->setAttribute('data-placement', $placement);
        }
        if (!empty($trigger)) {
            $this->uiElement->setAttribute('data-trigger', $trigger);
        }
        $this->uiElement->setAttribute('data-html', ($isHTML) ? 'true' : 'false');

        return $this;
    }

}
