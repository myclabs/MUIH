<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Tab as CoreTab;
use MyCLabs\MUIH\Core\Tabs as CoreTabs;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Tabs
{
    use AttributesTrait;

    /**
     * @var CoreTabs
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
        $this->uiElement = new CoreTabs();

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
        $this->uiElement->addTab(new CoreTab($id, $title, $content));

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
        $this->uiElement->addTab(new CoreTab($id, $title, $remoteContentUrl, true));

        return $this;
    }

}
