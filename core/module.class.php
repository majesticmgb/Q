<?php

/**
 * @author TimoBakx
 */

namespace Core;

use Core\Actions\Action;
use Core\Exceptions\ActionNotFoundException;
use Core\Exceptions\ControllerNotFoundException;
use Core\Exceptions\ViewNotFoundException;
use Core\Views\View;

/**
 * Class Module
 *
 * @package Core
 */
abstract class Module
{
	/**
	 * @return void
	 */
	public abstract function initialize();

	/**
	 * @return string
	 */
	public abstract function getTitle();

	/**
	 * @return string
	 */
	public final function getName()
	{
		$className = get_class($this);

		return substr($className, strrpos($className, '\\') + 1);
	}

	/**
	 * @return string
	 */
	public final function httpPath()
	{
		return Q::get()->getHttpPath() . $this->getPath();
	}

	/**
	 * @return string
	 */
	public final function serverPath()
	{
		return Q::get()->getServerPath() . $this->getPath();
	}

	/**
	 * @return string
	 */
	public final function getUrl()
	{
		return Q::get()->getHttpPath() . strtolower($this->getName()) . '/';
	}

	/**
	 * @return string
	 */
	public final function getPath()
	{
		return 'modules/' . strtolower($this->getName()) . '/';
	}

	/**
	 * @param $name
	 *
	 * @return View
	 * @throws ViewNotFoundException
	 */
	public final function view($name)
	{
		$viewName = '\\Modules\\' . $this->getName() . '\\Views\\' . $name;

		if (!class_exists($viewName))
		{
			throw new ViewNotFoundException($name, $this->getName());
		}

		return new $viewName($this);
	}

	/**
	 * @param $name
	 *
	 * @return Action
	 * @throws ActionNotFoundException
	 */
	public final function action($name)
	{
		$actionClass = '\\Modules\\' . $this->getName() . '\\Actions\\' . $name;

		if (!class_exists($actionClass))
		{
			throw new ActionNotFoundException($name, $this->getName());
		}

		return new $actionClass($this);
	}

	/**
	 * @param $name
	 *
	 * @return Controller
	 * @throws ControllerNotFoundException
	 */
	public final function controller($name)
	{
		$controllerClass = '\\Modules\\' . $this->getName() . '\\Controllers\\' . $name;

		if (!class_exists($controllerClass))
		{
			throw new ControllerNotFoundException($name, $this->getName());
		}

		return new $controllerClass($this);
	}
}