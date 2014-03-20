<?php

namespace MyCLabs\MUIH\Interfaces;

use MyCLabs\MUIH\Interfaces\DisplayableInterface;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Interfaces
 */
interface ContentInterface
{
    /**
     * @return DisplayableInterface[]|string[]
     */
    public function getContent();

    /**
     * @param DisplayableInterface|string|DisplayableInterface[]|string[] $content
     * @return $this
     */
    public function setContent($content=[]);

    /**
     * @param DisplayableInterface|string $content
     * @return $this
     */
    public function prependContent($content);

    /**
     * @param DisplayableInterface|string $content
     * @return $this
     */
    public function appendContent($content);

    /**
     * @return string
     */
    public function getContentAsString();
}
