<?php

/**
 * Q
 *
 * @author TimoBakx
 */

namespace Core;
use Core\Interfaces\Targettable;

/**
 * Class Q
 *
 * @package Core
 */
final class Q
{
	/**
	 *
	 */
	const DEFAULT_MODULE = 'Portal';
	/**
	 *
	 */
	const DEFAULT_VIEW = 'Index';
	/**
	 * @var Q
	 */
	protected static $q;
	/**
	 * @var Params
	 */
	protected $params;
	/**
	 * @var Externals
	 */
	protected $externals;
	/**
	 * @var Modules
	 */
	protected $modules;
	/**
	 * @var \Core\DB
	 */
	protected $db;

	/**
	 * @return string
	 */
	public function getHttpPath()
	{
		return 'http://' . $_SERVER['HTTP_HOST'] . '/';
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $_SERVER['REQUEST_URI'];
	}

	/**
	 * @return string
	 */
	public function getServerPath()
	{
		return $_SERVER['DOCUMENT_ROOT'] . '/';
	}

	/**
	 * Get the Q instance
	 *
	 * @return Q
	 */
	public static function &get()
	{
		if (!self::$q)
		{
			self::$q = new self();
		}

		return self::$q;
	}

	/**
	 * Constuctor
	 */
	protected function __construct()
	{
		// Set defaults
		date_default_timezone_set('Europe/Amsterdam');

		// Initialize autoloader
		spl_autoload_register(array($this, 'loadClass'));

		// Initialize database
		$this->db = new DB('localhost', 'q', 'TimoBakx', 'zLSbx4DycxeVRnMj');

		// Initialize sessions
		session_start();

		// Initialize parameters
		$this->params = new Params();

		// Initialize externals
		$this->externals = new Externals();

		// Load modules
		$this->modules = new Modules();
	}

	/**
	 * @param $className
	 */
	protected function loadClass($className)
	{
		// Get namespace & class name
		$structure = explode('\\', $className);

		if (count($structure) == 1)
		{
			return;
		}

		$className = array_pop($structure);
		$dirName   = $this->getServerPath() . implode('/', $structure) . '/';

		$fileName = strtolower($className) . '.class.php';
		if (file_exists($dirName . $fileName))
		{
			/** @noinspection PhpIncludeInspection */
			include($dirName . $fileName);

			return;
		}

		$fileName = strtolower($className) . '.interface.php';
		if (file_exists($dirName . $fileName))
		{
			/** @noinspection PhpIncludeInspection */
			include($dirName . $fileName);

			return;
		}
	}

	/*** Interface ***/

	/**
	 * @return Params
	 */
	public function params()
	{
		return $this->params;
	}

	/**
	 * @return Externals
	 */
	public function externals()
	{
		return $this->externals;
	}

	/**
	 * @return Modules
	 */
	public function modules()
	{
		return $this->modules;
	}

	/**
	 * @return DB
	 */
	public function db()
	{
		return $this->db;
	}

	/**
	 * @param Targettable $target
	 */
	public function redirect($target)
	{
		if (!headers_sent())
		{
			header('Location: ' . $target->getUrl());
		}
	}
}