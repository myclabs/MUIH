<?php

namespace MyCLabs\MUIH\Traits;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Traits
 */
trait DisplayableTrait
{
    /**
     * @return string
     */
    public function getScript()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getHTML()
    {
        return '';
    }

    /**
     * Returns the html followed by the javascript in a script tag.
     * @return string
     */
    public final function __toString()
    {
        $render = $this->getHTML();
        $script = $this->getScript();
        if (!empty($script)) {
            $render .= '<script type="text/javascript">';
            $render .= '$(document).ready(function(){'.$script. '});';
            $render .= '</script>';
        }
        return $render;
    }

    /**
     * Alias of __toString.
     * @return string
     */
    public final function render()
    {
        return (string) $this;
    }

    /**
     * Echoes the element.
     * @see __toString
     * @return void
     */
    public final function display()
    {
        echo (string) $this;
    }
}
