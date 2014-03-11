<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage MUIH
 */
class GenericTag extends ElementAbstract
{
    use AttributesTrait;

    /**
     * @var string
     */
    protected $tag;

    /**
     * @var bool
     */
    protected $isVoidTag = false;

    /**
     * @var GenericTag|ElementAbstract|string
     */
    protected $content;


    /**
     * @param string $tag
     * @param string $content
     * @param bool $isVoidTag
     */
    public function  __construct($tag, $isVoidTag=false, $content=null)
    {
        $this->tag = (string) $tag;
        $this->isVoidTag = (bool) $isVoidTag;

        $this->setMainContent($content);
    }

    /**
     * @param GenericTag|ElementAbstract|string $content
     * @return $this
     */
    public function setMainContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return GenericTag|ElementAbstract|string
     */
    public function getMainContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getContentAsString()
    {
        return (string) $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function getHTML()
    {
        $html = '';

        $html .= '<' . $this->tag;

        foreach ($this->attributes as $name => $value) {
            $html .= ' ' . $name.'="'.$value.'"';
        }

        $html .= '>';

        if (!$this->isVoidTag) {
            $html .= $this->getContentAsString();

            $html .= '</' . $this->tag . '>';
        }

        return $html;
    }

}
