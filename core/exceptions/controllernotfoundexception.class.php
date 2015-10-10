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
class ControllerNotFoundException extends QException
{
	/**
	 * @param string $controllerName
	 * @param string $moduleName
	 */
	public function __construct($controllerName, $moduleName = "")
	{
		$message = 'The controller "' . $controllerName . '"';
		if ($moduleName !== "")
		{
			$message .= ' of module "' . $moduleName . '"';
		}
		$message .= ' does not exist.';

		parent::__construct(
			'Controller not found',
			$message
		);
	}
}