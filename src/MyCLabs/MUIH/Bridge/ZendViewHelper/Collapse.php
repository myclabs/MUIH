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
        return $this->uiElement->getHTML();
    }

    /**
     * @param string $id
     * @param string $content
     * @param string $legend
     * @return $this
     */
    public function collapse($id, $content, $legend)
    {
        $this->uiElement = new MUIHCollapse($id, $content, $legend);

        return $this;
    }

    /**
     * @return $this
     */
    public function shown()
    {
        $this->uiElement->addClass('in');

        return $this;
    }

}
