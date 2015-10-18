<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Views;

use Core\FormElements;
use Core\Q;
use Core\Views\FormView;
use Modules\Users\Entities\User;

/**
 * Class Login
 *
 * @package Modules\Users\Views
 */
class Login extends FormView
{
	/**
	 *
	 */
	protected function initializeFormElements()
	{
		$this->addFormElement(new FormElements\EmailField('email', 'Email address', '', true));
		$this->addFormElement(new FormElements\PasswordField('password', 'Password', '', true));

	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return 'Welcome to Q';
	}

	/**
	 * @return string
	 */
	protected function getPanelTitle()
	{
		return 'Login';
	}

	protected function getCancelUrl()
	{
		return '';
	}

	/**
	 * @return string[]
	 */
	public function getBreadcrumbs()
	{
		return array(
			$this->module()->getTitle() => $this->module()->getUrl(),
			$this->getPanelTitle()      => $this->getUrl(),
		);
	}

	protected function handleSubmit()
	{
		var_dump($this->getFormElements());

		$user = new User();


		$this->module()->controller('User')->login($user);
	}
}