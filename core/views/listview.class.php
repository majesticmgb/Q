<?php

/**
 * @author TimoBakx
 */

namespace Core\Views;

use Core\Exceptions\ViewNotFoundException;
use Core\Q;

abstract class ListView extends PanelView
{
	private $orderColumn;
	private $orderDirection;
	private $page;

	public final function initialize()
	{
		$this->setOrderColumn(Q::get()->params()->get('oc', $this->getDefaultOrderColumn()));
		$this->setOrderDirection(Q::get()->params()->get('od', $this->getDefaultOrderDirection()));
		$this->setPage(Q::get()->params()->get('page', 1));
	}

	protected final function getPanelBody()
	{
		$columns = $this->getColumns();
		$rows = $this->getList();

		$columnsHtml = '';

		foreach ($columns as $column)
		{
			$columnsHtml .= '<th>'.$column->getTitle().'</th>';
		}

		$rowsHtml = '';

		foreach ($rows as $row)
		{
			$rowsHtml .= '<tr data-id="'.$row->getID().'">';
			foreach ($columns as $column)
			{
				$rowsHtml .= '<td>'.$row->{$column->getFunctionName()}().'</td>';
			}
			$rowsHtml .= '</tr>';
		}

		$html = '<div class="list-wrapper clickable">';
		$html .= '<table class="table table-striped">';
		$html .= '<thead><tr>'.$columnsHtml.'</tr></thead>';
		$html .= '<tbody>'.$rowsHtml.'</tbody>';
		$html .= '<tfoot><tr><td colspan="'.count($columns).'">-MP-</td></tr></tfoot>';
		$html .= '</table></div>';

		return $html;
	}

	public function getJavascriptFiles()
	{
		$files = parent::getJavascriptFiles();

		$files[] = Q::get()->getHttpPath().'js/listview.js';

		return $files;
	}

	public function getJavascript()
	{
		$js = parent::getJavascript();

		$onRowClick = $this->getOnRowClick();
		if ($onRowClick)
			$js .= 'ListView.setOnRowClick('.$onRowClick.');';

		return $js;
	}

	/**
	 * @return mixed
	 */
	public function getOrderColumn()
	{
		return $this->orderColumn;
	}

	/**
	 * @param mixed $orderColumn
	 */
	public function setOrderColumn($orderColumn)
	{
		$this->orderColumn = $orderColumn;
	}

	/**
	 * @return mixed
	 */
	public function getOrderDirection()
	{
		return $this->orderDirection;
	}

	/**
	 * @param mixed $orderDirection
	 */
	public function setOrderDirection($orderDirection)
	{
		$this->orderDirection = $orderDirection;
	}

	/**
	 * @return mixed
	 */
	public function getPage()
	{
		return $this->page;
	}

	/**
	 * @param mixed $page
	 */
	public function setPage($page)
	{
		$this->page = $page;
	}

	protected abstract function getDefaultOrderColumn();
	protected function getDefaultOrderDirection()
	{
		return 'ASC';
	}

	/**
	 * @return \Core\Entity[]
	 */
	protected abstract function getList();

	/**
	 * @return \Core\ListViewColumn[]
	 */
	protected abstract function getColumns();

	/**
	 * @return string
	 */
	protected function getOnRowClick()
	{
		return '';
	}
}