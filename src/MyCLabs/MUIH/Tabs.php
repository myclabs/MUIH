<?php

namespace MyCLabs\MUIH;

use MyCLabs\MUIH\Interfaces\DisplayableInterface;
use MyCLabs\MUIH\Traits\DisplayableTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 */
class Tabs implements DisplayableInterface
{
    use DisplayableTrait;

    /**
     * @var Tab[]
     */
    protected $tabs = [];

    /**
     * @var GenericTag
     */
    protected $tabsContent;

    /**
     * @var GenericTag
     */
    protected $tabsNav;


    /**
     */
    public function __construct()
    {
        $this->tabsNav = new GenericTag('ul', false);
        $this->tabsNav->addClass('nav');
        $this->tabsNav->addClass('nav-tabs');

        $this->tabsContent = new GenericTag('div', false);
        $this->tabsContent->addClass('tab-content');
    }

    /**
     * @param string $id
     * @param string $title
     * @param string $content
     * @param bool $isAjax
     * @param bool $withCache
     * @return $this
     */
    public function createTab($id, $title, $content, $isAjax=false, $withCache=false)
    {
        return $this->addTab(new Tab($id, $title, $content, $isAjax, $withCache));
    }

    /**
     * @param Tab $tab
     * @return $this
     */
    public function addTab(Tab $tab)
    {
        $this->tabs[] = $tab;

        return $this;
    }

    /**
     * @param Tab|string $tabId
     * @return bool
     */
    public function hasTab($tabId)
    {
        if ($tabId instanceof Tab) {
            foreach ($this->tabs as $tab) {
                if ($tab === $tabId) {
                    return true;
                }
            }
        } else {
            foreach ($this->tabs as $tab) {
                if ($tab->getAttribute('id') === $tabId) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param Tab|string $tabId
     * @return $this
     */
    public function removeTab($tabId)
    {
        if ($tabId instanceof Tab) {
            $tabId = $tabId->getAttribute('id');
        }

        foreach ($this->tabs as $tabIndex => $tab) {
            if ($tab->getAttribute('id') === $tabId) {
                unset($this->tabs[$tabIndex]);
            }
        }

        return $this;
    }

    /**
     * @param $tabId
     * @return Tab|null
     */
    public function getTab($tabId)
    {
        foreach ($this->tabs as $tab) {
            if ($tab->getAttribute('id') === $tabId) {
                return $tab;
            }
        }

        return null;
    }

    /**
     * @return Tab[]
     */
    public function getTabs()
    {
        return $this->tabs;
    }

    /**
     * GenericTab "div.tab-content" where all tab contents will be put.
     * @return GenericTag
     */
    public function getTabsContent()
    {
        return $this->tabsContent;
    }

    /**
     * GenericTab "div.tab-content" with content for all tabs as content.
     * @return string
     */
    public function getTabsContentAsString()
    {
        $tabsContent = clone $this->tabsContent;
        return (string) $tabsContent->setContent($this->tabs);
    }

    /**
     * GenericTab "ul.nav-tabs" where all tab navigation links will be put.
     * @return GenericTag
     */
    public function getTabsNav()
    {
        return $this->tabsNav;
    }

    /**
     * GenericTab "ul.nav-tabs" with navigation links for all tabs as content.
     * @return string
     */
    public function getTabsNavAsString()
    {
        $list = [];
        foreach ($this->tabs as $tab) {
            $a = new GenericTag('a', $tab->getTitle());
            $a->setAttribute('href', '#' . $tab->getAttribute('id'));
            $a->setAttribute('data-toggle', 'tab');
            if ($tab->isAjax()) {
                $a->setAttribute('data-src', implode('', $tab->getContent()));
            }
            $list[] = new GenericTag('li', $a);
        }
        $tabsNav = clone $this->tabsNav;
        return (string) $tabsNav->setContent($list);
    }

    /**
     * {@inheritdoc}
     */
    public function getHTML()
    {
        return $this->getTabsNavAsString() . $this->getTabsContentAsString();
    }
}
