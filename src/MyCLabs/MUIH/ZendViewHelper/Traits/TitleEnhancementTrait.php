<?php

namespace MyCLabs\MUIH\ZendViewHelper\Traits;

use MyCLabs\MUIH\Core\Traits\AttributesTrait as CoreAttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
trait TitleEnhancementTrait
{
    /**
     * @var CoreAttributesTrait
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
