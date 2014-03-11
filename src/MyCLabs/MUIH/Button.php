<?php

namespace MyCLabs\MUIH;

use Exception;
use MyCLabs\MUIH\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage MUIH
 */
class Button extends ElementAbstract
{
    use AttributesTrait;

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
     * @var string
     */
    protected $content;


    /**
     * @param string $content
     * @param string $type Const Button::TYPE_.
     */
    public function  __construct($content=null, $type=self::TYPE_DEFAULT)
    {
        $this->content = $content;

        $this->addClass('btn');
        $this->setType($type);
    }

    /**
     * @param $type
     * @throws Exception
     * @return Button
     */
    public function setType($type)
    {
        if (!in_array($type, $this->types)) {
            throw new Exception('A valid type is needed, see Button::TYPE_.');
        }

        if (!$this->containsClass('btn-')) {
            $this->attributes['class'] .= ' btn-' . $type;
        } else {
            $this->attributes['class'] = preg_replace(
                '#btn-(\w_-)+#',
                'btn-' . $type,
                $this->attributes['class']
            );
        }

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

        foreach ($this->attributes as $name => $value) {
            $html .= ' ' . $name.'="'.$value.'"';
        }
        if (!isset($this->attributes['href']) && !isset($this->attributes['type'])) {
            $html .= ' type="button"';
        }

        $html .= '>';

        $html .= $this->content;

        $html .= '</' . $tag . '>';

        return $html;
    }

}
