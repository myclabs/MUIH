<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Collapse as CoreCollapse;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Collapse
{
    use AttributesTrait;

    /**
     * @var CoreCollapse
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
        $this->uiElement = new CoreCollapse($id, $content, $legend);

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
