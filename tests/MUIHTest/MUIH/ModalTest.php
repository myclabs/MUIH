<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\GenericTag;
use MyCLabs\MUIH\Modal;

/**
 * @covers MyCLabs\MUIH\Modal
 */
class ModalTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new Modal();

        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body"></div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testConstructor()
    {
        $tag = new Modal('foo', 'bar', 'baz');

        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-header">bar</div>'.
                        '<div class="modal-body">foo</div>'.
                        '<div class="modal-footer">baz</div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testGetHeader()
    {
        $tag = new Modal();

        $header = $tag->getHeader();
        $this->assertInstanceOf(GenericTag::class, $header);
        $this->assertEquals(
            '<div class="modal-header"></div>',
            $header->getHTML()
        );
    }

    public function testSetHeaderContent()
    {
        $tag = new Modal();

        $tag->setHeaderContent('foo');
        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-header">foo</div>'.
                        '<div class="modal-body"></div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testGetFooter()
    {
        $tag = new Modal();

        $footer = $tag->getFooter();
        $this->assertInstanceOf(GenericTag::class, $footer);
        $this->assertEquals(
            '<div class="modal-footer"></div>',
            $footer->getHTML()
        );
    }

    public function testSetFooterContent()
    {
        $tag = new Modal();

        $tag->setFooterContent('foo');
        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body"></div>'.
                        '<div class="modal-footer">foo</div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testGetModalDialog()
    {
        $tag = new Modal();

        $modalDialog = $tag->getModalDialog();
        $this->assertInstanceOf(GenericTag::class, $modalDialog);
        $this->assertEquals(
            '<div class="modal-dialog">'.
                '<div class="modal-content">'.
                    '<div class="modal-body">'.
                    '</div>'.
                '</div>'.
            '</div>',
            $modalDialog->getHTML()
        );
    }

    public function testGetModalContent()
    {
        $tag = new Modal();

        $modalContent = $tag->getModalContent();
        $this->assertInstanceOf(GenericTag::class, $modalContent);
        $this->assertEquals(
            '<div class="modal-content">'.
                '<div class="modal-body">'.
                '</div>'.
            '</div>',
            $modalContent->getHTML()
        );
    }

    public function testGetBody()
    {
        $tag = new Modal();

        $body = $tag->getBody();
        $this->assertInstanceOf(GenericTag::class, $body);
        $this->assertEquals(
            '<div class="modal-body"></div>',
            $body->getHTML()
        );
    }

    public function testSetContent()
    {
        $tag = new Modal();

        $tag->setContent('foo');
        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body">foo</div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testPrependContent()
    {
        $tag = new Modal();

        $tag->setContent('foo');
        $tag->prependContent('bar');
        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body">barfoo</div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testAppendContent()
    {
        $tag = new Modal();

        $tag->setContent('foo');
        $tag->appendContent('bar');
        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body">foobar</div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testAjax()
    {
        $tag = new Modal();

        $tag->ajax();
        $this->assertEquals(
            '<div class="modal modal-ajax" data-ajax="content">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body"></div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
        $tag = new Modal();

        $tag->ajax(true);
        $this->assertEquals(
            '<div class="modal modal-ajax" data-ajax="body">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body"></div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testSmall()
    {
        $tag = new Modal();

        $tag->small();
        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog modal-sm">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body"></div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testLarge()
    {
        $tag = new Modal();

        $tag->large();
        $this->assertEquals(
            '<div class="modal">'.
                '<div class="modal-dialog modal-lg">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body"></div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testSetBackdropStatic()
    {
        $tag = new Modal();

        $tag->setBackdropStatic();
        $this->assertEquals(
            '<div class="modal" data-backdrop="static">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body"></div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testRemoveBackdrop()
    {
        $tag = new Modal();

        $tag->removeBackdrop();
        $this->assertEquals(
            '<div class="modal" data-backdrop="false">'.
                '<div class="modal-dialog">'.
                    '<div class="modal-content">'.
                        '<div class="modal-body"></div>'.
                    '</div>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }
}
