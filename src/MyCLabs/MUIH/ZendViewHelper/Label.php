<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Label as CoreLabel;
use MyCLabs\MUIH\Core\Icon as CoreIcon;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\ZendViewHelper\Traits\TitleEnhancementTrait;

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
     * @var CoreLabel
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
    public function label($content, $type=CoreLabel::TYPE_DEFAULT, $icon=null)
    {
        if ($icon !== null) {
            if (!($icon instanceof CoreIcon)) {
                $icon = new CoreIcon($icon);
            }
            $content = $icon . ' ' . $content;
        }

        $this->uiElement = new CoreLabel($content, $type);

        return $this;
    }

}
