<?php

/**
 * @author TimoBakx
 */

namespace Core\Actions;

use Core\Exceptions\QException;
use Core\Error;

/**
 * Class ExceptionAction
 *
 * @package Core\Actions
 */
class ExceptionAction extends Action
{
	/**
	 * @var QException
	 */
	private $exception;

	public final function setException(QException $exception)
	{
		$this->exception = $exception;
	}

	public final function getException()
	{
		return $this->exception;
	}

	public function execute()
	{
		if ($this->getException())
		{
			// TODO: Make prettier
			die($this->getException()->getTitle() . ': ' . $this->getException()->getMessage());
		}
	}
}