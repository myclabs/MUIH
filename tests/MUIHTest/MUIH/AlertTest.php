<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\Alert;

/**
 * @covers MyCLabs\MUIH\Alert
 */
class AlertTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Alert('foo');

        $this->assertEquals(
            '<div class="alert alert-info">'.
                '<button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>'.
                'foo'.
            '</div>',
            $tag->getHTML()
        );
    }
    
    public function testConstructor()
    {
        $tag = new Alert('foo', Alert::TYPE_SUCCESS, false);

        $this->assertEquals(
            '<div class="alert alert-success">foo</div>',
            $tag->getHTML()
        );
    }
    
    public function testAddDefaultDismissButton()
    {
        $tag = new Alert('foo', null, false);

        $tag->addDefaultDismissButton();
        $this->assertEquals(
            '<div class="alert alert-info">'.
                '<button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>'.
                'foo'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testAddDismissButton()
    {
        $tag = new Alert('foo', null, false);

        $tag->addDismissButton('bar');
        $this->assertEquals(
            '<div class="alert alert-info">barfoo</div>',
            $tag->getHTML()
        );
    }

    public function testAddTitle()
    {
        $tag = new Alert('foo');

        $tag->addTitle('bar');
        $this->assertEquals(
            '<div class="alert alert-info">'.
                '<strong>bar</strong>'.
                '<button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>'.
                'foo'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testDefaultDismiss()
    {
        $tag = new Alert('foo', null, false);

        $tag->addDefaultDismissButton();
        $this->assertEquals(
            '<div class="alert alert-info">'.
                '<button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>'.
                'foo'.
            '</div>',
            $tag->getHTML()
        );

        Alert::$defaultDismiss = 'fu';
        $tag = new Alert('foo', null, false);

        $tag->addDefaultDismissButton();
        $this->assertEquals(
            '<div class="alert alert-info">'.
                'fu'.
                'foo'.
            '</div>',
            $tag->getHTML()
        );
    }
}
