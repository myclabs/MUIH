<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\Badge;

/**
 * @covers MyCLabs\MUIH\Badge
 */
class BadgeTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Badge('foo');

        $this->assertEquals(
            '<span class="badge">foo</span>',
            $tag->getHTML()
        );
    }
}
