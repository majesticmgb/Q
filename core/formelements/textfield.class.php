<?php

/**
 * @author TimoBakx
 */

namespace Core\FormElements;

/**
 * Class TextField
 *
 * @package Core\FormElements
 */
class TextField extends FormElement
{
	protected function getType()
	{
		return 'text';
	}

	public function isValid()
	{
		if ($this->isRequired() && strlen($this->getValue()) === 0)
		{
			return false;
		}

		return true;
	}

	/**
	 * @return string
	 */
	public function getField()
	{
		$field = '<input type="'.$this->getType().'" class="form-control" name="' . $this->getName() . '" value="' . $this->getValue() . '"';
		if ($placeholder = $this->getPlaceholder())
		{
			$field .= ' placeholder="' . $placeholder . '"';
		}
		$field .= '>';

		return $field;
	}
}