<?php

/**
 * View class to show an HTML view
 *
 * @author TimoBakx
 */

namespace Core\Views;

abstract class View
{
	private $module;

	public final function __construct($module)
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

	public abstract function initialize();

	public abstract function getTitle();

	public abstract function getBody();
}