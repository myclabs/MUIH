<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\GenericTag;

/**
 * @covers MyCLabs\MUIH\GenericTag
 */
class GenericTagTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new GenericTag('foo');

        $this->assertEquals(
            '<foo></foo>',
            $tag->getHTML()
        );
    }

    public function testConstructor()
    {
        $tag = new GenericTag('foo', 'bar');

        $this->assertEquals(
            '<foo>bar</foo>',
            $tag->getHTML()
        );

        $tag = new GenericTag('foo', ['bar', 'baz', 'bax']);

        $this->assertEquals(
            '<foo>barbazbax</foo>',
            $tag->getHTML()
        );
    }
}
