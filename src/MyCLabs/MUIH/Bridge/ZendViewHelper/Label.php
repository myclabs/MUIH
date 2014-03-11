<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Label as MUIHLabel;
use MyCLabs\MUIH\Icon as MUIHIcon;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Label
{
    use AttributesTrait;
    use TitleEnhancementTrait;
    
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
        if ($icon !== null) {
            if (!($icon instanceof MUIHIcon)) {
                $icon = new MUIHIcon($icon);
            }
            $content = $icon . ' ' . $content;
        }

        $this->uiElement = new MUIHLabel($content, $type);

        return $this;
    }

}
