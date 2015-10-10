<?php

/**
 * @author TimoBakx
 */

namespace Core\Exceptions;

class ViewNotFoundException extends QException
{
	public function __construct($viewName, $moduleName = null)
	{
		$message = 'Thew view "'.$viewName.'"';
		if ($moduleName !== null)
			$message .= ' of module "'.$moduleName.'"';
		$message .= ' does not exist.';

		parent::__construct(
			'View not found',
			$message
		);
	}
}