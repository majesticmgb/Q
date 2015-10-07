<?php

/**
 * @author TimoBakx
 */

namespace Modules\Pages\Views;

use Core\View;
use Modules\Pages;

class Page extends View
{
	/**
	 * @var \Modules\Pages\Entities\Page
	 */
	private $page;

	/**
	 * @return Pages\Entities\Page
	 */
	public function getPage()
	{
		return $this->page;
	}

	/**
	 * @param Pages\Entities\Page $page
	 */
	public function setPage(Pages\Entities\Page $page)
	{
		$this->page = $page;
	}

	public function initialize()
	{
		$this->setPage($this->module()->controller('Page')->get('`id` = 1'));
	}

	public function getTitle()
	{
		return $this->page->getTitle();
	}

	public function getBody()
	{
		return $this->page->getBody();
	}
}