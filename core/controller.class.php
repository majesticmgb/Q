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
	 * @var string[]
	 */
	private $queries = [];

	/**
	 * @return mixed
	 */
	public abstract function initialize();

	/**
	 *
	 */
	public final function __contruct()
	{
	}

	/**
	 * @param string $alias
	 * @param string $query
	 */
	protected final function addQuery($alias, $query)
	{
		$this->queries[$alias] = $query;
	}

	/**
	 * @param string $alias
	 *
	 * @return string
	 */
	protected final function getQuery($alias)
	{
		if (isset($this->queries[$alias]))
			return $this->queries[$alias];
		return '';
	}
}