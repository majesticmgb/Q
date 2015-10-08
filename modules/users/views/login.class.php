<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Views;

use Core\FormElements;
use Core\Views\AjaxFormView;

/**
 * Class Login
 *
 * @package Modules\Users\Views
 */
class Login extends AjaxFormView
{
	/**
	 *
	 */
	public function initialize()
	{
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

	/**
	 * @return \Core\FormElements\FormElement[]
	 */
	protected function getFormFields()
	{
		return array(
			'email'    => new FormElements\EmailField('email', 'Email address', ''),
			'password' => new FormElements\PasswordField('password', 'Password', ''),
		);
	}

	protected function getSubmitAjaxName()
	{
		return 'login';
	}

	protected function getAction()
	{
		return \Core\Q::get()->getHttpPath();
	}

	protected function getCancelUrl()
	{
		return '';
	}
}