<?php

namespace MyCLabs\MUIH;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Modal extends GenericTag
{
    public static $defaultDismiss = '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';

    /**
     * @var GenericTag
     */
    protected $header;

    /**
     * @var GenericTag
     */
    protected $footer;

    /**
     * @var GenericTag
     */
    protected $body;

    /**
     * @var GenericTag
     */
    protected $modalContent;

    /**
     * @var GenericTag|string
     */
    protected $dismissButton;


    /**
     * @param string $content
     * @param string $header
     * @param string $footer
     * @param bool   $withDismissButton
     */
    public function  __construct($content=null, $header=null, $footer=null, $withDismissButton=true)
    {
        $this->addClass('modal');

        $this->header = new GenericTag('div');
        $this->header->addClass('modal-header');

        $this->footer = new GenericTag('div');
        $this->footer->addClass('modal-footer');

        $this->body = new GenericTag('div');
        $this->body->addClass('modal-body');

        $this->modalContent = new GenericTag('div', $this->body);
        $this->modalContent->addClass('modal-content');

        $this->content = new GenericTag('div', $this->modalContent);
        $this->content->addClass('modal-dialog');


        parent::__construct('div', $content);

        if ($header !== null) {
            $this->addTitle($header);
        }
        if ($footer !== null) {
            $this->setFooterContent($footer);
        }
        if ($header !== null && $withDismissButton) {
            $this->addDefaultDismissButton();
        }
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
     * Header content wrapped in a "div.modal-header > headerContent" GenericTag.
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
        $this->getFooter()->setContent($footer);

        return $this;
    }

    /**
     * Footer content wrapped in a "div.modal-footer > footerContent" GenericTag.
     * @return GenericTag
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * Main content wrapped in a "div.modal-dialog > div.modal-content > div.modal-body > content" GenericTag.
     * @return GenericTag
     */
    public function getModalDialog()
    {
        return $this->content;
    }

    /**
     * Main content wrapped in a "div.modal-content > div.modal-body > content" GenericTag.
     * @return GenericTag
     */
    public function getModalContent()
    {
        return $this->modalContent;
    }

    /**
     * Main content wrapped in a "div.modal-body > content" GenericTag.
     * @return GenericTag
     */
    public function getBody()
    {
        return $this->body;
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
        $modalContent = clone $this->getModalContent();
        if (!empty($this->getHeader()->getContent())) {
            $modalContent->prependContent($this->getHeader());
        }
        if (!empty($this->getFooter()->getContent())) {
            $modalContent->appendContent($this->getFooter());
        }

        $modalDialog = clone $this->getModalDialog();
        $modalDialog->setContent($modalContent);

        return (string) $modalDialog;
    }

    /**
     * @return $this
     */
    public function addDefaultDismissButton()
    {
        $this->getHeader()->prependContent(self::$defaultDismiss);

        return $this;
    }

    /**
     * @param GenericTag|string $dismissButton
     * @return $this
     */
    public function addDismissButton($dismissButton)
    {
        $this->getHeader()->prependContent($dismissButton);

        return $this;
    }

    /**
     * @param string $title
     * @param string $level
     * @return $this
     */
    public function addTitle($title, $level='h4')
    {
        $titleWrapper = new GenericTag($level, $title);
        $titleWrapper->addClass('modal-title');
        $this->getHeader()->appendContent($titleWrapper);

        return $this;
    }

    /**
     * @param bool $replaceBodyOnly
     * @return $this
     */
    public function ajax($replaceBodyOnly=false)
    {
        $this->addClass('modal-ajax');
        $this->setAttribute('data-ajax', ($replaceBodyOnly ? 'body' : 'content'));

        return $this;
    }

    /**
     * @return $this
     */
    public function small()
    {
        $this->getModalDialog()->addClass('modal-sm');

        return $this;
    }

    /**
     * @return $this
     */
    public function large()
    {
        $this->getModalDialog()->addClass('modal-lg');

        return $this;
    }

    /**
     * @return $this
     */
    public function setBackdropStatic()
    {
        $this->setAttribute('data-backdrop', 'static');

        return $this;
    }

    /**
     * @return $this
     */
    public function removeBackdrop()
    {
        $this->setAttribute('data-backdrop', 'false');

        return $this;
    }
}
