<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Panel as MUIHPanel;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Panel
{
    use AttributesTrait;

    /**
     * @var MUIHPanel
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
     * @param string $header
     * @param string $footer
     * @return $this
     */
    public function panel($content, $header=null, $footer=null)
    {
        $this->uiElement = new MUIHPanel($content, $header, $footer);

        return $this;
    }
}
