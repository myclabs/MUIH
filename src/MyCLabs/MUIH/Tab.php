<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage MUIH
 */
class Tab extends GenericTag
{
    /**
     * Default loading text for ajax tab, can be html.
     * @var string
     */
    static $defaultAjaxTabLoadingText = 'Loading…';


    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var bool
     */
    protected $isAjax;

    /**
     * @var GenericTag|string
     */
    protected $loadingText;


    /**
     * @param string $id
     * @param string $title
     * @param string $content
     * @param bool $isAjax
     */
    public function  __construct($id, $title, $content, $isAjax=false)
    {
        $this->addClass('tab-pane');

        $this->setAttribute('id', $id);
        $this->setTitle($title);
        $this->isAjax = $isAjax;
        $this->loadingText = self::$defaultAjaxTabLoadingText;

        parent::__construct('div', false, $content);
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->setAttribute('title', $title);

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
