<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Label as MUIHLabel;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\TitleEnhancementTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\IconContentTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Label
{
    use AttributesTrait;
    use TitleEnhancementTrait;
    use IconContentTrait;
    
    /**
     * @var MUIHLabel
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
     * @param string $icon
     * @return $this
     */
    public function label($content, $type=MUIHLabel::TYPE_DEFAULT, $icon=null)
    {
        $this->uiElement = new MUIHLabel($content, $type);

        if ($icon !== null) {
            $this->prependIcon($icon);
        }

        return $this;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function type($type)
    {
        $this->uiElement->changeType($type);

        return $this;
    }
}
