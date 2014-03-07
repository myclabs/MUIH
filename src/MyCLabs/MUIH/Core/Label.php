<?php

namespace MyCLabs\MUIH\Core;

use Exception;
use MyCLabs\MUIH\Core\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
class Label extends GenericTag
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
     * @param string $content
     * @param string $type Const Label::TYPE_.
     */
    public function  __construct($content, $type=self::TYPE_DEFAULT)
    {
        $this->addClass('label');
        $this->setType($type);

        parent::__construct('span', false, $content);
    }

    /**
     * @param $type
     * @throws Exception
     * @return $this
     */
    public function setType($type)
    {
        if (!in_array($type, $this->types)) {
            throw new Exception('A valid type is needed, see Label::TYPE_.');
        }

        if (!$this->containsClass('label-')) {
            $this->attributes['class'] .= ' label-' . $type;
        } else {
            $this->attributes['class'] = preg_replace(
                '#label-(\w_-)+#',
                'label-' . $type,
                $this->attributes['class']
            );
        }

        return $this;
    }

}
