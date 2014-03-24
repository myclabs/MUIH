<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\GenericVoidTag as MUIHGenericVoidTag;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class GenericVoidTag
{
    use AttributesTrait;
    use TitleEnhancementTrait;
    
    /**
     * @var MUIHGenericVoidTag
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
     * @param string $tag
     * @param bool   $withSelfClosing
     * @return $this
     */
    public function genericVoidTag($tag, $withSelfClosing=false)
    {
        $this->uiElement = new MUIHGenericVoidTag($tag, $withSelfClosing);

        return $this;
    }
}
