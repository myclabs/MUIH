<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Collapse as MUIHCollapse;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Collapse
{
    use AttributesTrait;

    /**
     * @var MUIHCollapse
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
     * @param string $id
     * @param string $title
     * @param string $content
     * @return $this
     */
    public function collapse($id, $title, $content)
    {
        $this->uiElement = new MUIHCollapse($id, $title, $content);

        return $this;
    }

    /**
     * @return $this
     */
    public function shown()
    {
        $this->uiElement->show();

        return $this;
    }
}
