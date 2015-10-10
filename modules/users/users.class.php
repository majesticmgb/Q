<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users;

use Core\Module;

class Users extends Module
{
	public function initialize()
	{
	}

	public function getTitle()
	{
		return 'User Management';
	}

	public function isLoggedIn()
	{
		return $this->controller('User')->isLoggedIn();
	}
}