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
class PasswordField extends FormElement
{
	/**
	 * @return string
	 */
	public function getField()
	{
		$field = '<input type="password" class="form-control validation-string" name="' . $this->getName() . '"';
		if ($placeholder = $this->getPlaceholder())
		{
			$field .= ' placeholder="' . $placeholder . '"';
		}
		$field .= '>';

		return $field;
	}
}