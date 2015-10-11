<?php

/**
 * @author TimoBakx
 */

namespace Core\Actions;

use Core\GeneralError;
use Core\Module;
use Core\ValidationError;

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
	 * @var ValidationError[]
	 */
	private $validationErrors = array();
	/**
	 * @var GeneralError[]
	 */
	private $generalErrors = array();

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

	public final function getValidationErrors()
	{
		return $this->validationErrors;
	}

	public final function hasValidationErrors()
	{
		return count($this->validationErrors);
	}

	public final function addValidationError(ValidationError $error)
	{
		$this->validationErrors[$error->getField()] = $error;
	}

	public final function getGeneralErrors()
	{
		return $this->generalErrors;
	}

	public final function addGeneralError(GeneralError $error)
	{
		$this->generalErrors[] = $error;
	}

	public final function jsonSerialize()
	{
		return array(
			'success'          => $this->isSuccessful(),
			'results'          => $this->getResults(),
			'generalErrors'    => $this->getGeneralErrors(),
			'validationErrors' => $this->getValidationErrors(),
		);
	}
}