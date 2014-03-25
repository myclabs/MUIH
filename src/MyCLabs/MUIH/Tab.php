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
     * @param bool $withCache
     */
    public function  __construct($id, $title=null, $content=null, $isAjax=false, $withCache=false)
    {
        $this->setAttribute('id', $id);

        $this->addClass('tab-pane');
        $this->addClass('fade');

        $this->setTitle($title);
        $this->setAjax($isAjax, $withCache);
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
     * @param $isAjax
     * @param bool $withCache
     * @return $this
     */
    public function setAjax($isAjax, $withCache=false)
    {
        $this->isAjax = $isAjax;
        if ($this->isAjax()) {
            $this->setAttribute('data-cache', (($withCache) ? 'true': 'false'));
        } else {
            $this->unsetAttribute('data-cache');
        }

        return $this;
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
