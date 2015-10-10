<?php

/**
 * @author TimoBakx
 */

namespace Core\Exceptions;

/**
 * Class ViewNotFoundException
 *
 * @package Core\Exceptions
 */
class ActionNotFoundException extends QException
{
	/**
	 * @param string $actionName
	 * @param string $moduleName
	 */
	public function __construct($actionName, $moduleName = "")
	{
		$message = 'The action "' . $actionName . '"';
		if ($moduleName !== "")
		{
			$message .= ' of module "' . $moduleName . '"';
		}
		$message .= ' does not exist.';

		parent::__construct(
			'Action not found',
			$message
		);
	}
}