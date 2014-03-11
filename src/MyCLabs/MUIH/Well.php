<?php

namespace MyCLabs\MUIH;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage MUIH
 */
class Well extends GenericTag
{
    const STYLE_SMALL = 'sm';
    const STYLE_LARGE = 'lg';

    protected $styles = [
        self::STYLE_SMALL,
        self::STYLE_LARGE,
    ];

    /**
     * @param string $content
     * @param string $style Const Well::STYLE_.
     */
    public function  __construct($content, $style=null)
    {
        $this->addClass('well');

        if (in_array($style, $this->styles)) {
            $this->addClass('well-' . $style);
        }

        parent::__construct('div', false, $content);
    }

}
