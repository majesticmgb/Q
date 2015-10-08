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
	/**
	 * @return string
	 */
	public function getField()
	{
		$field = '<input type="text" class="form-control" id="' . $this->getName() . '"';
		if ($placeholder = $this->getPlaceholder())
		{
			$field .= ' placeholder="' . $placeholder . '"';
		}
		$field .= '>';

		return $field;
	}
}