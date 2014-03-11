<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend2;

use MyCLabs\MUIH\Bridge\ZendViewHelper\Alert as ZendAlert;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend2
 */
class Alert extends ZendAlert implements Zend\View\Helper\HelperInterface
{
    use Zend2HelperTrait;
}
