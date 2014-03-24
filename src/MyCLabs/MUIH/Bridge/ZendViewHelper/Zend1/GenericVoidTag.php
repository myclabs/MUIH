<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend1;

use MyCLabs\MUIH\Bridge\ZendViewHelper\GenericVoidTag as ZendGenericVoidTag;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend1
 */
class GenericVoidTag extends ZendGenericVoidTag implements \Zend_View_Helper_Interface
{
    use Zend1HelperTrait;
}
