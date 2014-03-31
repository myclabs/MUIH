<?php

namespace MyCLabs\MUIH;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Panel extends GenericTag
{
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
    public function  __construct($content=null, $header=null, $footer=null, $type=self::TYPE_DEFAULT)
    {
        $this->addClass('panel');

        if (!in_array($type, $this->types)) {
            $type = self::TYPE_DEFAULT;
        }
        $this->addClass('panel-' . $type);

        $this->header = new GenericTag('div');
        $this->header->addClass('panel-header');

        $this->footer = new GenericTag('div');
        $this->footer->addClass('panel-footer');

        $this->content= new GenericTag('div');
        $this->content->addClass('panel-body');

        parent::__construct('div', $content);

        if ($header !== null) {
            $this->addTitle($header);
        }
        if ($footer !== null) {
            $this->setFooterContent($footer);
        }
    }

    /**
     * Header content wrapped in a "div.panel-header > headerContent" GenericTag.
     * @return GenericTag
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @param string $header
     * @return $this
     */
    public function setHeaderContent($header)
    {
        $this->getHeader()->setContent($header);

        return $this;
    }

    /**
     * Footer content wrapped in a "div.panel-footer > footerContent" GenericTag.
     * @return GenericTag
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param string $footer
     * @return $this
     */
    public function setFooterContent($footer)
    {
        $this->getFooter()->setContent($footer);

        return $this;
    }

    /**
     * Main content wrapped in a "div.panel-body > content" GenericTag.
     * @return GenericTag
     */
    public function getBody()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content=[])
    {
        $this->getBody()->setContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function prependContent($content)
    {
        $this->getBody()->prependContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function appendContent($content)
    {
        $this->getBody()->appendContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->getBody()->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function getContentAsString()
    {
        $content = '';

        if (!empty($this->getHeader()->getContent())) {
            $content .= (string) $this->getHeader();
        }

        $content .= (string) $this->content;

        if (!empty($this->getFooter()->getContent())) {
            $content .= (string) $this->getFooter();
        }

        return $content;
    }

    /**
     * @param string $title
     * @param string $level
     * @return $this
     */
    public function addTitle($title, $level='h3')
    {
        $titleWrapper = new GenericTag($level, $title);
        $titleWrapper->addClass('panel-title');
        $this->getHeader()->appendContent($titleWrapper);

        return $this;
    }
}
