<?php

/**
 * View class to show an HTML view
 *
 * @author TimoBakx
 */

namespace Core\Views;

use Core\Module;

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

		$this->initialize();
	}

	/**
	 * @return \Core\Module
	 */
	protected final function module()
	{
		return $this->module;
	}

	/**
	 * @return string
	 */
	public final function getUrl()
	{
		return $this->module()->getUrl() . strtolower($this->getName()) . '/';
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

	/**
	 * @return string
	 */
	public abstract function getBody();

	/**
	 * @return string[]
	 */
	public abstract function getBreadcrumbs();
}