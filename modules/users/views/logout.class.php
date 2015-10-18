<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Views;

use Core\Q;

class Logout extends \Core\Views\View
{
	/**
	 * @return void
	 */
	protected function initialize()
	{
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return 'Logout';
	}

	/**
	 * @return string
	 */
	public function getBody()
	{
		$this->module()->controller('User')->logout();

		Q::get()->redirect(Q::get()->getHttpPath());

		return '';
	}

	/**
	 * @return string[]
	 */
	public function getBreadcrumbs()
	{
		return [];
	}
}