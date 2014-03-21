<?php

namespace MUIHTest\MUIH\Bridges\ZendViewHelper;


use MyCLabs\MUIH\Bridge\ZendViewHelper\Label;
use MyCLabs\MUIH\Label as MUIHLabel;

/**
 * @covers MyCLabs\MUIH\Bridges\ZendViewHelper\Label
 */
class LabelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Label;
     */
    protected $helper;


    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->helper = new Label();
    }


    public function testDefault()
    {
        $this->assertEquals(
            '<span class="label label-default">foo</span>',
            (string) $this->helper->label('foo')
        );
    }

    public function testArguments()
    {
        $this->assertEquals(
            '<span class="label label-info"><i class="glyphicon glyphicon-bar"></i> foo</span>',
            (string) $this->helper->label('foo', MUIHLabel::TYPE_INFO, 'bar')
        );
    }

    public function testType()
    {
        $this->assertEquals(
            '<span class="label label-success">foo</span>',
            (string) $this->helper->label('foo')->type(MUIHLabel::TYPE_SUCCESS)
        );
    }
}
