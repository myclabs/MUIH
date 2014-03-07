<?php

namespace MyCLabs\MUIH\Core;

use MyCLabs\MUIH\Core\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
class Panel extends GenericTag
{
    use AttributesTrait;

    const TYPE_DEFAULT = 'default';
    const TYPE_PRIMARY = 'primary';
    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';

    protected $types = [
        self::TYPE_DEFAULT,
        self::TYPE_PRIMARY,
        self::TYPE_SUCCESS,
        self::TYPE_INFO,
        self::TYPE_WARNING,
        self::TYPE_DANGER,
    ];

    /**
     * @var GenericTag
     */
    protected $header;

    /**
     * @var GenericTag
     */
    protected $footer;


    /**
     * @param string $content
     * @param string $header
     * @param string $footer
     * @param string $type Const Panel::TYPE_.
     */
    public function  __construct($content, $header=null, $footer=null, $type=self::TYPE_DEFAULT)
    {
        $this->addClass('panel');

        if (!in_array($type, $this->types)) {
            $type = self::TYPE_DEFAULT;
        }
        $this->addClass('panel-' . $type);

        $this->header = new GenericTag('div');
        $this->header->addClass('panel-header');

        $this->setHeaderContent($header);

        $this->footer = new GenericTag('div');
        $this->footer->addClass('panel-footer');

        $this->setFooterContent($footer);

        $this->content= new GenericTag('div');
        $this->content->addClass('panel-body');

        parent::__construct('div', false, $content);
    }

    /**
     * {@inheritdoc}
     */
    public function setMainContent($content)
    {
        // div.panel-body > content.
        $this->getBody()->setMainContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMainContent()
    {
        // div.panel-body > content.
        return $this->getBody()->getMainContent();
    }

    /**
     * Main content wrapped in a "div.panel-body" GenericTag.
     * @return GenericTag
     */
    public function getBody()
    {
        return $this->content;
    }

    /**
     * @param string $header
     * @return $this
     */
    public function setHeaderContent($header)
    {
        // div.panel-header > content.
        $this->getHeader()->setMainContent($header);
        
        return $this;
    }

    /**
     * Header content wrapped in a "div.panel-header" GenericTag.
     * @return GenericTag
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param string $footer
     * @return $this
     */
    public function setFooterContent($footer)
    {
        // div.panel-footer > content.
        $this->getFooter($footer);
        
        return $this;
    }

    /**
     * Footer content wrapped in a "div.panel-header" GenericTag.
     * @return GenericTag
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentAsString()
    {
        $content = '';

        if (!empty($this->getHeader()->getMainContent())) {
            $content .= $this->getHeader();
        }

        $content .= $this->getBody();

        if (!empty($this->getFooter()->getMainContent())) {
            $content .= $this->getFooter();
        }

        return (string) $content;
    }

} 