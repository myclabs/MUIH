<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Traits;

use MyCLabs\MUIH\Traits\ContentTrait as MUIHContentTrait;
use MyCLabs\MUIH\Icon as MUIHIcon;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
trait IconContentTrait
{
    /**
     * @var MUIHContentTrait
     */
    protected $uiElement;

    /**
     * @param string $icon
     * @return $this
     */
    public function prependIcon($icon)
    {
        if (!($icon instanceof MUIHIcon)) {
            $icon = new MUIHIcon($icon);
        }

        $this->uiElement->prependContent(' ');
        $this->uiElement->prependContent($icon);

        return $this;
    }

    /**
     * @param string $icon
     * @return $this
     */
    public function appendIcon($icon)
    {
        if (!($icon instanceof MUIHIcon)) {
            $icon = new MUIHIcon($icon);
        }

        $this->uiElement->appendContent($icon);
        $this->uiElement->appendContent(' ');

        return $this;
    }
}
