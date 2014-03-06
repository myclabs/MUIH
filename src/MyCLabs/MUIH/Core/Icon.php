<?php

namespace MyCLabs\MUIH\Core;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
class Icon extends ElementAbstract
{

    /**
     * @var string
     */
    protected $iconName;


    /**
     * @param string $iconName
     */
    public function  __construct($iconName=null)
    {
        $this->setIconName($iconName);
    }

    /**
     * @param $iconName
     * @return Icon
     */
    public function setIconName($iconName)
    {
        $this->iconName = $iconName;

        return $this;
    }

    /**
     * @return string
     */
    public function getIconName()
    {
        return $this->iconName;
    }


    /**
     * {@inheritdoc}
     */
    public function getHTML()
    {
        $html = '';

        $html .= '<i';

        $html .= ' class="' . $this->iconName . '"';

        $html .= '>';

        $html .= '</i>';

        return $html;
    }

}
