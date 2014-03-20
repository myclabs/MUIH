<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\Label;

/**
 * @covers MyCLabs\MUIH\Label
 */
class LabelTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Label('foo');

        $this->assertEquals(
            '<span class="label label-default">foo</span>',
            $tag->getHTML()
        );
    }
    
    public function testConstructor()
    {
        $tag = new Label('foo', Label::TYPE_PRIMARY);

        $this->assertEquals(
            '<span class="label label-primary">foo</span>',
            $tag->getHTML()
        );
    }
    
    public function testChangeType()
    {
        $tag = new Label('foo', Label::TYPE_PRIMARY);
        
        $tag->changeType(Label::TYPE_INFO);
        $this->assertEquals(
            '<span class="label label-info">foo</span>',
            $tag->getHTML()
        );
        
        $tag->changeType(Label::TYPE_SUCCESS);
        $this->assertEquals(
            '<span class="label label-success">foo</span>',
            $tag->getHTML()
        );
    }
}
