<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend1;

use MyCLabs\MUIH\Bridge\ZendViewHelper\Alert as ZendAlert;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend1
 */
class Alert extends ZendAlert implements \Zend_View_Helper_Interface
{
    use Zend1HelperTrait;
}
