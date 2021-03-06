<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\DisplayableInterface;
use MyCLabs\MUIH\Interfaces\AttributesInterface;
use MyCLabs\MUIH\Interfaces\ContentInterface;
use MyCLabs\MUIH\Traits\DisplayableTrait;
use MyCLabs\MUIH\Traits\AttributesTrait;
use MyCLabs\MUIH\Traits\ContentTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class GenericTag implements DisplayableInterface, AttributesInterface, ContentInterface
{
    use DisplayableTrait;
    use AttributesTrait;
    use ContentTrait;

    /**
     * @var string
     */
    protected $tag;


    /**
     * @param string $tag
     * @param string $content
     */
    public function  __construct($tag, $content=null)
    {
        $this->tag = (string) $tag;

        $this->setContent($content);
    }

    /**
     * {@inheritdoc}
     */
    public function getHTML()
    {
        $html = '';

        $html .= '<' . $this->tag;

        $html .= $this->getAttributesAsString();

        $html .= '>';

        $html .= $this->getContentAsString();

        $html .= '</' . $this->tag . '>';

        return $html;
    }
}
