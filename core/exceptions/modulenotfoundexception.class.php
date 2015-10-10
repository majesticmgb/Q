<?php

/**
 * @author TimoBakx
 */

namespace Core\Exceptions;

/**
 * Class ModuleNotFoundException
 *
 * @package Core\Exceptions
 */
class ModuleNotFoundException extends QException
{
	/**
	 * @param string $moduleName
	 */
	public function __construct($moduleName)
	{
		$message = 'The module "' . $moduleName . '" does not exist.';

		parent::__construct(
			'Module not found',
			$message
		);
	}
}