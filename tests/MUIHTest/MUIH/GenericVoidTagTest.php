<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\GenericVoidTag;

/**
 * @covers MyCLabs\MUIH\GenericVoidTag
 */
class GenericVoidTagTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new GenericVoidTag('foo');

        $this->assertEquals(
            '<foo>',
            $tag->getHTML()
        );
    }

    public function testConstructor()
    {
        $tag = new GenericVoidTag('foo', true);

        $this->assertEquals(
            '<foo />',
            $tag->getHTML()
        );
    }
}
