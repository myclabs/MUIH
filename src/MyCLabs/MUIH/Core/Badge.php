<?php

namespace MyCLabs\MUIH\Core;

use MyCLabs\MUIH\Core\Traits\AttributesTrait;
use MyCLabs\MUIH\Core\Traits\ClassAttributeTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
class Badge extends GenericTag
{
    use AttributesTrait;
    use ClassAttributeTrait;


    /**
     * @param string $content
     */
    public function  __construct($content)
    {
        $this->addClass('badge');

        parent::__construct('span', false, $content);
    }

}
