<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Views;

use Core\ListViewColumn;
use Core\Views\ListView;

/**
 * Class Index
 *
 * @package Modules\Users\Views
 */
class Index extends ListView
{
	/**
	 * @return mixed
	 * @throws \Core\Exceptions\ControllerNotFoundException
	 */
	protected function getList()
	{
		return $this->module()->controller('User')->getList($this->getPage(), $this->getOrderColumn(), $this->getOrderDirection());
	}

	/**
	 * @return string
	 */
	protected function getPanelTitle()
	{
		return 'Users';
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return 'User management';
	}

	/**
	 * @return string[]
	 */
	public function getBreadcrumbs()
	{
		return array(
			$this->getPanelTitle() => $this->getUrl(),
		);
	}

	/**
	 * @return ListViewColumn[]
	 */
	protected function getColumns()
	{
		return [
			new ListViewColumn('Name', 'getName', 'lastName'),
			new ListViewColumn('Email address', 'getEmail', 'email'),
		];
	}

	/**
	 * @return string
	 */
	protected function getDefaultOrderColumn()
	{
		return 'lastName';
	}

	/**
	 * @return string
	 */
	protected function getOnRowClick()
	{
		$url = $this->module()->view('edit')->getUrl();

		return 'function(row, e) {
			document.location.href = "'.$url.'?id=" + row.getID();
		}';
	}
}