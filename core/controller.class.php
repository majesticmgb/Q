<?php

/**
 * @author TimoBakx
 */

namespace Core;

abstract class Controller
{
	/**
	 * @var string[]s
	 */
	private $tables = array();

	public abstract function initialize();

	protected abstract function getEntityClass();

	public final function __contruct()
	{
	}

	protected final function table($alias)
	{
		if (isset($this->tables[$alias]))
		{
			return $this->tables[$alias];
		}
		// TODO: Throw error
	}

	protected final function registerTable($alias, $table)
	{
		$this->tables[$alias] = $table;
	}

	public final function get($selector)
	{
		$s = Q::get()->pdo()->query('SELECT * FROM `' . $this->getTable() . '` WHERE ' . $selector);

		return $s->fetchAll(\PDO::FETCH_CLASS, $this->getEntityClass());
	}
}