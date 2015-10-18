<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Views;

use Core\FormElements;
use Core\Q;
use Core\Views\FormView;

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

	public function getMenuTitle()
	{
		return 'Login';
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
		$success = $this->module()->controller('User')->login(
			$this->getFormElement('email')->getValue(),
			$this->getFormElement('password')->getValue()
		);

		if ($success)
		{
			Q::get()->redirect(Q::get()->getHttpPath());
		}
	}

	public function requiresLogin()
	{
		return false;
	}
}