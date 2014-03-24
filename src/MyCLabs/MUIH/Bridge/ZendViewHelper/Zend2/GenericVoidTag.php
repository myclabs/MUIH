<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend2;

use MyCLabs\MUIH\Bridge\ZendViewHelper\GenericVoidTag as ZendGenericVoidTag;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend2
 */
class GenericVoidTag extends ZendGenericVoidTag implements Zend\View\Helper\HelperInterface
{
    use Zend2HelperTrait;
}
