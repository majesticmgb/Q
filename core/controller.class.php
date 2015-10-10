<?php

/**
 * @author TimoBakx
 */

namespace Core;

/**
 * Class Controller
 *
 * @package Core
 */
abstract class Controller
{
	/**
	 * @var string[]s
	 */
	private $tables = array();

	/**
	 * @return mixed
	 */
	public abstract function initialize();

	/**
	 * @return mixed
	 */
	protected abstract function getEntityClass();

	/**
	 *
	 */
	public final function __contruct()
	{
	}

	/**
	 * @param $alias
	 *
	 * @return string
	 */
	protected final function table($alias)
	{
		if (isset($this->tables[$alias]))
		{
			return '`'.$this->tables[$alias].'`';
		}
		// TODO: Throw error
		return '';
	}

	/**
	 * Register a table name under an alias
	 *
	 * @param $alias
	 * @param $table
	 */
	protected final function registerTable($alias, $table)
	{
		$this->tables[$alias] = $table;
	}

	/**
	 * @param $selector
	 *
	 * @return array
	 */
	public final function get($selector)
	{
		$s = Q::get()->pdo()->query('SELECT * FROM ' . $this->table('') . ' WHERE ' . $selector);

		return $s->fetchAll(\PDO::FETCH_CLASS, $this->getEntityClass());
	}
}