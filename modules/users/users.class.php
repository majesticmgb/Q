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
		return 'Users';
	}

	public function getName()
	{
		return 'users';
	}

	public function isLoggedIn()
	{
		return $this->controller('User')->isLoggedIn();
	}
}