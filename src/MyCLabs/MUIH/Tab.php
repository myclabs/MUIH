<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\DisplayableInterface;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Tab extends GenericTag
{
    /**
     * Default loading text for ajax tab, can be html.
     * @var string
     */
    static $defaultAjaxTabLoadingText = 'Loading…';


    /**
     * @var DisplayableInterface|string
     */
    protected $title;

    /**
     * @var bool
     */
    protected $isAjax;

    /**
     * @var DisplayableInterface|string
     */
    protected $loadingText;


    /**
     * @param string $id
     * @param string $title
     * @param string $content Tab content or url.
     * @param bool $isAjax
     */
    public function  __construct($id, $title, $content, $isAjax=false)
    {
        $this->addClass('tab-pane');

        $this->setAttribute('id', $id);
        $this->setTitle($title);
        $this->isAjax = $isAjax;
        $this->loadingText = self::$defaultAjaxTabLoadingText;

        parent::__construct('div', $content);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isAjax()
    {
        return $this->isAjax;
    }

    /**
     * @param string $loadingText
     * @return $this
     */
    public function setLoadingText($loadingText)
    {
        $this->loadingText = $loadingText;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentAsString()
    {
        if ($this->isAjax()) {
            return $this->loadingText;
        }
        return parent::getContentAsString();
    }
}
