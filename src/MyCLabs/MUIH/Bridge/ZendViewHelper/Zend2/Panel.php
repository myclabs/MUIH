<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend2;

use MyCLabs\MUIH\Bridge\ZendViewHelper\Panel as ZendPanel;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend2
 */
class Panel extends ZendPanel implements Zend\View\Helper\HelperInterface
{
    use Zend2HelperTrait;
}
