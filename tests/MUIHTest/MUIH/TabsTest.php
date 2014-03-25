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
        $tag = new Tabs();

        $this->assertEquals(
            '<ul class="nav nav-tabs"></ul>'.
            '<div class="tab-content"></div>',
            $tag->getHTML()
        );
    }

    public function testGetTabsNav()
    {
        $tag = new Tabs();

        $tabsNav = $tag->getTabsNav();
        $this->assertInstanceOf(GenericTag::class, $tabsNav);
        $this->assertEquals(
            '<ul class="nav nav-tabs"></ul>',
            $tabsNav->getHTML()
        );
    }

    public function testGetTabsContent()
    {
        $tag = new Tabs();

        $tabsContent = $tag->getTabsContent();
        $this->assertInstanceOf(GenericTag::class, $tabsContent);
        $this->assertEquals(
            '<div class="tab-content"></div>',
            $tabsContent->getHTML()
        );
    }

    public function testCreateTab()
    {
        $tag = new Tabs();

        $tag->createTab('fu', 'foo', 'bar');
        $this->assertEquals(
            '<ul class="nav nav-tabs"><li><a href="#fu" data-toggle="tab">foo</a></li></ul>'.
            '<div class="tab-content"><div id="fu" class="tab-pane fade">bar</div></div>',
            $tag->getHTML()
        );

        $tag = new Tabs();

        $tag->createTab('fu', 'foo', 'bar', true, true);
        $this->assertEquals(
            '<ul class="nav nav-tabs"><li><a href="#fu" data-toggle="tab" data-src="bar">foo</a></li></ul>'.
            '<div class="tab-content"><div id="fu" class="tab-pane fade" data-cache="true">Loading…</div></div>',
            $tag->getHTML()
        );
    }

    public function testAddHasGetRemoveTab()
    {
        $tag = new Tabs();
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
        $tag = new Tabs();

        $tag->createTab('fu', 'foo', 'bar');
        $this->assertEquals(
            '<ul class="nav nav-tabs"><li><a href="#fu" data-toggle="tab">foo</a></li></ul>',
            $tag->getTabsNavAsString()
        );
    }

    public function testGetTabsContentAsString()
    {
        $tag = new Tabs();

        $tag->createTab('fu', 'foo', 'bar');
        $this->assertEquals(
            '<div class="tab-content"><div id="fu" class="tab-pane fade">bar</div></div>',
            $tag->getTabsContentAsString()
        );
    }

    public function testActiveTab()
    {
        $tag = new Tabs();
        $tag->createTab('oo', 'foo', 'bar');
        $tag->createTab('u', 'fu', 'baz');

        $tag->activeTab('oo');
        $this->assertEquals(
            '<ul class="nav nav-tabs">'.
                '<li class="active"><a href="#oo" data-toggle="tab">foo</a></li>'.
                '<li><a href="#u" data-toggle="tab">fu</a></li>'.
            '</ul>'.
            '<div class="tab-content">'.
                '<div id="oo" class="tab-pane fade in active">bar</div>'.
                '<div id="u" class="tab-pane fade">baz</div>'.
            '</div>',
            $tag->getHTML()
        );

        $tag->activeTab($tag->getTab('u'));
        $this->assertEquals(
            '<ul class="nav nav-tabs">'.
                '<li><a href="#oo" data-toggle="tab">foo</a></li>'.
                '<li class="active"><a href="#u" data-toggle="tab">fu</a></li>'.
            '</ul>'.
            '<div class="tab-content">'.
                '<div id="oo" class="tab-pane fade">bar</div>'.
                '<div id="u" class="tab-pane fade in active">baz</div>'.
            '</div>',
            $tag->getHTML()
        );

        $tag->activeTab('fail');
        $this->assertEquals(
            '<ul class="nav nav-tabs">'.
                '<li><a href="#oo" data-toggle="tab">foo</a></li>'.
                '<li><a href="#u" data-toggle="tab">fu</a></li>'.
            '</ul>'.
            '<div class="tab-content">'.
                '<div id="oo" class="tab-pane fade">bar</div>'.
                '<div id="u" class="tab-pane fade">baz</div>'.
            '</div>',
            $tag->getHTML()
        );
    }
}
