<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend1;

use MyCLabs\MUIH\Bridge\ZendViewHelper\ProgressBar as ZendProgressBar;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend1
 */
class ProgressBar extends ZendProgressBar implements \Zend_View_Helper_Interface
{
    use Zend1HelperTrait;
}
