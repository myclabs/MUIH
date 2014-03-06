<?php

namespace MyCLabs\MUIH\Core;

use MyCLabs\MUIH\Core\Traits\AttributesTrait;
use MyCLabs\MUIH\Core\Traits\ClassAttributeTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
class Tabs extends ElementAbstract
{
    use AttributesTrait;
    use ClassAttributeTrait;

    /**
     * @var Tab[]
     */
    protected $tabs;

    /**
     * @var GenericTag
     */
    protected $tabsContent;

    /**
     * @var GenericTag
     */
    protected $TabsNav;


    public function __construct()
    {
        $this->tabsContent = new GenericTag('div', false);
        $this->tabsContent->addClass('tab-content');

        $this->TabsNav = new GenericTag('ul', false);
        $this->TabsNav->addClass('nav');
        $this->TabsNav->addClass('nav-tabs');
    }

    /**
     * GenericTab "div.tab-content" without content.
     * @return GenericTag
     */
    public function getTabsContent()
    {
        return $this->tabsContent;
    }

    /**
     * GenericTab "div.tab-content" with all tabs as content.
     * @return GenericTag
     */
    public function getTabsContentAString()
    {
        return (string) $this->tabsContent->setMainContent(implode('', $this->tabs));
    }

    /**
     * GenericTab "ul.nav-tabs" without content.
     * @return GenericTag
     */
    public function getTabsNav()
    {
        return $this->TabsNav;
    }

    /**
     * GenericTab "ul.nav-tabs" with links to all tabs as content.
     * @return GenericTag
     */
    public function getTabsNavAString()
    {
        $list = '';
        foreach ($this->tabs as $tab) {
            $a = new GenericTag('a', false, $tab->getTitle());
            $a->setAttribute('href', '#' . $tab->getAttribute('id'));
            $a->setAttribute('data-toggle', 'tab');
            if ($tab->isAjax()) {
                $a->setAttribute('data-ajax', $tab->getMainContent());
            }
            $list .= (string) new GenericTag('li', false, $a);
        }
        return (string) $this->TabsNav->setMainContent(implode('', $list));
    }

    /**
     * @param string $id
     * @param string $title
     * @param string $content
     * @param bool $isAjax
     * @return $this
     */
    public function createTab($id, $title, $content, $isAjax=false)
    {
        return $this->addTab(new Tab($id, $title, $content, $isAjax));
    }

    /**
     * @param Tab $tab
     * @return $this
     */
    public function addTab(Tab $tab)
    {
        $this->tabs[$tab->getAttribute('id')] = $tab;

        return $this;
    }

    /**
     * @param string|Tab $tabId
     * @return $this
     */
    public function removeTab($tabId)
    {
        if ($tabId instanceof Tab) {
            $tabId = $tabId->getAttribute('id');
        }

        if ($this->hasTab($tabId)) {
            unset($this->tabs[$tabId]);
        }

        return $this;
    }

    /**
     * @param string|Tab $tabId
     * @return bool
     */
    public function hasTab($tabId)
    {
        if ($tabId instanceof Tab) {
            $tabId = $tabId->getAttribute('id');
        }

        return isset($this->tabs[$tabId]);
    }

    /**
     * @param $tabId
     * @return Tab|null
     */
    public function getTab($tabId)
    {
        return ($this->hasTab($tabId) ? $this->tabs[$tabId] : null);
    }

    /**
     * {@inheritdoc}
     */
    public function getHTML()
    {
        return $this->getTabsNavAString() . $this->getTabsContentAString();
    }

}
