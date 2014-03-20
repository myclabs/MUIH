<?php

namespace MUIHTest\MUIH;


use MyCLabs\MUIH\ProgressBar;
use MyCLabs\MUIH\GenericTag;

/**
 * @covers MyCLabs\MUIH\ProgressBar
 */
class ProgressBarTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $tag = new ProgressBar('10');

        $this->assertEquals(
            '<div class="progress">'.
                '<div class="progress-bar" role="progress" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width="10%"">'.
                    '<span class="sr-only">'.
                        '10%'.
                    '</span>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testConstructor()
    {
        $tag = new ProgressBar('10', ProgressBar::TYPE_SUCCESS, 'foo');

        $this->assertEquals(
            '<div class="progress">'.
                '<div class="progress-bar progress-bar-success" role="progress" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width="10%"">'.
                    'foo'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testStriped()
    {
        $tag = new ProgressBar('10');

        $tag->striped();
        $this->assertEquals(
            '<div class="progress progress-striped">'.
                '<div class="progress-bar" role="progress" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width="10%"">'.
                    '<span class="sr-only">'.
                        '10%'.
                    '</span>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testActiveStriped()
    {
        $tag = new ProgressBar('10');

        $tag->activeStriped();
        $this->assertEquals(
            '<div class="progress progress-striped active">'.
                '<div class="progress-bar" role="progress" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width="10%"">'.
                    '<span class="sr-only">'.
                        '10%'.
                    '</span>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testGetBody()
    {
        $tag = new ProgressBar('10');

        $body = $tag->getBody();
        $this->assertInstanceOf(GenericTag::class, $body);
        $this->assertEquals(
            '<div class="progress-bar" role="progress" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width="10%"">'.
                '<span class="sr-only">'.
                    '10%'.
                '</span>'.
            '</div>',
            $body->getHTML()
        );
    }

    public function testSetContent()
    {
        $tag = new ProgressBar('10');

        $tag->setContent('foo');
        $this->assertEquals(
            '<div class="progress">'.
                '<div class="progress-bar" role="progress" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width="10%"">'.
                    'foo'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testPrependContent()
    {
        $tag = new ProgressBar('10');

        $tag->prependContent('foo');
        $this->assertEquals(
            '<div class="progress">'.
                '<div class="progress-bar" role="progress" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width="10%"">'.
                    'foo'.
                    '<span class="sr-only">'.
                        '10%'.
                    '</span>'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testAppendContent()
    {
        $tag = new ProgressBar('10');

        $tag->appendContent('foo');
        $this->assertEquals(
            '<div class="progress">'.
                '<div class="progress-bar" role="progress" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width="10%"">'.
                    '<span class="sr-only">'.
                        '10%'.
                    '</span>'.
                    'foo'.
                '</div>'.
            '</div>',
            $tag->getHTML()
        );
    }

    public function testGetContent()
    {
        $tag = new ProgressBar('10');

        $content = $tag->GetContent();
        $this->assertInternalType('array', $content);
        $this->assertCount(1, $content);
        $defaultContent = reset($content);
        $this->assertInstanceOf(GenericTag::class, $defaultContent);
        $this->assertEquals(
            '<span class="sr-only">'.
                '10%'.
            '</span>',
            $defaultContent->getHTML()
        );
    }
}
