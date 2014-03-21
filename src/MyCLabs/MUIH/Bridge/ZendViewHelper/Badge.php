<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper;

use MyCLabs\MUIH\Badge as MUIHBadge;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\IconContentTrait;
use MyCLabs\MUIH\Bridge\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Badge
{
    use AttributesTrait;
    use TitleEnhancementTrait;
    use IconContentTrait;

    /**
     * @var MUIHBadge
     */
    protected $uiElement = null;


    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->uiElement;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function badge($content)
    {
        $this->uiElement = new MUIHBadge($content);

        return $this;
    }
}
