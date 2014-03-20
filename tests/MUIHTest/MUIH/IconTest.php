<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\Icon;

/**
 * @covers MyCLabs\MUIH\Icon
 */
class IconTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
    }

    public function testDefault()
    {
        $tag = new Icon('foo');

        $this->assertEquals(
            '<i class="glyphicon glyphicon-foo"></i>',
            $tag->getHTML()
        );
    }

    public function testConstructor()
    {
        $tag = new Icon('foo', false);

        $this->assertEquals(
            '<i class="foo"></i>',
            $tag->getHTML()
        );

        $tag = new Icon('foo', Icon::FONT_AWESOME);

        $this->assertEquals(
            '<i class="fa fa-foo"></i>',
            $tag->getHTML()
        );
    }

    public function testSetIconName()
    {
        $tag = new Icon('foo');

        $tag->setIconName('bar');
        $this->assertEquals(
            '<i class="glyphicon glyphicon-bar"></i>',
            $tag->getHTML()
        );

        $tag->setIconName('baz', false);
        $this->assertEquals(
            '<i class="baz"></i>',
            $tag->getHTML()
        );

        $tag->setIconName('bax', Icon::FONT_AWESOME);
        $this->assertEquals(
            '<i class="fa fa-bax"></i>',
            $tag->getHTML()
        );
    }
    
    public function testGlyphicon()
    {
        $tag = new Icon('foo', false);

        $tag->glyphicon();
        $this->assertEquals(
            '<i class="glyphicon glyphicon-foo"></i>',
            $tag->getHTML()
        );
    }

    public function testFontAwesome()
    {
        $tag = new Icon('foo', false);

        $tag->fontAwesome();
        $this->assertEquals(
            '<i class="fa fa-foo"></i>',
            $tag->getHTML()
        );
    }

    public function testDefaultIconPrefix()
    {
        Icon::$defaultIconPrefix = '';
        $tag = new Icon('foo');

        $this->assertEquals(
            '<i class="foo"></i>',
            $tag->getHTML()
        );

        Icon::$defaultIconPrefix = Icon::GLYPHICON;
        $tag = new Icon('foo');

        $this->assertEquals(
            '<i class="glyphicon glyphicon-foo"></i>',
            $tag->getHTML()
        );

        Icon::$defaultIconPrefix = Icon::FONT_AWESOME;
        $tag = new Icon('foo');

        $this->assertEquals(
            '<i class="fa fa-foo"></i>',
            $tag->getHTML()
        );

        Icon::$defaultIconPrefix = 'bar';
        $tag = new Icon('foo');

        $this->assertEquals(
            '<i class="barfoo"></i>',
            $tag->getHTML()
        );
    }
}
