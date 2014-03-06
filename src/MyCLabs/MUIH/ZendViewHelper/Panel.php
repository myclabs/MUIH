<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Panel as CorePanel;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\ZendViewHelper\Traits\ClassAttributeTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Panel
{
    use AttributesTrait;
    use ClassAttributeTrait;

    /**
     * @var CorePanel
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
        $this->uiElement = new CorePanel($content, $header, $footer);

        return $this;
    }

}
