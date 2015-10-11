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
class EmailField extends FormElement
{
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

	/**
	 * @return string
	 */
	public function getField()
	{
		$field = '<input type="email" class="form-control validation-email" name="' . $this->getName() . '"';
		if ($placeholder = $this->getPlaceholder())
		{
			$field .= ' placeholder="' . $placeholder . '"';
		}
		$field .= ' novalidate>';

		return $field;
	}
}