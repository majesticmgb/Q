<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Controllers;

use Core\Controller;
use Core\Q;

/**
 * Class User
 *
 * @package Modules\Users\Controllers
 */
class User extends Controller
{
	const CLASS_USER = '\Modules\Users\Entities\User';
	const QUERY_GET = 'SELECT * FROM `users_user` WHERE `id` = ? LIMIT 0, 1';
	const QUERY_LOGIN = 'SELECT * FROM `users_user` WHERE `email` = ? AND `password` = ? LIMIT 0, 1';

	/**
	 *
	 */
	public function initialize()
	{
	}

	public function get($id)
	{
		return Q::get()->db()->select(self::QUERY_GET, self::CLASS_USER, $id);
	}

	public function save(\Modules\Users\Entities\User $user)
	{
		return Q::get()->db()->store('users_user', $user);
	}

	/**
	 * @param string $email
	 * @param string $password
	 *
	 * @return bool
	 */
	public function login($email, $password)
	{
		/** @var \Modules\Users\Entities\User $user */
		$user = Q::get()->db()->select(self::QUERY_LOGIN, self::CLASS_USER, $email, $password);

		if ($user->getId())
		{
			$_SESSION['users:user'] = $user;
			return true;
		}

		return false;
	}

	public function logout()
	{
		unset($_SESSION['users:user']);
	}

	/**
	 * @return bool
	 */
	public function isLoggedIn()
	{
		return (isset($_SESSION['users:user']) && $_SESSION['users:user'] instanceOf \Modules\Users\Entities\User);
	}

	public function getLoggedInUserID()
	{
		if ($this->isLoggedIn())
			return $_SESSION['users:user']->getID();
		return 0;
	}
}