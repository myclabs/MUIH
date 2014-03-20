<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\GenericTag;
use MyCLabs\MUIH\Tabs;
use MyCLabs\MUIH\Tab;

/**
 * @covers MyCLabs\MUIH\Tabs
 */
class TabsTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Tabs('10');

        $this->assertEquals(
            '<ul class="nav nav-tabs"></ul>'.
            '<div class="tab-content"></div>',
            $tag->getHTML()
        );
    }

    public function testGetTabsNav()
    {
        $tag = new Tabs('10');

        $tabsNav = $tag->getTabsNav();
        $this->assertInstanceOf(GenericTag::class, $tabsNav);
        $this->assertEquals(
            '<ul class="nav nav-tabs"></ul>',
            $tabsNav->getHTML()
        );
    }

    public function testGetTabsContent()
    {
        $tag = new Tabs('10');

        $tabsContent = $tag->getTabsContent();
        $this->assertInstanceOf(GenericTag::class, $tabsContent);
        $this->assertEquals(
            '<div class="tab-content"></div>',
            $tabsContent->getHTML()
        );
    }

    public function testCreateTab()
    {
        $tag = new Tabs('10');

        $tag->createTab('fu', 'foo', 'bar');
        $this->assertEquals(
            '<ul class="nav nav-tabs"><li><a href="#fu" data-toggle="tab">foo</a></li></ul>'.
            '<div class="tab-content"><div class="tab-pane" id="fu">bar</div></div>',
            $tag->getHTML()
        );
    }

    public function testAddHasGetRemoveTab()
    {
        $tag = new Tabs('10');
        $tab = new Tab('fu', 'fu', 'baz');

        $this->assertFalse($tag->hasTab('foo'));
        $this->assertFalse($tag->hasTab($tab));
        $this->assertEmpty($tag->getTabs());

        $tag->addTab($tab);
        $tag->createTab('foo', 'foo', 'bar');

        $this->assertTrue($tag->hasTab('foo'));
        $this->assertTrue($tag->hasTab($tab));

        $fooTab = $tag->getTab('foo');
        $this->assertInstanceOf(Tab::class, $fooTab);
        $this->assertEquals($fooTab->getTitle(), 'foo');
        $this->assertEquals($fooTab->getContent(), ['bar']);

        $this->assertEquals([$tab, $fooTab], $tag->getTabs());

        $tag->removeTab($tab);
        $tag->removeTab('foo');

        $this->assertFalse($tag->hasTab('foo'));
        $this->assertFalse($tag->hasTab($tab));
        $this->assertEmpty($tag->getTabs());
    }

    public function testGetTabsNavAsString()
    {
        $tag = new Tabs('10');

        $tag->createTab('fu', 'foo', 'bar');
        $this->assertEquals(
            '<ul class="nav nav-tabs"><li><a href="#fu" data-toggle="tab">foo</a></li></ul>',
            $tag->getTabsNavAsString()
        );
    }

    public function testGetTabsContentAsString()
    {
        $tag = new Tabs('10');

        $tag->createTab('fu', 'foo', 'bar');
        $this->assertEquals(
            '<div class="tab-content"><div class="tab-pane" id="fu">bar</div></div>',
            $tag->getTabsContentAsString()
        );
    }
}
