<?php

/**
 * @author TimoBakx
 */

namespace Modules\Portal;

use Core\Menu;

class Portal extends \Core\Module
{
	/**
	 * @return void
	 */
	public function initialize()
	{
		// TODO: Implement initialize() method.
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return 'Portal';
	}

	public function getMenu()
	{
		$menu = new Menu($this, 'Home');
		$menu->addView($this->view('Index'));

		return $menu->getHtml();
	}
}