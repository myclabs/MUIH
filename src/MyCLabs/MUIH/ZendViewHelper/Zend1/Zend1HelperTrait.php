<?php

namespace MyCLabs\MUIH\ZendViewHelper\Zend1;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend1
 */
trait Zend1HelperTrait
{
    /**
     * View object
     *
     * @var Zend_View_Interface
     */
    public $view = null;

    /**
     * Set the View object
     *
     * @param  Zend_View_Interface $view
     * @return Zend_View_Helper_Interface
     */
    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
        return $this;
    }

    /**
     * Strategy pattern: currently unutilized
     *
     * @return void
     */
    public function direct()
    {
    }

} 