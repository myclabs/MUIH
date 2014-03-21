<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\ProgressBar as MUIHProgressBar;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class ProgressBar
{
    use AttributesTrait;
    use TitleEnhancementTrait;

    /**
     * @var MUIHProgressBar
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
     * @param float $percent
     * @param string $type
     * @return $this
     */
    public function progressBar($percent, $type=MUIHProgressBar::TYPE_DEFAULT)
    {
        $this->uiElement = new MUIHProgressBar($percent, $type);

        return $this;
    }

    /**
     * @return $this
     */
    public function stripped()
    {
        $this->uiElement->striped();

        return $this;
    }

    /**
     * @return $this
     */
    public function activeStripped()
    {
        $this->uiElement->activeStriped();

        return $this;
    }
}
