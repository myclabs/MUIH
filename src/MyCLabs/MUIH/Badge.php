<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\TitleEnhancementInterface;
use MyCLabs\MUIH\Traits\TitleEnhancementTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Badge extends GenericTag implements TitleEnhancementInterface
{
    use TitleEnhancementTrait;

    /**
     * @param string $content
     */
    public function  __construct($content=null)
    {
        $this->addClass('badge');

        parent::__construct('span', $content);
    }
}
