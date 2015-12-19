<?php

/**
 * @author TimoBakx
 */

namespace Core\Actions;

use Core\Error;
use Core\Interfaces\Targettable;
use Core\Module;
use Core\Q;

/**
 * Class Action
 *
 * @package Core
 */
abstract class Action implements Targettable
{
	/**
	 * @var Module
	 */
	private $module;
	private $name;
	/**
	 * @var bool
	 */
	private $successful = false;
	/**
	 * @var array
	 */
	private $results = array();
	/**
	 * @var Error[]
	 */
	private $errors = array();

	public final function __construct($module = null, $name = null)
	{
		$this->module = $module;
		$this->name = $name;
	}

	protected final function module()
	{
		return $this->module;
	}

	public final function getName()
	{
		return $this->name;
	}

	public function getUrl()
	{
		return Q::get()->getHttpPath().'action/'.strtolower($this->module->getName()).'/'.strtolower($this->getName()).'/';
	}

	public abstract function execute();
}