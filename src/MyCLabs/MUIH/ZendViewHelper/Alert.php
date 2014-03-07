<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Alert as CoreAlert;
use MyCLabs\MUIH\Core\GenericTag as CoreGenericTag;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Alert
{
    use AttributesTrait;

    /**
     * @var CoreAlert
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
    public function alert($content, $type=CoreAlert::TYPE_INFO, $withDismissButton=true)
    {
        $this->uiElement = new CoreAlert($content, $type, $withDismissButton);

        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function withTitle($title)
    {
        $this->uiElement->setMainContent(
            new CoreGenericTag('strong', false, $title) . $this->uiElement->getMainContent()
        );

        return $this;
    }

}
