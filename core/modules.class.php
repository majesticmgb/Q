<?php

/**
 * @author TimoBakx
 */

namespace Core;
use Core\Exceptions\ModuleNotFoundException;

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
	 * @throws ModuleNotFoundException
	 */
	public function get($name)
	{
		if (isset($this->loaded[$name]))
			return $this->loaded[$name];

		$module = '\\Modules\\' . $name . '\\' . $name;

		if (!class_exists($module))
			throw new ModuleNotFoundException($name);

		$this->loaded[$name] = new $module();

		$this->loaded[$name]->initialize();

		return $this->loaded[$name];
	}
}