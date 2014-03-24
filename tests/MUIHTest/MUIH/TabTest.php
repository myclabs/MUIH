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
            '<div id="fu" class="tab-pane fade">bar</div>',
            $tag->getHTML()
        );
    }

    public function testAjax()
    {
        $tag = new Tab('fu', 'foo', 'bar', false, true);

        $this->assertFalse($tag->isAjax());
        $this->assertEquals(
            '<div id="fu" class="tab-pane fade">bar</div>',
            $tag->getHTML()
        );

        $tag = new Tab('fu', 'foo', 'bar', true, false);

        $this->assertTrue($tag->isAjax());
        $this->assertEquals(
            '<div id="fu" class="tab-pane fade" data-cache="false">Loading…</div>',
            $tag->getHTML()
        );

        $tag = new Tab('fu', 'foo', 'bar', true, true);

        $this->assertTrue($tag->isAjax());
        $this->assertEquals(
            '<div id="fu" class="tab-pane fade" data-cache="true">Loading…</div>',
            $tag->getHTML()
        );

        $tag = new Tab('fu', 'foo', 'bar');

        $tag->setAjax(true);
        $this->assertTrue($tag->isAjax());
        $this->assertEquals(
            '<div id="fu" class="tab-pane fade" data-cache="false">Loading…</div>',
            $tag->getHTML()
        );

        $tag = new Tab('fu', 'foo', 'bar');

        $tag->setAjax(true, true);
        $this->assertTrue($tag->isAjax());
        $this->assertEquals(
            '<div id="fu" class="tab-pane fade" data-cache="true">Loading…</div>',
            $tag->getHTML()
        );

        $tag = new Tab('fu', 'foo', 'bar', true);

        $tag->setAjax(false);
        $this->assertFalse($tag->isAjax());
        $this->assertEquals(
            '<div id="fu" class="tab-pane fade">bar</div>',
            $tag->getHTML()
        );
    }

    public function testSetLoadingTest()
    {
        $tag = new Tab('fu', 'foo', 'bar', true);

        $this->assertEquals(
            '<div id="fu" class="tab-pane fade" data-cache="false">Loading…</div>',
            $tag->getHTML()
        );

        $tag->setLoadingText('baz');

        $this->assertEquals(
            '<div id="fu" class="tab-pane fade" data-cache="false">baz</div>',
            $tag->getHTML()
        );
    }

    public function testSetDefaultLoadingTest()
    {
        $tag = new Tab('fu', 'foo', 'bar', true);

        $this->assertEquals(
            '<div id="fu" class="tab-pane fade" data-cache="false">Loading…</div>',
            $tag->getHTML()
        );

        Tab::$defaultAjaxTabLoadingText = 'baz';

        $tag = new Tab('fu', 'foo', 'bar', true);

        $this->assertEquals(
            '<div id="fu" class="tab-pane fade" data-cache="false">baz</div>',
            $tag->getHTML()
        );

        Tab::$defaultAjaxTabLoadingText = 'Loading…';
    }
}
