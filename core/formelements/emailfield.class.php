<?php

/**
 * @author TimoBakx
 */

namespace Core\FormElements;

/**
 * Class EmailField
 *
 * @package Core\FormElements
 */
class EmailField extends TextField
{
	public function __construct($name, $title, $value, $required = false)
	{
		parent::__construct($name, $title, $value, $required);

		$this->addClass('validate-email');
	}

	protected function getType()
	{
		return 'email';
	}

	/**
	 * @return bool
	 */
	public function isValid()
	{
		if (!parent::isValid())
		{
			return false;
		}

		if (!preg_match('/^([a-z0-9_.-])+@([a-z0-9_.-]+)\.([a-z]+)$/i', $this->getValue()))
		{
			return false;
		}

		return true;
	}
}