<?php

/**
 * @author TimoBakx
 */

namespace Core;

class GeneralError
{
	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @param string $message
	 */
	public function __construct($message)
	{
		$this->message = $message;
	}

	/**
	 * @return string
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param string $message
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}
}