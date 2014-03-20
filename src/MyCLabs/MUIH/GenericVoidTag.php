<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\DisplayableInterface;
use MyCLabs\MUIH\Interfaces\AttributesInterface;
use MyCLabs\MUIH\Traits\DisplayableTrait;
use MyCLabs\MUIH\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class GenericVoidTag implements DisplayableInterface, AttributesInterface
{
    use DisplayableTrait;
    use AttributesTrait;

    /**
     * @var string
     */
    protected $tag;

    /**
     * @var bool
     */
    protected $withSelfClosing = false;


    /**
     * @param string $tag
     * @param bool $withSelfClosing
     */
    public function  __construct($tag, $withSelfClosing=false)
    {
        $this->tag = (string) $tag;
        $this->withSelfClosing = (bool) $withSelfClosing;
    }

    /**
     * {@inheritdoc}
     */
    public function getHTML()
    {
        $html = '';

        $html .= '<' . $this->tag;

        $html .= $this->getAttributesAsString();

        if ($this->withSelfClosing) {
            $html .= ' /';
        }

        $html .= '>';

        return $html;
    }
}
