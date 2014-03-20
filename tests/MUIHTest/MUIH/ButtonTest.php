<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\Button;

/**
 * @covers MyCLabs\MUIH\Button
 */
class ButtonTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Button('foo');

        $this->assertEquals(
            '<button class="btn btn-default" type="button">foo</button>',
            $tag->getHTML()
        );
    }
    
    public function testConstructor()
    {
        $tag = new Button('foo', Button::TYPE_INFO);

        $this->assertEquals(
            '<button class="btn btn-info" type="button">foo</button>',
            $tag->getHTML()
        );
    }

    public function testChangeType()
    {
        $tag = new Button('foo');

        $this->assertEquals(
            '<button class="btn btn-default" type="button">foo</button>',
            $tag->getHTML()
        );

        $tag->changeType(Button::TYPE_INFO);
        $this->assertEquals(
            '<button class="btn btn-info" type="button">foo</button>',
            $tag->getHTML()
        );
    }

    public function testSetHref()
    {
        $tag = new Button('foo');

        $tag->setAttribute('href', 'bar');
        $this->assertEquals(
            '<a class="btn btn-default" href="bar">foo</a>',
            $tag->getHTML()
        );
    }

    public function testLink()
    {
        $tag = new Button('foo');

        $tag->link('bar');
        $this->assertEquals(
            '<a class="btn btn-default" href="bar">foo</a>',
            $tag->getHTML()
        );
    }

    public function testLinkTarget()
    {
        $tag = new Button('foo');

        $tag->link('bar', 'baz');
        $this->assertEquals(
            '<a class="btn btn-default" href="bar" target="baz">foo</a>',
            $tag->getHTML()
        );
    }

    public function testShowModal()
    {
        $tag = new Button('foo');

        $tag->showModal('bar');
        $this->assertEquals(
            '<a class="btn btn-default" href="#" data-toggle="modal" data-remote="false" data-target="#bar">foo</a>',
            $tag->getHTML()
        );
    }

    public function testShowAjaxModal()
    {
        $tag = new Button('foo');

        $tag->showAjaxModal('bar', 'baz');
        $this->assertEquals(
            '<a class="btn btn-default" href="baz" data-toggle="modal" data-remote="true" data-target="#bar">foo</a>',
            $tag->getHTML()
        );
    }

    public function testCloseModal()
    {
        $tag = new Button('foo');

        $tag->closeModal('bar');
        $this->assertEquals(
            '<a class="btn btn-default" href="#" data-dismiss="modal" data-target="#bar">foo</a>',
            $tag->getHTML()
        );
    }
}
