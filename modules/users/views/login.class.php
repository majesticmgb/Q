<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Views;

use Core\Buttons\Button;
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

	public function requiresLogin()
	{
		return false;
	}

	/**
	 * @return void
	 */
	public function initialize()
	{
		// TODO: Check for already logged in user
	}

	/**
	 * Load the form elements
	 */
	protected function getFormElements()
	{
		return [
			new FormElements\EmailField('email', 'Email address', '', true),
			new FormElements\PasswordField('password', 'Password', '', true),
		];
	}

	public function getButtons()
	{
		return [
			new Button('login', $this->module()->action('login'), 'Login', Button::STYLE_PRIMARY),
		];
	}
}