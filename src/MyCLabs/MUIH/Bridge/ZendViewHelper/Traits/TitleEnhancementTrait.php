<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Traits;

use MyCLabs\MUIH\Traits\TitleEnhancementTrait as MUIHTitleEnhancementTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
trait TitleEnhancementTrait
{
    /**
     * @param string $title
     * @param string $placement
     * @param string $trigger
     * @param bool $isHTML
     * @return $this
     */
    public function tooltip($title, $placement='top', $trigger='hover', $isHTML=true)
    {
        $this->uiElement->tooltip($title, $placement, $trigger, $isHTML);

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
        $this->uiElement->popover($title, $content, $placement, $trigger, $isHTML);

        return $this;
    }
}
