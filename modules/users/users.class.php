<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users;

use Core\Menu;
use Core\Module;

class Users extends Module
{
	public function getTitle()
	{
		return 'User Management';
	}

	public function initialize()
	{
	}

	public function getAccountMenu()
	{
		$menu = new Menu($this, 'Account');

		if ($this->isLoggedIn())
		{
			$menu->addView($this->view('Account'));
			$menu->addView($this->view('Logout'));
		}
		else
		{
			$menu->addView($this->view('Login'));
		}

		return $menu->getHtml();
	}

	public function isLoggedIn()
	{
		return $this->controller('User')->isLoggedIn();
	}

	public function getLoggedInUserID()
	{
		return $this->controller('User')->getLoggedInUserID();
	}
}