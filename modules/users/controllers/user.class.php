<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Controllers;

use Core\Controller;

class User extends Controller
{
	public function initialize()
	{
		$this->registerTable('user', 'users_user');
	}

	protected function getEntityClass()
	{
		// TODO: Implement getEntityClass() method.
	}

	public function login(\Modules\Users\Entities\User $user)
	{
		$_SESSION['users:user'] = $user;
	}

	public function isLoggedIn()
	{
		return (isset($_SESSION['users:user']) && isset($_SESSION['users:user']) instanceOf \Modules\Users\Entities\User);
	}
}