<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage MUIH
 */
class Modal extends GenericTag
{
    /**
     * @var GenericTag
     */
    protected $header;

    /**
     * @var GenericTag
     */
    protected $footer;

    /**
     * @var GenericTag|string
     */
    protected $dismissButton;


    /**
     * @param string $content
     * @param string $header
     * @param string $footer
     */
    public function  __construct($content, $header=null, $footer=null)
    {
        $this->addClass('modal');

        $this->header = new GenericTag('div');
        $this->header->addClass('modal-header');

        $this->setHeaderContent($header);

        $this->footer = new GenericTag('div');
        $this->footer->addClass('modal-footer');

        $this->setFooterContent($footer);

        $this->content = new GenericTag('div');
        $this->content->addClass('modal-body');

        parent::__construct('div', false, $content);
    }

    /**
     * {@inheritdoc}
     */
    public function setMainContent($content)
    {
        // div.modal-body > content.
        $this->getBody()->setMainContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMainContent()
    {
        // div.modal-body > content.
        return $this->getBody()->getMainContent();
    }

    /**
     * Main content wrapped in a "div.modal-body" GenericTag.
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
    public function setHeaderContent($header = null)
    {
        // div.modal-header > content.
        $this->getHeader()->setMainContent($header);

        return $this;
    }

    /**
     * Header content wrapped in a "div.modal-header" GenericTag.
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
        // div.modal-footer > content.
        $this->getFooter()->setMainContent($footer);
        
        return $this;
    }

    /**
     * Footer content wrapped in a "div.modal-header" GenericTag.
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

        $modalContent = new GenericTag('div', false, $content);
        $modalContent->addClass('modal-content');

        $modalDialog = new GenericTag('div', false, $modalContent);
        $modalDialog->addClass('modal-dialog');

        return (string) $modalDialog;
    }

} 