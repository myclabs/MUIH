<?php

namespace MyCLabs\MUIH;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage MUIH
 */
interface ElementInterface
{
    /**
     * @return string
     */
    public function getScript();

    /**
     * @return string
     */
    public function getHTML();

    /**
     * Returns the html followed by the javascript in a script tag.
     * @return string
     */
    public function __toString();

    /**
     * Alias of __toString.
     * @return string
     */
    public function render();

    /**
     * Echoes the element.
     * @see __toString
     * @return void
     */
    public function display();
}
