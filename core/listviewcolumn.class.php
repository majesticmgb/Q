<?php

/**
 * @author TimoBakx
 */

namespace Core;

/**
 * Class ListViewColumn
 *
 * @package Core
 */
class ListViewColumn
{
	/**
	 * @var string
	 */
	private $title;
	/**
	 * @var string
	 */
	private $functionName;
	/**
	 * @var string
	 */
	private $columnName;

	/**
	 * ListViewColumn constructor.
	 *
	 * @param string $title
	 * @param string $functionName
	 * @param string $columnName
	 */
	public function __construct($title, $functionName, $columnName = null)
	{
		$this->title        = $title;
		$this->functionName = $functionName;
		$this->columnName   = $columnName;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getFunctionName()
	{
		return $this->functionName;
	}

	/**
	 * @param string $functionName
	 */
	public function setFunctionName($functionName)
	{
		$this->functionName = $functionName;
	}

	/**
	 * @return string
	 */
	public function getColumnName()
	{
		return $this->columnName;
	}

	/**
	 * @param string $columnName
	 */
	public function setColumnName($columnName)
	{
		$this->columnName = $columnName;
	}
}