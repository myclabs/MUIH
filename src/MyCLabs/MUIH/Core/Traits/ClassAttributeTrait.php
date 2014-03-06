<?php

namespace MyCLabs\MUIH\Core\Traits;

/**
 * @author     valentin-mcs
 * @package    MyCLabs\MUIH
 * @subpackage Core
 */
trait ClassAttributeTrait
{
    use AttributesTrait;

    /**
     * @param $className
     * @return $this
     */
    public function addClass($className)
    {
        if (!isset($this->attributes['class'])) {
            $this->attributes['class'] = '';
        }
        if (!$this->hasClass($className)) {
            if (!empty($this->attributes['class'])) {
                $this->attributes['class'] .= ' ';
            }

            $this->attributes['class'] .= $className;
        }

        return $this;
    }

    /**
     * @param $className
     * @return bool
     */
    public function hasClass($className)
    {
        return preg_match('#' . $className . '(\s|$)#', $className);
    }

    /**
     * @param $className
     * @return bool
     */
    public function containsClass($className)
    {
        return preg_match('#' . $className . '.*(\s|$)#', $className);
    }

    /**
     * @param $className
     * @return $this
     */
    public function removeClass($className)
    {
        $this->attributes['class'] = trim(preg_replace(
            '#' . $className . '(\s|$)#',
            '',
            $this->attributes['class']
        ));

        return $this;
    }
}
