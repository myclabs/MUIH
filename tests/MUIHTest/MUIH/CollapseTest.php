<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\GenericTag;
use MyCLabs\MUIH\Collapse;

/**
 * @covers MyCLabs\MUIH\Collapse
 */
class CollapseTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Collapse();

        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#">'.
                        '<i class="glyphicon glyphicon-chevron-right collapseIndicator"></i> '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id=""></div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

    public function testConstructor()
    {
        $tag = new Collapse('foo', 'fu', 'bar');

        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        '<i class="glyphicon glyphicon-chevron-right collapseIndicator"></i> '.
                        'fu'.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id="foo">bar</div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

    public function testShow()
    {
        $tag = new Collapse('foo');

        $tag->show();
        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        '<i class="glyphicon glyphicon-chevron-down collapseIndicator"></i> '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse in" id="foo"></div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

    public function testGetTitle()
    {
        $tag = new Collapse('foo');

        $title = $tag->getTitle();
        $this->assertInstanceOf(GenericTag::class, $title);
        $this->assertEquals(
            '<legend>'.
                '<a data-toggle="collapse"></a>'.
            '</legend>',
            $title->getHTML()
        );
    }

    public function testGetTitleLink()
    {
        $tag = new Collapse('foo');

        $title = $tag->getTitleLink();
        $this->assertInstanceOf(GenericTag::class, $title);
        $this->assertEquals(
            '<a data-toggle="collapse"></a>',
            $title->getHTML()
        );
    }

    public function testSetTitleContent()
    {
        $tag = new Collapse('foo');

        $tag->setTitleContent('bar');
        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        '<i class="glyphicon glyphicon-chevron-right collapseIndicator"></i> '.
                        'bar'.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id="foo"></div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

    public function testGetCollapse()
    {
        $tag = new Collapse('foo');

        $collapse = $tag->getCollapse();
        $this->assertInstanceOf(GenericTag::class, $collapse);
        $this->assertEquals(
            '<div class="collapse" id="foo"></div>',
            $collapse->getHTML()
        );
    }

    public function testSetContent()
    {
        $tag = new Collapse('foo', null, 'bar');

        $tag->setContent('baz');
        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        '<i class="glyphicon glyphicon-chevron-right collapseIndicator"></i> '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id="foo">baz</div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

    public function testPrependContent()
    {
        $tag = new Collapse('foo', null, 'bar');

        $tag->prependContent('baz');
        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        '<i class="glyphicon glyphicon-chevron-right collapseIndicator"></i> '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id="foo">bazbar</div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

    public function testAppendContent()
    {
        $tag = new Collapse('foo', null, 'bar');

        $tag->appendContent('baz');
        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        '<i class="glyphicon glyphicon-chevron-right collapseIndicator"></i> '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id="foo">barbaz</div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

    public function testGetContent()
    {
        $tag = new Collapse('foo');

        $content = $tag->getContent();
        $this->assertInternalType('array', $content);
        $this->assertEquals([], $content);
    }

    public function testSetCollapseStateIndicator()
    {
        $tag = new Collapse('foo');

        $tag->setCollapseStateIndicators(new GenericTag('open'), new GenericTag('close'));
        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        '<close></close> '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id="foo"></div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

    public function testDefaultDismissButton()
    {
        $tag = new Collapse('foo');

        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        '<i class="glyphicon glyphicon-chevron-right collapseIndicator"></i> '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id="foo"></div>'.
            '</fieldset>',
            $tag->getHTML()
        );

        Collapse::$defaultOpenedIndicator = 'bar';
        Collapse::$defaultClosedIndicator = 'baz';
        $tag = new Collapse('foo');

        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        'baz '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse" id="foo"></div>'.
            '</fieldset>',
            $tag->getHTML()
        );

        $tag->show();

        $this->assertEquals(
            '<fieldset>'.
                '<legend>'.
                    '<a data-toggle="collapse" href="#foo">'.
                        'bar '.
                    '</a>'.
                '</legend>'.
                '<div class="collapse in" id="foo"></div>'.
            '</fieldset>',
            $tag->getHTML()
        );
    }

}
