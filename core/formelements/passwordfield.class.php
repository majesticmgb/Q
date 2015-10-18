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
class PasswordField extends TextField
{
	protected function getType()
	{
		return 'password';
	}
}