<?php

namespace MyCLabs\MUIHTest\MUIH\Traits;

use MyCLabs\MUIH\Interfaces\TitleEnhancementInterface;
use MyCLabs\MUIH\Traits\TitleEnhancementTrait;
use MyCLabs\MUIH\Traits\AttributesTrait;

/**
 * @covers MyCLabs\MUIH\Traits\TitleEnhancementTrait
 */
class TitleEnhancementTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TitleEnhancementInterface
     */
    protected $titleEnhancementObject;


    /**
     * Sets up the fixture.
     *
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp()
    {
        $this->titleEnhancementObject = new TitleEnhancementTraitTestClass();
    }

    public function testTooltipDefault()
    {
        $this->titleEnhancementObject->tooltip('foo');
        $this->assertEquals(
            ' class="withTooltip" title="foo" data-placement="top" data-trigger="hover" data-html="true"',
            $this->titleEnhancementObject->getAttributesAsString()
        );
    }

    public function testTooltipFull()
    {
        $this->titleEnhancementObject->tooltip('foo', 'bottom', 'click', false);
        $this->assertEquals(
            ' class="withTooltip" title="foo" data-placement="bottom" data-trigger="click" data-html="false"',
            $this->titleEnhancementObject->getAttributesAsString()
        );
    }

    public function testTooltipNull()
    {
        $this->titleEnhancementObject->tooltip('foo', null, null, null);
        $this->assertEquals(
            ' class="withTooltip" title="foo" data-html="false"',
            $this->titleEnhancementObject->getAttributesAsString()
        );
    }

    public function testPopoverDefault()
    {
        $this->titleEnhancementObject->popover('fu', 'bar');
        $this->assertEquals(
            ' class="withPopover" title="fu" data-content="bar" data-placement="top" data-trigger="hover" data-html="true"',
            $this->titleEnhancementObject->getAttributesAsString()
        );
    }

    public function testPopoverFull()
    {
        $this->titleEnhancementObject->popover('fu', 'bar', 'bottom', 'click', false);
        $this->assertEquals(
            ' class="withPopover" title="fu" data-content="bar" data-placement="bottom" data-trigger="click" data-html="false"',
            $this->titleEnhancementObject->getAttributesAsString()
        );
    }

    public function testPopoverNull()
    {
        $this->titleEnhancementObject->popover('fu', 'bar', null, null, null);
        $this->assertEquals(
            ' class="withPopover" title="fu" data-content="bar" data-html="false"',
            $this->titleEnhancementObject->getAttributesAsString()
        );
    }
}

class TitleEnhancementTraitTestClass
{
    use AttributesTrait;
    use TitleEnhancementTrait;
}