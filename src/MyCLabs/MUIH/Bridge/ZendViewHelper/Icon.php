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
     * @param bool   $withPrefix
     * @return $this
     */
    public function icon($iconName, $withPrefix=true)
    {
        $this->uiElement = new MUIHIcon($iconName, $withPrefix);

        return $this;
    }

    /**
     * @return $this
     */
    public function glyphicon()
    {
        $this->uiElement->glyphicon();

        return $this;
    }

    /**
     * @return $this
     */
    public function fa()
    {
        $this->uiElement->fontAwesome();

        return $this;
    }
}
