<?php

namespace MyCLabs\MUIH\Core;

use MyCLabs\MUIH\Core\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
class Collapse extends GenericTag
{
    /**
     * Default is i.glyphicon-chevron-down.
     * @var string
     */
    static $defaultOpenedIndicator = '<i class="glyphicon glyphicon-chevron-down collapseIndicator"></i>';

    /**
     * Default is i.glyphicon-chevron-right.
     * @var string
     */
    static $defaultClosedIndicator = '<i class="glyphicon glyphicon-chevron-right collapseIndicator"></i>';

    /**
     * @var GenericTag
     */
    protected $legend;

    /**
     * @var string
     */
    protected $openedIndicator;
    
    /**
     * @var string
     */
    protected $closedIndicator;
    

    /**
     * @param string $id
     * @param string $content
     * @param string $legend
     */
    public function  __construct($id, $content, $legend)
    {
        $this->addClass('panel');

        $this->legend = new GenericTag('a');
        $this->legend->setAttribute('data-toggle', 'collapse');
        $this->legend = new GenericTag('legend', $legend);

        $this->setLegendContent($legend);

        $this->setCollapseStateIndicators();

        $this->content = new GenericTag('div');
        $this->content->addClass('collapse');
        $this->content->setAttribute('id', $id);

        parent::__construct('fieldset', false, $content);

    }

    /**
     * {@inheritdoc}
     */
    public function setMainContent($content)
    {
        // div.collapse > content.
        $this->getCollapse()->setMainContent($content);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMainContent()
    {
        // div.collapse > content.
        return $this->getCollapse()->getMainContent();
    }

    /**
     * Main content wrapped in a "div.collapse" GenericTag.
     * @return GenericTag
     */
    public function getCollapse()
    {
        return $this->content;
    }

    /**
     * @param string $legend
     * @return $this
     */
    public function setLegendContent($legend)
    {
        // legend > a > content.
        $this->getLegend()->getMainContent()->setMainContent($legend);

        return $this;
    }

    /**
     * Legend content wrapped in a "legend a" GenericTag.
     * @return GenericTag
     */
    public function getLegend()
    {
        return $this->legend;
    }

    /**
     * @param null $openedIndicator
     * @param null $closedIndicator
     * @return Collapse
     */
    public function setCollapseStateIndicators($openedIndicator=null, $closedIndicator=null)
    {
        if ($openedIndicator === null) {
            $this->openedIndicator = self::$defaultOpenedIndicator;
        }
        if ($closedIndicator === null) {
            $this->closedIndicator = self::$defaultClosedIndicator;
        }
        
        return $this;
    }

    /**
     * @return string
     */
    public function getOpenedIndicator()
    {
        return $this->openedIndicator;
    }

    /**
     * @return string
     */
    public function getClosedIndicator()
    {
        return $this->closedIndicator;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentAsString()
    {
        $legend = clone $this->getLegend();
        $legend->getMainContent()->setAttribute(
            'href',
            '#' . $this->getMainContent()->getAttribute('id')
        );
        if ($this->getMainContent()->hasClass('in')) {
            $indicator = $this->openedIndicator;
        } else {
            $indicator = $this->closedIndicator;
        }
        $legend->setMainContent($indicator . $legend->getMainContent());
        
        return (string) $legend . $this->content;
    }

} 