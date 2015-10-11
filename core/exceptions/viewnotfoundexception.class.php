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
class ViewNotFoundException extends QException
{
	/**
	 * @param string $viewName
	 * @param string $moduleName
	 */
	public function __construct($viewName, $moduleName = "")
	{
		$message = 'The view "' . $viewName . '"';
		if ($moduleName !== "")
		{
			$message .= ' of module "' . $moduleName . '"';
		}
		$message .= ' does not exist.';

		parent::__construct(
			'View not found',
			$message
		);
	}
}