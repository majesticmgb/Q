<?php

namespace Modules\Users\Actions;

use Core\Actions\Action;
use Core\Q;

class Login extends Action
{
	public function execute()
	{
		$this->setSuccessful($this->module()->controller('User')->login(
			Q::get()->params()->get('email'),
			Q::get()->params()->get('password')
		));
	}

	public function onSuccess()
	{
		// Redirect to home view.
		Q::get()->redirect(Q::get()->getHttpPath());
	}

	public function onFail()
	{
		// @todo: set validation errors?

		// Redirect back to login view.
		Q::get()->redirect($this->module()->view('Login')->getUrl());
	}
}