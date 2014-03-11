<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend2;

use MyCLabs\MUIH\Bridge\ZendViewHelper\Label as ZendLabel;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend2
 */
class Label extends ZendLabel implements Zend\View\Helper\HelperInterface
{
    use Zend2HelperTrait;
}
