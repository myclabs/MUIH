<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\GenericTag as MUIHGenericTag;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class GenericTag
{
    use AttributesTrait;
    use TitleEnhancementTrait;
    
    /**
     * @var MUIHGenericTag
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
     * @param string $content
     * @param bool   $isVoidTag
     * @return $this
     */
    public function GenericTag($tag, $content, $isVoidTag=false)
    {
        $this->uiElement = new MUIHGenericTag($tag, $isVoidTag, $content);

        return $this;
    }
}
