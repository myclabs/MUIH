<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\DisplayableInterface;
use MyCLabs\MUIH\Interfaces\AttributesInterface;
use MyCLabs\MUIH\Interfaces\TitleEnhancementInterface;
use MyCLabs\MUIH\Traits\DisplayableTrait;
use MyCLabs\MUIH\Traits\AttributesTrait;
use MyCLabs\MUIH\Traits\TitleEnhancementTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Icon implements DisplayableInterface, AttributesInterface, TitleEnhancementInterface
{
    use DisplayableTrait;
    use AttributesTrait;
    use TitleEnhancementTrait;

    const GLYPHICON = 'glyphicon glyphicon-';
    const FONT_AWESOME = 'fa fa-';

    public static $defaultIconPrefix = self::GLYPHICON;

    /**
     * @var string
     */
    protected $iconName;


    /**
     * @param string       $iconName
     * @param bool|string  $withPrefix Default true for default, can be a string.
     */
    public function  __construct($iconName=null, $withPrefix=true)
    {
        $this->setIconName($iconName, $withPrefix);
    }

    /**
     * @param string       $iconName
     * @param bool|string  $withPrefix Default true for default, can be a string.
     * @return $this
     */
    public function setIconName($iconName, $withPrefix=true)
    {
        $this->iconName = $iconName;
        if ($withPrefix === true) {
            $this->iconName = self::$defaultIconPrefix . $this->iconName;
        } else if (is_string($withPrefix)) {
            $this->iconName = $withPrefix . $this->iconName;
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function glyphicon()
    {
        $this->iconName = self::GLYPHICON . $this->iconName;

        return $this;
    }

    /**
     * @return $this
     */
    public function fontAwesome()
    {
        $this->iconName = self::FONT_AWESOME . $this->iconName;

        return $this;
    }

    /**
     * {@inheritdoc}.
     */
    public function getHTML()
    {
        $html = '';

        $html .= '<i';

        if (!isset($this->attributes['class'])) {
            $html .= ' class="' . $this->iconName . '"';
        }
        foreach ($this->attributes as $name => $value) {
            if ($name === 'class') {
                $value = $this->iconName . ' ' . $value;
            }
            $html .= ' ' . $name;
            if ($value !== null) {
                $html .= '="'.$value.'"';
            }
        }

        $html .= '>';

        $html .= '</i>';

        return $html;
    }
}
