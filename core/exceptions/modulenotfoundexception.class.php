<?php

/**
 * @author TimoBakx
 */

namespace Core\Exceptions;

class ModuleNotFoundException extends QException
{
	public function __construct($moduleName)
	{
		$message = 'The module "'.$moduleName.'" does not exist.';

		parent::__construct(
			'Module not found',
			$message
		);
	}
}