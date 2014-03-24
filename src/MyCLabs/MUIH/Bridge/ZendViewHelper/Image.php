<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Image as MUIHImage;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Image
{
    use AttributesTrait;
    use TitleEnhancementTrait;

    /**
     * @var MUIHImage
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
     * @param string $src
     * @param string $alt
     * @param bool   $withSelfClosing
     * @return $this
     */
    public function image($src, $alt='', $withSelfClosing=false)
    {
        $this->uiElement = new MUIHImage($src, $alt, $withSelfClosing);

        return $this;
    }
}
