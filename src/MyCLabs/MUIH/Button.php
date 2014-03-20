<?php

namespace MyCLabs\MUIH;

use Exception;
use MyCLabs\MUIH\Interfaces\DisplayableInterface;
use MyCLabs\MUIH\Interfaces\AttributesInterface;
use MyCLabs\MUIH\Interfaces\ContentInterface;
use MyCLabs\MUIH\Traits\DisplayableTrait;
use MyCLabs\MUIH\Traits\AttributesTrait;
use MyCLabs\MUIH\Traits\ContentTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Button implements DisplayableInterface, AttributesInterface, ContentInterface
{
    use DisplayableTrait;
    use AttributesTrait;
    use ContentTrait;

    const TYPE_DEFAULT = 'default';
    const TYPE_PRIMARY = 'primary';
    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';
    const TYPE_LINK = 'link';

    protected $types = [
        self::TYPE_DEFAULT,
        self::TYPE_PRIMARY,
        self::TYPE_SUCCESS,
        self::TYPE_INFO,
        self::TYPE_WARNING,
        self::TYPE_DANGER,
        self::TYPE_LINK,
    ];


    /**
     * @param string $content
     * @param string $type Const Button::TYPE_.
     */
    public function  __construct($content=null, $type=self::TYPE_DEFAULT)
    {
        $this->addClass('btn');
        $this->changeType($type);

        $this->setContent($content);
    }

    /**
     * @param $type
     * @throws Exception
     * @return $this
     */
    public function changeType($type)
    {
        if (!in_array($type, $this->types)) {
            throw new Exception('A valid type is needed, @see Button::TYPE_.');
        }

        if (!$this->containsClass('btn-')) {
            $this->attributes['class'] .= ' btn-' . $type;
        } else {
            $this->attributes['class'] = preg_replace(
                '#btn-[\w-]+#',
                'btn-' . $type,
                $this->attributes['class']
            );
        }

        return $this;
    }

    /**
     * @param string $url
     * @param string $target
     * @return $this
     */
    public function link($url, $target=null)
    {
        $this->setAttribute('href', $url);
        if ($target !== null) {
            $this->setAttribute('target', $target);
        }

        return $this;
    }

    /**
     * @param string $idModal
     * @return $this
     */
    public function showModal($idModal)
    {
        $this->setAttribute('href', '#');
        $this->setAttribute('data-toggle', 'modal');
        $this->setAttribute('data-remote', 'false');
        $this->setAttribute('data-target', '#'.$idModal);

        return $this;
    }

    /**
     * @param string $idModal
     * @param string $url
     * @return $this
     */
    public function showAjaxModal($idModal, $url)
    {
        $this->showModal($idModal);

        $this->setAttribute('href', $url);
        $this->setAttribute('data-remote', 'true');

        return $this;
    }

    /**
     * @param string $idModal
     * @return $this
     */
    public function closeModal($idModal)
    {
        $this->setAttribute('href', '#');
        $this->setAttribute('data-dismiss', 'modal');
        $this->setAttribute('data-target', '#'.$idModal);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHTML()
    {
        $html = '';

        $tag = isset($this->attributes['href']) ? 'a' : 'button';

        $html .= '<' . $tag;

        $html .= $this->getAttributesAsString();
        if (!isset($this->attributes['href']) && !isset($this->attributes['type'])) {
            $html .= ' type="button"';
        }

        $html .= '>';

        $html .= $this->getContentAsString();

        $html .= '</' . $tag . '>';

        return $html;
    }
}
