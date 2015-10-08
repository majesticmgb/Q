<?php

/**
 * @author TimoBakx
 */

namespace Core;

abstract class Module
{
	public abstract function initialize();
	public abstract function getTitle();
	public abstract function getName();

	/**
	 * @return string
	 */
	public final function httpPath()
	{
		return Q::get()->getHttpPath().'modules/'.$this->getName().'/';
	}

	/**
	 * @return string
	 */
	public final function serverPath()
	{
		return Q::get()->getServerPath().'modules/'.$this->getName().'/';
	}

	public final function view($name)
	{
		$viewName = '\\Modules\\' . $this->getName() . '\\Views\\' . $name;

		return new $viewName($this);
	}

	public final function controller($name)
	{
		$controllerName = '\\Modules\\'.$this->getName().'\\Controllers\\'.$name;

		return new $controllerName($this);
	}
}