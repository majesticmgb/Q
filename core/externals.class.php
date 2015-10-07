<?php

/**
 * @author TimoBakx
 */

namespace Core;

/**
 * Class Externals
 *
 * @package Core
 */
final class Externals
{
	/**
	 * @var External[]
	 */
	protected $loaded = array();

	/**
	 *
	 */
	public function construct()
	{

	}

	/**
	 * @param $name
	 *
	 * @return External|void
	 */
	public function get($name)
	{
		if (isset($this->loaded[$name]))
			return $this->loaded[$name];

		try
		{
			$external = '\\External\\' . $name;

			$this->loaded[$name] = new $external();

			$this->loaded[$name]->initialize();

			return $this->loaded[$name];
		}
		catch(\Exception $e)
		{
			die('error');
		}
	}
}