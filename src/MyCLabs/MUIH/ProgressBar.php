<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\TitleEnhancementInterface;
use MyCLabs\MUIH\Traits\TitleEnhancementTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class ProgressBar extends GenericTag implements TitleEnhancementInterface
{
    use TitleEnhancementTrait;

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


    /**
     * @param float $percent 0 <= percent <= 100.
     * @param string $type
     * @param string $content
     */
    public function __construct($percent, $type=self::TYPE_DEFAULT, $content=null)
    {
        if ($percent > 100) {
            $percent = 100;
        }
        if ($percent < 0) {
            $percent = 0;
        }

        $this->addClass('progress');

        if (empty($content)) {
            $content = new GenericTag('span');
            $content->addClass('sr-only');
            $content->setContent($percent . '%');
        }

        $this->content = new GenericTag('div');
        $this->content->addClass('progress-bar');
        if (!in_array($type, $this->types)) {
            $type = self::TYPE_DEFAULT;
        }
        if ($type !== self::TYPE_DEFAULT) {
            $this->content->addClass('progress-bar-' . $type);
        }
        $this->content->setAttribute('role', 'progress');
        $this->content->setAttribute('aria-valuenow', $percent);
        $this->content->setAttribute('aria-valuemin', 0);
        $this->content->setAttribute('aria-valuemax', 100);
        $this->content->setAttribute('style', 'width="' . $percent. '%"');

        parent::__construct('div', $content);
    }

    /**
     * Main content wrapped in a "div.progress-bar > content" GenericTag.
     * @return GenericTag
     */
    public function getBody()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
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
     * @return $this
     */
    public function striped()
    {
        $this->addClass('progress-striped');

        return $this;
    }

    /**
     * @return $this
     */
    public function activeStriped()
    {
        if (!$this->hasClass('progress-striped')) {
            $this->addClass('progress-striped');
        }
        $this->addClass('active');

        return $this;
    }

    /**
     * @return string
     */
    public function getContentAsString()
    {
        return (string) $this->content;
    }
}
