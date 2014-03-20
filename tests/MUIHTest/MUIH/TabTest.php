<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\Tab;

/**
 * @covers MyCLabs\MUIH\Tab
 */
class TabTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Tab('fu', 'foo', 'bar');

        $this->assertEquals('foo', $tag->getTitle());
        $this->assertEquals(
            '<div class="tab-pane" id="fu">bar</div>',
            $tag->getHTML()
        );
    }

    public function testAjax()
    {
        $tag = new Tab('fu', 'foo', 'bar', false);

        $this->assertFalse($tag->isAjax());
        $this->assertEquals(
            '<div class="tab-pane" id="fu">bar</div>',
            $tag->getHTML()
        );

        $tag = new Tab('fu', 'foo', 'bar', true);

        $this->assertTrue($tag->isAjax());
        $this->assertEquals(
            '<div class="tab-pane" id="fu">Loading…</div>',
            $tag->getHTML()
        );
    }

    public function testSetLoadingTest()
    {
        $tag = new Tab('fu', 'foo', 'bar', true);

        $this->assertEquals(
            '<div class="tab-pane" id="fu">Loading…</div>',
            $tag->getHTML()
        );

        $tag->setLoadingText('baz');

        $this->assertEquals(
            '<div class="tab-pane" id="fu">baz</div>',
            $tag->getHTML()
        );
    }

    public function testSetDefaultLoadingTest()
    {
        $tag = new Tab('fu', 'foo', 'bar', true);

        $this->assertEquals(
            '<div class="tab-pane" id="fu">Loading…</div>',
            $tag->getHTML()
        );

        Tab::$defaultAjaxTabLoadingText = 'baz';

        $tag = new Tab('fu', 'foo', 'bar', true);

        $this->assertEquals(
            '<div class="tab-pane" id="fu">baz</div>',
            $tag->getHTML()
        );
    }
}
