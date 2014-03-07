<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\GenericTag as CoreGenericTag;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\ZendViewHelper\Traits\TitleEnhancementTrait;

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
     * @var CoreGenericTag
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
        $this->uiElement = new CoreGenericTag($tag, $isVoidTag, $content);

        return $this;
    }

}
