<?php

namespace MyCLabs\MUIH;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Collapse extends GenericTag
{
    /**
     * Default is i.glyphicon-chevron-down.
     * @var string
     */
    static $defaultOpenedIndicator = '<i class="glyphicon glyphicon-chevron-down"></i>';

    /**
     * Default is i.glyphicon-chevron-right.
     * @var string
     */
    static $defaultClosedIndicator = '<i class="glyphicon glyphicon-chevron-right"></i>';

    /**
     * @var GenericTag
     */
    protected $title;

    /**
     * @var GenericTag
     */
    protected $link;

    /**
     * @var string
     */
    protected $openedIndicator;
    
    /**
     * @var string
     */
    protected $closedIndicator;
    

    /**
     * @param string $id
     * @param string $title
     * @param string $content
     */
    public function  __construct($id='', $title=null, $content=null)
    {
        $this->addClass('collapse-wrapper');

        $this->link = new GenericTag('a');
        $this->link->setAttribute('data-toggle', 'collapse');
        $this->title = new GenericTag('legend', $this->link);

        $this->content = new GenericTag('div');
        $this->content->addClass('collapse');
        $this->content->setAttribute('id', $id);

        $this->setCollapseStateIndicators();

        parent::__construct('fieldset', $content);

        $this->setTitleContent($title);
    }

    /**
     * @return $this
     */
    public function show()
    {
        $this->getCollapse()->addClass('in');

        return $this;
    }

    /**
     * @param string $openedIndicator
     * @param string $closedIndicator
     * @return Collapse
     */
    public function setCollapseStateIndicators($openedIndicator=null, $closedIndicator=null)
    {
        if ($openedIndicator === null) {
            $this->openedIndicator = self::$defaultOpenedIndicator;
        } else {
            $this->openedIndicator = $openedIndicator;
        }
        if ($closedIndicator === null) {
            $this->closedIndicator = self::$defaultClosedIndicator;
        } else {
            $this->closedIndicator = $closedIndicator;
        }
        $this->getTitle()->setAttribute(
            'data-opened-indicator',
            str_replace(['&', '"'], ['&amp;', '&quot;'], (string) $this->openedIndicator)
        );
        $this->getTitle()->setAttribute(
            'data-closed-indicator',
            str_replace(['&', '"'], ['&amp;', '&quot;'], (string) $this->closedIndicator)
        );

        return $this;
    }

    /**
     * Title content wrapped in a "legend > a > titleContent" GenericTag.
     * @return GenericTag
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Title content wrapped in a "a > titleContent" GenericTag.
     * @return GenericTag
     */
    public function getTitleLink()
    {
        return $this->link;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitleContent($title)
    {
        $this->getTitleLink()->setContent($title);

        return $this;
    }

    /**
     * Main content content wrapped in a "div.collapse > content" GenericTag.
     * @return GenericTag
     */
    public function getCollapse()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content=[])
    {
        $this->getCollapse()->setContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function prependContent($content)
    {
        $this->getCollapse()->prependContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function appendContent($content)
    {
        $this->getCollapse()->appendContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->getCollapse()->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function getContentAsString()
    {
        $title = clone $this->getTitle();
        $titleContents = [];
        foreach ($title->getContent() as $titleContent) {
            $clone = clone $titleContent;
            if ($titleContent === $this->link) {
                $link = $clone;
            }
            $titleContents[] = $clone;
        }
        $title->setContent($titleContents);
        /** @var GenericTag $link */
        if (!isset($link)) {
            $link = clone $this->link;
            $title->appendContent($link);
        }
        $link->setAttribute(
            'href',
            '#' . $this->getCollapse()->getAttribute('id')
        );
        if ($this->getCollapse()->hasClass('in')) {
            $indicator = $this->openedIndicator;
        } else {
            $indicator = $this->closedIndicator;
        }
        $link->prependContent(' ');
        $link->prependContent($indicator);

        return (string) $title . $this->content;
    }
}