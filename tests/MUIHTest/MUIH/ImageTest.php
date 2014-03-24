<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\Image;

/**
 * @covers MyCLabs\MUIH\Image
 */
class ImageTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Image('foo');

        $this->assertEquals(
            '<img src="foo" alt="">',
            $tag->getHTML()
        );
    }

    public function testConstructor()
    {
        $tag = new Image('foo', 'bar', true);

        $this->assertEquals(
            '<img src="foo" alt="bar" />',
            $tag->getHTML()
        );
    }
}
