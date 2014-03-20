<?php

namespace MyCLabs\MUIH\Traits;

use MyCLabs\MUIH\Interfaces\DisplayableInterface;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Traits
 */
trait ContentTrait
{
    /**
     * @var DisplayableInterface[]|string[]
     */
    protected $content = [];


    /**
     * @param DisplayableInterface|string|DisplayableInterface[]|string[] $content
     * @return $this
     */
    public function setContent($content=[])
    {
        if (empty($content)) {
            $content = [];
        }
        if (!is_array($content)) {
            $content = [$content];
        }

        $this->content = $content;

        return $this;
    }

    /**
     * @param DisplayableInterface|string $content
     * @return $this
     */
    public function prependContent($content)
    {
        if (!empty($content)) {
            array_unshift($this->content, $content);
        }

        return $this;
    }

    /**
     * @param DisplayableInterface|string $content
     * @return $this
     */
    public function appendContent($content)
    {
        if (!empty($content)) {
            array_push($this->content, $content);
        }

        return $this;
    }

    /**
     * @return DisplayableInterface[]|string[]
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getContentAsString()
    {
        return implode('', $this->content);
    }
}
