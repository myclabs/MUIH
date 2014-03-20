<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\TitleEnhancementInterface;
use MyCLabs\MUIH\Traits\TitleEnhancementTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Well extends GenericTag implements TitleEnhancementInterface
{
    use TitleEnhancementTrait;

    /**
     * @param string $content
     */
    public function  __construct($content)
    {
        $this->addClass('well');

        parent::__construct('div', $content);
    }

    /**
     * @return $this
     */
    public function small()
    {
        $this->addClass('well-sm');

        return $this;
    }

    /**
     * @return $this
     */
    public function large()
    {
        $this->addClass('well-lg');

        return $this;
    }
}
