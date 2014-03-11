<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Alert as MUIHAlert;
use MyCLabs\MUIH\GenericTag as MUIHGenericTag;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Alert
{
    use AttributesTrait;

    /**
     * @var MUIHAlert
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
     * @param string $type
     * @param bool $withDismissButton
     * @return $this
     */
    public function alert($content, $type=MUIHAlert::TYPE_INFO, $withDismissButton=true)
    {
        $this->uiElement = new MUIHAlert($content, $type, $withDismissButton);

        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function withTitle($title)
    {
        $this->uiElement->setMainContent(
            new MUIHGenericTag('strong', false, $title) . $this->uiElement->getMainContent()
        );

        return $this;
    }

}
