<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Icon as MUIHIcon;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Icon
{
    use TitleEnhancementTrait;

    /**
     * @var MUIHIcon
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
     * @param string $iconName
     * @return $this
     */
    public function icon($iconName)
    {
        $this->uiElement = new MUIHIcon($iconName);

        return $this;
    }

    /**
     * @return $this
     */
    public function glyphicon()
    {
        $this->uiElement->setIconName('glyphicon glyphicon-' . $this->uiElement->getIconName());

        return $this;
    }

    /**
     * @return $this
     */
    public function fa()
    {
        $this->uiElement->setIconName('fa fa-' . $this->uiElement->getIconName());

        return $this;
    }

}
