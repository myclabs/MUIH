<?php

namespace MyCLabs\MUIH\ZendViewHelper;

use MyCLabs\MUIH\Core\Well as CoreWell;
use MyCLabs\MUIH\ZendViewHelper\Traits\AttributesTrait;
use MyCLabs\MUIH\ZendViewHelper\Traits\ClassAttributeTrait;
use MyCLabs\MUIH\ZendViewHelper\Traits\TitleEnhancementTrait;

/**
 * @author valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage ZendViewHelper
 */
class Well
{
    use AttributesTrait;
    use ClassAttributeTrait;
    use TitleEnhancementTrait;
    
    /**
     * @var CoreWell
     */
    protected $uiElement = null;


    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->uiElement;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function well($content)
    {
        $this->uiElement = new CoreWell($content);

        return $this;
    }

}
