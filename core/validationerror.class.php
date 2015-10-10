<?php

/**
 * @author TimoBakx
 */

namespace Core;

/**
 * Class ValidationError
 *
 * @package Core
 */
class ValidationError extends GeneralError
{
	/**
	 * @var string
	 */
	protected $field;

	/**
	 * @param string $field
	 * @param string $message
	 */
	public function __construct($field, $message)
	{
		parent::__construct($message);

		$this->field = $field;
	}

	/**
	 * @return string
	 */
	public function getField()
	{
		return $this->field;
	}

	/**
	 * @param string $field
	 */
	public function setField($field)
	{
		$this->field = $field;
	}
}