<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\TitleEnhancementInterface;
use MyCLabs\MUIH\Traits\TitleEnhancementTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Image extends GenericVoidTag implements TitleEnhancementInterface
{
    use TitleEnhancementTrait;


    /**
     * @param string $src
     * @param string $alt
     * @param bool $withSelfClosing
     */
    public function  __construct($src, $alt='', $withSelfClosing=false)
    {
        $this->setAttribute('src', $src);
        $this->setAttribute('alt', $alt);

        parent::__construct('img', $withSelfClosing);
    }
}
