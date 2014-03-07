<?php

namespace MyCLabs\MUIH\Core;

use MyCLabs\MUIH\Core\Traits\AttributesTrait;

/**
 * @author     valentin-mcs
 * @package    MyCLabs
 * @subpackage MUIH
 */
class Alert extends GenericTag
{
    use AttributesTrait;

    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';

    protected $types = [
        self::TYPE_SUCCESS,
        self::TYPE_INFO,
        self::TYPE_WARNING,
        self::TYPE_DANGER,
    ];

    /**
     * @var GenericTag|string
     */
    protected $dismissButton;


    /**
     * @param string $content
     * @param string $type Const Alert::TYPE_.
     * @param bool   $withDismissButton Default is true.
     */
    public function  __construct($content, $type=self::TYPE_INFO, $withDismissButton=true)
    {
        $this->addClass('alert');

        if (!in_array($type, $this->types)) {
            $type = self::TYPE_INFO;
        }
        $this->addClass('alert-' . $type);

        if ($withDismissButton) {
            $this->setDefaultDismissButton();
        }

        parent::__construct('div', false, $content);
    }

    /**
     * @return bool
     */
    public function getWithDismissButton()
    {
        return !empty($this->dismissButton);
    }

    /**
     * @return Alert
     */
    public function setDefaultDismissButton()
    {
        $this->addClass('alert-dismissable');

        $this->dismissButton = new GenericTag('button', '&times;');
        $this->dismissButton->setAttribute('type', 'button');
        $this->dismissButton->setAttribute('data-dismiss', 'alert');
        $this->dismissButton->setAttribute('aria-hidden', 'true');

        return $this;
    }

    /**
     * @param GenericTag|string $dismissButton
     * @return Alert
     */
    public function setDismissButton($dismissButton)
    {
        if (!empty($dismissButton)) {
            $this->addClass('alert-dismissable');
        } else {
            $this->removeClass('alert-dismissable');
        }

        $this->dismissButton = $dismissButton;

        return $this;
    }

    /**
     * @return GenericTag|string
     */
    public function getDismissButton()
    {
        return $this->dismissButton;
    }

    /**
     * {@inheritdoc}
     */
    public function getContentAsString()
    {
        $content = '';

        if ($this->getWithDismissButton()) {
            $content .= $this->dismissButton;
        }

        $content .= $this->content;

        return $content;
    }

}
