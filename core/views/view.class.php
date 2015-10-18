<?php

/**
 * View class to show an HTML view
 *
 * @author TimoBakx
 */

namespace Core\Views;

use Core\Module;
use Core\Q;

/**
 * Class View
 *
 * @package Core\Views
 */
abstract class View
{
	/**
	 * @var Module
	 */
	private $module;

	/**
	 * @param Module $module
	 */
	public final function __construct(Module $module = null)
	{
		$this->module = $module;
	}

	/**
	 * @return \Core\Module
	 */
	protected final function module()
	{
		return $this->module;
	}

	/**
	 * @return bool
	 */
	public final function isCurrent()
	{
		$url = Q::get()->getUrl();

		if ($url == '/')
		{
			return ($this->module()->getName() == Q::DEFAULT_MODULE && $this->getName() == Q::DEFAULT_VIEW);
		}
		else
		{
			$urlParts = explode('/', $url);

			return (strtolower($this->module()->getName()) == $urlParts[1] && strtolower($this->getName()) == $urlParts[2]);
		}
	}

	/**
	 * @return string
	 */
	public final function getUrl()
	{
		if ($this->module()->getName() == Q::DEFAULT_MODULE && $this->getName() == Q::DEFAULT_VIEW)
		{
			return Q::get()->getHttpPath();
		}
		else
		{
			return $this->module()->getUrl() . strtolower($this->getName()) . '/';
		}
	}

	/**
	 * @return bool
	 */
	public function requiresLogin()
	{
		return true;
	}

	/**
	 * @return void
	 */
	public abstract function initialize();

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
	public abstract function getTitle();

	public function getMenuTitle()
	{
		return $this->getTitle();
	}

	/**
	 * @return string
	 */
	public abstract function getBody();

	/**
	 * @return string[]
	 */
	public abstract function getBreadcrumbs();
}