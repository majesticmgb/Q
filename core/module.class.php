<?php

/**
 * @author TimoBakx
 */

namespace Core;

use Core\Exceptions\ViewNotFoundException;

abstract class Module
{
	public abstract function initialize();
	public abstract function getTitle();
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
		return Q::get()->getHttpPath().$this->path();
	}

	/**
	 * @return string
	 */
	public final function serverPath()
	{
		return Q::get()->getServerPath().$this->path();
	}

	public final function url()
	{
		return Q::get()->getHttpPath().strtolower($this->getName()).'/';
	}

	public final function path()
	{
		return 'modules/'.strtolower($this->getName()).'/';
	}

	public final function view($name)
	{
		$viewName = '\\Modules\\' . $this->getName() . '\\Views\\' . $name;

		if (!class_exists($viewName))
		{
			throw new ViewNotFoundException($name, $this->getName());
		}
		$view = new $viewName($this);

		return $view;
	}

	public final function action($name)
	{
		$viewName = '\\Modules\\' . $this->getName() . '\\Actions\\' . $name;

		return new $viewName($this);
	}

	public final function controller($name)
	{
		$controllerName = '\\Modules\\'.$this->getName().'\\Controllers\\'.$name;

		return new $controllerName($this);
	}
}