<?php

namespace MyCLabs\MUIH\Interfaces;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Interfaces
 */
interface TitleEnhancementInterface
{
    /**
     * @param string $title
     * @param string $placement
     * @param string $trigger
     * @param bool $isHTML
     * @return $this
     */
    public function tooltip($title, $placement='top', $trigger='hover', $isHTML=true);

    /**
     * @param string $title
     * @param string $content
     * @param string $placement
     * @param string $trigger
     * @param bool $isHTML
     * @return $this
     */
    public function popover($title, $content, $placement='top', $trigger='hover', $isHTML=true);
}
