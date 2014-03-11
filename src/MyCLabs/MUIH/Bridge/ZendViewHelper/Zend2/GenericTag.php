<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend2;

use MyCLabs\MUIH\Bridge\ZendViewHelper\GenericTag as ZendGenericTag;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend2
 */
class GenericTag extends ZendGenericTag implements Zend\View\Helper\HelperInterface
{
    use Zend2HelperTrait;
}
