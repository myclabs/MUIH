<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend2;

use MyCLabs\MUIH\Bridge\ZendViewHelper\ProgressBar as ZendProgressBar;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend2
 */
class ProgressBar extends ZendProgressBar implements Zend\View\Helper\HelperInterface
{
    use Zend2HelperTrait;
}
