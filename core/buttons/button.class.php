<?php

/**
 * @author TimoBakx
 */

namespace Core\Buttons;

use Core\Interfaces\Targettable;

class Button
{
	const STYLE_DEFAULT = 'btn-default';
	const STYLE_PRIMARY = 'btn-primary';
	const STYLE_SUCCESS = 'btn-success';
	const STYLE_INFO    = 'btn-info';
	const STYLE_WARNING = 'btn-warning';
	const STYLE_DANGER  = 'btn-danger';
	const STYLE_LINK    = 'btn-link';
	//
	/**
	 * @var int
	 */
	private $id;
	/**
	 * @var Targettable
	 */
	private $target;
	/**
	 * @var string
	 */
	private $label;

	/**
	 * @var int
	 */
	private $style = self::STYLE_DEFAULT;

	/**
	 * Button constructor.
	 *
	 * @param int         $id
	 * @param Targettable $target
	 * @param string      $label
	 * @param string      $style
	 */
	public function __construct($id, Targettable $target, $label, $style = self::STYLE_DEFAULT)
	{
		$this->id     = (int)$id;
		$this->target = $target;
		$this->label  = (string)$label;
		$this->style  = (string)$style;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return Targettable
	 */
	public function getTarget()
	{
		return $this->target;
	}

	/**
	 * @return string
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * @return int
	 */
	public function getStyle()
	{
		return $this->style;
	}

	/**
	 * @return string
	 */
	public function getHtml()
	{
		return '<a href="' . $this->getTarget()->getUrl() . '" class="btn ' . $this->getStyle() . '">'.$this->getLabel().'</a>';
	}
}