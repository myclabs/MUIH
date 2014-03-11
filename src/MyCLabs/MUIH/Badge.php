<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage MUIH
 */
class Badge extends GenericTag
{
    /**
     * @param string $content
     */
    public function  __construct($content)
    {
        $this->addClass('badge');

        parent::__construct('span', false, $content);
    }

}
