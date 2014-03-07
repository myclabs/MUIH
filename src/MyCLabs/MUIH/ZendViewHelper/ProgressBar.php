<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\ProgressBar as CoreProgressBar;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\ZendViewHelper\Traits\TitleEnhancementTrait;

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
     * @var CoreProgressBar
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
     * @param float $percent
     * @param string $type
     * @return $this
     */
    public function progressBar($percent, $type=CoreProgressBar::TYPE_DEFAULT)
    {
        $this->uiElement = new CoreProgressBar($percent, $type);

        return $this;
    }

    /**
     * @return $this
     */
    public function stripped()
    {
        $this->uiElement->addClass('progress-stripped');

        return $this;
    }

    /**
     * @return $this
     */
    public function active()
    {
        if (!$this->uiElement->hasClass('progress-stripped')) {
            $this->stripped();
        }
        $this->uiElement->addClass('active');

        return $this;
    }

}
