<?php

/**
 * @author TimoBakx
 */

namespace Core\Actions;

use Core\Error;
use Core\Module;

/**
 * Class Action
 *
 * @package Core
 */
abstract class Action implements \JsonSerializable
{
	/**
	 * @var Module
	 */
	private $module;
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

	public final function __construct($module = null)
	{
		$this->module = $module;
	}

	public abstract function execute();

	public final function isSuccessful()
	{
		return $this->successful;
	}

	public final function setSuccessful($successful)
	{
		$this->successful = $successful;
	}

	public final function getResults()
	{
		return $this->results;
	}

	public final function setResults($results)
	{
		// Todo: add some kind of validation?
		$this->results = $results;
	}

	public final function getErrors()
	{
		return $this->errors;
	}

	public final function addError(Error $error)
	{
		$this->errors[] = $error;
	}

	public final function jsonSerialize()
	{
		return array(
			'success' => $this->isSuccessful(),
			'results' => $this->getResults(),
			'errors'  => $this->getErrors(),
		);
	}
}