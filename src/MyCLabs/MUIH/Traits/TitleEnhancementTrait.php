<?php

namespace MyCLabs\MUIH\Traits;

use MyCLabs\MUIH\Interfaces\AttributesInterface;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Traits
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
        /** @var AttributesInterface $this */
        $this->addClass('withTooltip');

        $this->setAttribute('title', $title);
        if (!empty($placement)) {
            $this->setAttribute('data-placement', $placement);
        }
        if (!empty($trigger)) {
            $this->setAttribute('data-trigger', $trigger);
        }
        $this->setAttribute('data-html', ($isHTML) ? 'true' : 'false');

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
        /** @var AttributesInterface $this */
        $this->addClass('withPopover');

        $this->setAttribute('title', $title);
        $this->setAttribute('data-content', $content);
        if (!empty($placement)) {
            $this->setAttribute('data-placement', $placement);
        }
        if (!empty($trigger)) {
            $this->setAttribute('data-trigger', $trigger);
        }
        $this->setAttribute('data-html', ($isHTML) ? 'true' : 'false');

        return $this;
    }

}
