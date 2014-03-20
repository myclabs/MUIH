<?php

namespace MyCLabs\MUIHTest\MUIH\Traits;

use MyCLabs\MUIH\Interfaces\ContentInterface;
use MyCLabs\MUIH\Traits\ContentTrait;

/**
 * @covers MyCLabs\MUIH\Traits\ContentTrait
 */
class ContentTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ContentInterface
     */
    protected $contentObject;


    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->contentObject = $this->getObjectForTrait(ContentTrait::class);
    }

    public function testSetContent()
    {
        $this->assertEquals([], $this->contentObject->getContent());

        $this->contentObject->setContent('foo');
        $this->assertEquals(['foo'], $this->contentObject->getContent());

        $this->contentObject->setContent(null);
        $this->assertEquals([], $this->contentObject->getContent());

        $this->contentObject->setContent('');
        $this->assertEquals([], $this->contentObject->getContent());

        $this->contentObject->setContent(' ');
        $this->assertEquals([' '], $this->contentObject->getContent());

        $this->contentObject->setContent('bar');
        $this->assertEquals(['bar'], $this->contentObject->getContent());
    }

    public function testPrependAppendContent()
    {
        $this->assertEquals([], $this->contentObject->getContent());

        $this->contentObject->setContent('foo');
        $this->assertEquals(['foo'], $this->contentObject->getContent());

        $this->contentObject->appendContent('bar');
        $this->assertEquals(['foo', 'bar'], $this->contentObject->getContent());

        $this->contentObject->appendContent(null);
        $this->assertEquals(['foo', 'bar'], $this->contentObject->getContent());

        $this->contentObject->prependContent('');
        $this->assertEquals(['foo', 'bar'], $this->contentObject->getContent());

        $this->contentObject->prependContent(' ');
        $this->assertEquals([' ', 'foo', 'bar'], $this->contentObject->getContent());

        $this->contentObject->prependContent('baz');
        $this->assertEquals(['baz', ' ', 'foo', 'bar'], $this->contentObject->getContent());
    }

    public function testGetContentAsString()
    {
        $this->assertEquals([], $this->contentObject->getContent());
        $this->assertEquals('', $this->contentObject->getContentAsString());

        $this->contentObject->setContent('foo');
        $this->assertEquals('foo', $this->contentObject->getContentAsString());

        $this->contentObject->appendContent('bar');
        $this->assertEquals('foobar', $this->contentObject->getContentAsString());

        $this->contentObject->prependContent('baz');
        $this->assertEquals('bazfoobar', $this->contentObject->getContentAsString());
    }
}
