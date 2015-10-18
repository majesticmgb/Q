<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users;

use Core\Menu;
use Core\Module;

class Users extends Module
{
	public function initialize()
	{
	}

	public function getTitle()
	{
		return 'User Management';
	}

	public function getAccountMenu()
	{
		$menu = new Menu($this);

		if ($this->isLoggedIn())
		{
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
}