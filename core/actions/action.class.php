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
	private $executed = false;
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

	private final function runExecution()
	{
		if (!$this->isExecuted())
			$this->execute();

		$this->executed = true;
	}

	protected final function isExecuted()
	{
		return $this->executed;
	}

	public final function isSuccessful()
	{
		if (!$this->isExecuted())
			$this->runExecution();

		return $this->successful;
	}

	public final function setSuccessful($successful)
	{
		$this->successful = $successful;
	}

	public final function getResults()
	{
		if (!$this->isExecuted())
			$this->runExecution();

		return $this->results;
	}

	public final function setResults($results)
	{
		// Todo: add some kind of validation?
		$this->results = $results;
	}

	public final function getValidationErrors()
	{
		if (!$this->isExecuted())
			$this->runExecution();

		return $this->validationErrors;
	}

	public final function addValidationError(ValidationError $error)
	{
		$this->validationErrors[$error->getField()] = $error;
	}

	public final function getGeneralErrors()
	{
		if (!$this->isExecuted())
			$this->runExecution();

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