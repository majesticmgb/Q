<?php

/**
 * @author TimoBakx
 */

namespace Core;

abstract class Module
{
	public abstract function initialize();
	public abstract function getTitle();
	public abstract function getCode();

	/**
	 * @return string
	 */
	public final function httpPath()
	{
		return Q::get()->getHttpPath().'modules/'.$this->getCode().'/';
	}

	/**
	 * @return string
	 */
	public final function serverPath()
	{
		return Q::get()->getServerPath().'modules/'.$this->getCode().'/';
	}

	public final function view($name)
	{
		$viewName = '\\Modules\\' . $this->getCode() . '\\Views\\' . $name;

		return new $viewName($this);
	}

	public final function controller($name)
	{
		$controllerName = '\\Modules\\'.$this->getCode().'\\Controllers\\'.$name;

		return new $controllerName($this);
	}
}