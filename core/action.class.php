<?php

/**
 * @author TimoBakx
 */

namespace Core;

abstract class Action
{
	private $module;

	private $successful = false;
	private $results = array();
	private $validationErrors = array();
	private $generalErrors = array();

	public final function __construct($module)
	{
		$this->execute();
	}

	public abstract function execute();
	public final function isSuccessful()
	{
		return $this->successful;
	}
	public final function setSuccessful($successful)
	{
		$this->successful;
	}
	public final function getResult()
	{
		return $this->results;
	}
	public final function setResults($results)
	{
		// Todo: add validation
		$this->results = $results;
	}
	public final function getValidationErrors()
	{
		return $this->validationErrors;
	}
	public final function addValidationError(ValidationError $error)
	{
		$this->validationErrors[$error->getField()] = $error;
	}
	public final function getGeneralErrors()
	{
		return $this->generalErrors;
	}
}