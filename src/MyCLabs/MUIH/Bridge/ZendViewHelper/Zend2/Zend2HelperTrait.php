<?php

namespace MyCLabs\MUIH\Bridge\ZendViewHelper\Zend2;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper\Zend2
 */
trait Zend2HelperTrait
{
    /**
     * View object
     *
     * @var Zend\View\Renderer\RendererInterface
     */
    public $view = null;

    /**
     * Set the View object
     *
     * @param  Zend\View\Renderer\RendererInterface $view
     * @return Zend\View\Helper\HelperInterface
     */
    public function setView(Zend\View\Renderer\RendererInterface $view)
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