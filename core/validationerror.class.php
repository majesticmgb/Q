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
		parent::__construct('Validation error', $message);

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

	/**
	 * Specify data which should be serialized to JSON
	 *
	 * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 *        which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	public function jsonSerialize()
	{
		$values = parent::jsonSerialize();
		$values['field'] = $this->getField();

		return $values;
	}
}