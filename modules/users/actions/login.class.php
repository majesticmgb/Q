<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Actions;

use Core\Q;
use Core\Actions\Action;

class Login extends Action
{
	public function execute()
	{
		$username = Q::get()->params()->get('username');
		$password = Q::get()->params()->get('password');

		$this->setResults(array('username' => $username, 'password' => md5($password)));
		$this->setSuccessful(true);
	}
}