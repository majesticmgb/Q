<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Actions;

use Core\Libs\Validator;
use Core\Q;
use Core\Actions\Action;
use Core\ValidationError;

class Login extends Action
{
	public function execute()
	{
		// Get parameters
		$email    = Q::get()->params()->get('email');
		$password = Q::get()->params()->get('password');

		// Validate
		if (!Validator::isEmail($email))
		{
			$this->addValidationError(new ValidationError('email', 'You must enter a valid email address'));
		}

		if (!Validator::isString($password))
		{
			$this->addValidationError(new ValidationError('password', 'You must enter a password'));
		}

		if (!$this->hasValidationErrors())
		{
			$this->setResults(array('email' => $email, 'password' => md5($password)));
			$this->setSuccessful(true);
		}
	}
}