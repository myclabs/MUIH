<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend1;

use MyCLabs\MUIH\Bridge\ZendViewHelper\GenericTag as ZendGenericTag;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend1
 */
class GenericTag extends ZendGenericTag implements \Zend_View_Helper_Interface
{
    use Zend1HelperTrait;
}
