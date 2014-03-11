<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend1;

use MyCLabs\MUIH\Bridge\ZendViewHelper\Panel as ZendPanel;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend1
 */
class Panel extends ZendPanel implements \Zend_View_Helper_Interface
{
    use Zend1HelperTrait;
}
