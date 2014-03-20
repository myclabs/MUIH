<?php

namespace MyCLabs\MUIHTest\MUIH\Traits;

use MyCLabs\MUIH\Interfaces\AttributesInterface;
use MyCLabs\MUIH\Traits\AttributesTrait;

/**
 * @covers MyCLabs\MUIH\Traits\AttributesTrait
 */
class AttributesTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AttributesInterface
     */
    protected $attributesObject;


    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->attributesObject = $this->getObjectForTrait(AttributesTrait::class);
    }

    public function testSetUnsetAttribute()
    {
        $this->assertFalse($this->attributesObject->hasAttribute('foo'));
        $this->assertNull($this->attributesObject->getAttribute('foo'));
        $this->assertFalse($this->attributesObject->hasAttribute('fu'));
        $this->assertNull($this->attributesObject->getAttribute('fu'));

        $this->attributesObject->setBooleanAttribute('foo');

        $this->assertTrue($this->attributesObject->hasAttribute('foo'));
        $this->assertNull($this->attributesObject->getAttribute('foo'));
        $this->assertFalse($this->attributesObject->hasAttribute('fu'));
        $this->assertNull($this->attributesObject->getAttribute('fu'));

        $this->attributesObject->setAttribute('fu', 'bar');

        $this->assertTrue($this->attributesObject->hasAttribute('foo'));
        $this->assertNull($this->attributesObject->getAttribute('foo'));
        $this->assertTrue($this->attributesObject->hasAttribute('fu'));
        $this->assertEquals('bar', $this->attributesObject->getAttribute('fu'));

        $this->attributesObject->setAttribute('fu', 'baz');

        $this->assertTrue($this->attributesObject->hasAttribute('foo'));
        $this->assertNull($this->attributesObject->getAttribute('foo'));
        $this->assertTrue($this->attributesObject->hasAttribute('fu'));
        $this->assertEquals('baz', $this->attributesObject->getAttribute('fu'));

        $this->attributesObject->unsetAttribute('foo');

        $this->assertFalse($this->attributesObject->hasAttribute('foo'));
        $this->assertNull($this->attributesObject->getAttribute('foo'));
        $this->assertTrue($this->attributesObject->hasAttribute('fu'));
        $this->assertEquals('baz', $this->attributesObject->getAttribute('fu'));

        $this->attributesObject->unsetAttribute('fu');

        $this->assertFalse($this->attributesObject->hasAttribute('foo'));
        $this->assertNull($this->attributesObject->getAttribute('foo'));
        $this->assertFalse($this->attributesObject->hasAttribute('fu'));
        $this->assertNull($this->attributesObject->getAttribute('fu'));
    }

    public function testGetAttributesAsString()
    {
        $this->attributesObject->setBooleanAttribute('foo');
        $this->attributesObject->setAttribute('fu', 'bar');

        $this->assertEquals(
            ' foo fu="bar"',
            $this->attributesObject->getAttributesAsString()
        );
    }

    public function testAddRemoveClass()
    {
        $this->assertFalse($this->attributesObject->hasAttribute('class'));
        $this->assertNull($this->attributesObject->getAttribute('class'));

        $this->attributesObject->addClass('foo');

        $this->assertTrue($this->attributesObject->hasAttribute('class'));
        $this->assertEquals('foo', $this->attributesObject->getAttribute('class'));

        $this->attributesObject->addClass('foo');
        $this->attributesObject->addClass('bar');

        $this->assertTrue($this->attributesObject->hasAttribute('class'));
        $this->assertEquals('foo bar', $this->attributesObject->getAttribute('class'));

        $this->attributesObject->addClass('baz');

        $this->assertTrue($this->attributesObject->hasAttribute('class'));
        $this->assertEquals('foo bar baz', $this->attributesObject->getAttribute('class'));

        $this->attributesObject->removeClass('bar');

        $this->assertTrue($this->attributesObject->hasAttribute('class'));
        $this->assertEquals('foo baz', $this->attributesObject->getAttribute('class'));

        $this->attributesObject->removeClass('foo');

        $this->assertTrue($this->attributesObject->hasAttribute('class'));
        $this->assertEquals('baz', $this->attributesObject->getAttribute('class'));

        $this->attributesObject->removeClass('baz');

        $this->assertFalse($this->attributesObject->hasAttribute('class'));
        $this->assertNull($this->attributesObject->getAttribute('class'));
    }

    public function testContainsClass()
    {
        $this->assertFalse($this->attributesObject->hasAttribute('class'));
        $this->assertNull($this->attributesObject->getAttribute('class'));
        $this->assertFalse($this->attributesObject->hasClass('foo'));
        $this->assertFalse($this->attributesObject->containsClass('foo'));

        $this->attributesObject->addClass('foo-bar');

        $this->assertTrue($this->attributesObject->hasAttribute('class'));
        $this->assertEquals('foo-bar', $this->attributesObject->getAttribute('class'));
        $this->assertFalse($this->attributesObject->hasClass('foo'));
        $this->assertTrue($this->attributesObject->containsClass('foo'));
    }

    public function testGetAttributesAsStringWithClass()
    {
        $this->attributesObject->setBooleanAttribute('foo');
        $this->attributesObject->setAttribute('fu', 'bar');
        $this->attributesObject->addClass('baz');
        $this->attributesObject->addClass('bax');

        $this->assertEquals(
            ' foo fu="bar" class="baz bax"',
            $this->attributesObject->getAttributesAsString()
        );
    }
}
