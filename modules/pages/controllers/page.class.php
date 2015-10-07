<?php

/**
 * @author TimoBakx
 */

namespace Modules\Pages\Controllers;

use Core\Controller;

class Page extends Controller
{
	public function initialize()
	{
	}

	protected function getTable()
	{
		return 'pages_page';
	}

	protected function getEntityClass()
	{
		return '\\Modules\\Pages\\Entities\\Page';
	}
}