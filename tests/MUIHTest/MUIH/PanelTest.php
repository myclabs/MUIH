<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\GenericTag;
use MyCLabs\MUIH\Panel;

/**
 * @covers MyCLabs\MUIH\Panel
 */
class PanelTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Panel();

        $this->assertEquals(
            '<div class="panel panel-default">'.
                '<div class="panel-body"></div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testConstructor()
    {
        $tag = new Panel('foo', 'bar', 'baz', Panel::TYPE_INFO);

        $this->assertEquals(
            '<div class="panel panel-info">'.
                '<div class="panel-header">bar</div>'.
                '<div class="panel-body">foo</div>'.
                '<div class="panel-footer">baz</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testGetHeader()
    {
        $tag = new Panel();

        $header = $tag->getHeader();
        $this->assertInstanceOf(GenericTag::class, $header);
        $this->assertEquals(
            '<div class="panel-header"></div>',
            $header->getHTML()
        );
    }

    public function testSetHeaderContent()
    {
        $tag = new Panel();

        $tag->setHeaderContent('foo');
        $this->assertEquals(
            '<div class="panel panel-default">'.
                '<div class="panel-header">foo</div>'.
                '<div class="panel-body"></div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testGetFooter()
    {
        $tag = new Panel();

        $footer = $tag->getFooter();
        $this->assertInstanceOf(GenericTag::class, $footer);
        $this->assertEquals(
            '<div class="panel-footer"></div>',
            $footer->getHTML()
        );
    }

    public function testSetFooterContent()
    {
        $tag = new Panel();

        $tag->setFooterContent('foo');
        $this->assertEquals(
            '<div class="panel panel-default">'.
                '<div class="panel-body"></div>'.
                '<div class="panel-footer">foo</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testGetBody()
    {
        $tag = new Panel();

        $body = $tag->getBody();
        $this->assertInstanceOf(GenericTag::class, $body);
        $this->assertEquals(
            '<div class="panel-body"></div>',
            $body->getHTML()
        );
    }

    public function testSetContent()
    {
        $tag = new Panel();

        $tag->setContent('foo');
        $this->assertEquals(
            '<div class="panel panel-default">'.
                '<div class="panel-body">foo</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testPrependContent()
    {
        $tag = new Panel();

        $tag->setContent('foo');
        $tag->prependContent('bar');
        $this->assertEquals(
            '<div class="panel panel-default">'.
                '<div class="panel-body">barfoo</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testAppendContent()
    {
        $tag = new Panel();

        $tag->setContent('foo');
        $tag->appendContent('bar');
        $this->assertEquals(
            '<div class="panel panel-default">'.
                '<div class="panel-body">foobar</div>'.
            '</div>',
            $tag->getHTML()
        );
    }
}
