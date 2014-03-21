<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Tab as MUIHTab;
use MyCLabs\MUIH\Tabs as MUIHTabs;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Tabs
{
    use AttributesTrait;

    /**
     * @var MUIHTabs
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
     * @return $this
     */
    public function tabs()
    {
        $this->uiElement = new MUIHTabs();

        return $this;
    }

    /**
     * @param string $id
     * @param string $title
     * @param string $content
     * @return $this
     */
    public function addTab($id, $title, $content)
    {
        $this->uiElement->addTab(new MUIHTab($id, $title, $content));

        return $this;
    }

    /**
     * @param string $id
     * @param string $title
     * @param string $remoteContentUrl
     * @return $this
     */
    public function addAjaxTab($id, $title, $remoteContentUrl)
    {
        $this->uiElement->addTab(new MUIHTab($id, $title, $remoteContentUrl, true));

        return $this;
    }
}
