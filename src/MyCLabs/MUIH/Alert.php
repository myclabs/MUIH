<?php

namespace MyCLabs\MUIH;

/**
 * @author     valentin-mcs
 * @package    MyCLabs
 */
class Alert extends GenericTag
{
    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';

    public static $defaultDismiss = '<button type="button" data-dismiss="alert" aria-hidden="true">&times;</button>';

    protected $types = [
        self::TYPE_SUCCESS,
        self::TYPE_INFO,
        self::TYPE_WARNING,
        self::TYPE_DANGER,
    ];


    /**
     * @param string $content
     * @param string $type Const Alert::TYPE_.
     * @param bool   $withDismissButton Default is true.
     */
    public function  __construct($content=null, $type=self::TYPE_INFO, $withDismissButton=true)
    {
        $this->addClass('alert');

        if (!in_array($type, $this->types)) {
            $type = self::TYPE_INFO;
        }
        $this->addClass('alert-' . $type);

        parent::__construct('div', $content);

        if ($withDismissButton) {
            $this->addDefaultDismissButton();
        }
    }

    /**
     * @return $this
     */
    public function addDefaultDismissButton()
    {
        $this->prependContent(self::$defaultDismiss);

        return $this;
    }

    /**
     * @param GenericTag|string $dismissButton
     * @return $this
     */
    public function addDismissButton($dismissButton)
    {
        $this->prependContent($dismissButton);

        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function addTitle($title)
    {
        $this->prependContent(new GenericTag('strong', $title));

        return $this;
    }
}
