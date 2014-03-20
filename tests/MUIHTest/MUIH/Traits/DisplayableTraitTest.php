<?php

namespace MyCLabs\MUIHTest\MUIH\Traits;

use MyCLabs\MUIH\Interfaces\DisplayableInterface;
use MyCLabs\MUIH\Traits\DisplayableTrait;

/**
 * @covers MyCLabs\MUIH\Traits\DisplayableTrait
 */
class DisplayableTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DisplayableInterface
     */
    protected $displayableObject;


    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->displayableObject = $this->getObjectForTrait(DisplayableTrait::class);
    }

    public function testGetSript()
    {
        $script = $this->displayableObject->getScript();

        $this->assertInternalType('string', $script);
        $this->assertEquals('', $script);
    }

    public function testGetHTML()
    {
        $html = $this->displayableObject->getHTML();

        $this->assertInternalType('string', $html);
        $this->assertEquals('', $html);
    }

    public function testToString()
    {
        $toString = (string) $this->displayableObject;

        $this->assertInternalType('string', $toString);
        $this->assertEquals('', $toString);
    }

    public function testRender()
    {
        $render = $this->displayableObject->render();

        $this->assertInternalType('string', $render);
        $this->assertEquals('', $render);
    }
}
