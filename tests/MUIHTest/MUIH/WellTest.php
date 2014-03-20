<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\Well;

/**
 * @covers MyCLabs\MUIH\Well
 */
class WellTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Well('foo');

        $this->assertEquals(
            '<div class="well">foo</div>',
            $tag->getHTML()
        );
    }
}
