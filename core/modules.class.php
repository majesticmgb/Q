<?php

/**
 * @author TimoBakx
 */

namespace Core;

/**
 * Class Modules
 *
 * @package Core
 */
final class Modules
{
	/**
	 * @var Module[]
	 */
	protected $loaded = array();

	/**
	 *
	 */
	public function __construct()
	{

	}

	/**
	 * @param $name
	 *
	 * @return Module
	 */
	public function get($name)
	{
		if (isset($this->loaded[$name]))
			return $this->loaded[$name];

		try
		{
			$module = '\\Modules\\' . $name . '\\' . $name;

			$this->loaded[$name] = new $module();

			$this->loaded[$name]->initialize();

			return $this->loaded[$name];
		}
		catch(\Exception $e)
		{
			die('error');
		}
	}
}