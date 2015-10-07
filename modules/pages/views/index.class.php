<?php

/**
 * @author TimoBakx
 */

namespace Modules\Pages\Views;

use Core\View;
use Modules\Pages;

class Index extends Page
{
	/**
	 * @var Page
	 */
	protected $page;

	public function initialize()
	{
		$this->page = $this->module()->controller('Page')->get('`id` = 1');
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