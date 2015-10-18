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

	protected final function addQuery($alias, $query)
	{
		$this->queries[$alias] = $query;
	}

	protected final function getQuery($alias)
	{
		if (isset($this->queries[$alias]))
			return $this->queries[$alias];
		return '';
	}
}