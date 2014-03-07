<?php

namespace MyCLabs\MUIH\Core;

use MyCLabs\MUIH\Core\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
class Badge extends GenericTag
{
    use AttributesTrait;


    /**
     * @param string $content
     */
    public function  __construct($content)
    {
        $this->addClass('badge');

        parent::__construct('span', false, $content);
    }

}
