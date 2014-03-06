<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Icon as CoreIcon;
use MyCLabs\MUIH\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Icon
{
    use TitleEnhancementTrait;

    /**
     * @var CoreIcon
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
     * @param string $iconName
     * @return $this
     */
    public function icon($iconName)
    {
        $this->uiElement = new CoreIcon($iconName);

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
