<?php

namespace MyCLabs\MUIH\Core;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
class ProgressBar extends GenericTag
{
    const TYPE_DEFAULT = 'default';
    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';

    protected $types = [
        self::TYPE_DEFAULT,
        self::TYPE_SUCCESS,
        self::TYPE_INFO,
        self::TYPE_WARNING,
        self::TYPE_DANGER,
    ];

    const STYLE_STRIPED = 'striped';
    const STYLE_STRIPED_ACTIVE = 'striped active';

    protected $styles = [
        self::STYLE_STRIPED,
        self::STYLE_STRIPED_ACTIVE,
    ];


    /**
     * @param float $percent 0 <= percent <= 100.
     * @param string $type
     * @param bool $style
     * @param string $content
     */
    public function __construct($percent, $type=self::TYPE_DEFAULT, $style=null, $content=null)
    {
        if ($percent > 100) {
            $percent = 100;
        }
        if ($percent < 0) {
            $percent = 0;
        }

        $this->addClass('progress');

        if (!in_array($style, $this->styles)) {
            $this->addClass('progress-' . $style);
        }

        if (empty($content)) {
            $content = new GenericTag('span');
            $content->addClass('sr-only');
            $content->setMainContent($percent . '%');
        }

        $content = new GenericTag('div');
        $content->addClass('progress-bar');
        if (!in_array($type, $this->types)) {
            $type = self::TYPE_DEFAULT;
        }
        if ($type !== self::TYPE_DEFAULT) {
            $content->addClass('progress-bar-' . $type);
        }
        $content->setAttribute('role', 'progress');
        $content->setAttribute('aria-valuenow', $percent);
        $content->setAttribute('aria-valuemin', 0);
        $content->setAttribute('aria-valuemax', 100);
        $content->setAttribute('style', 'width="' . $percent. '%"');

        parent::__construct('div', false, $content);
    }

    /**
     * {@inheritdoc}
     */
    public function setMainContent($content)
    {
        $this->content->setMainContent($content);

        return parent::setMainContent($content);
    }

    /**
     * {@inheritdoc}
     */
    public function getMainContent()
    {
        return $this->content->getMainContent();
    }

    /**
     * Main content wrapped in a "div.panel-body" GenericTag.
     * @return GenericTag
     */
    public function getBody()
    {
        return $this->content;
    }

}
