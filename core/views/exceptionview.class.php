<?php

/**
 * @author TimoBakx
 */

namespace Core\Views;
use Core\Exceptions\QException;

/**
 * Class ExceptionView
 *
 * @package Core\Views
 */
class ExceptionView extends View
{
	/**
	 * @var QException
	 */
	private $exception;

	/**
	 * @return QException
	 */
	public function getException()
	{
		return $this->exception;
	}

	/**
	 * @param QException $exception
	 */
	public function setException(QException $exception)
	{
		$this->exception = $exception;
	}

	/**
	 * @return void
	 */
	public function initialize()
	{
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return "A system error occurred";
	}

	public final function getBody()
	{
		return '<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">'.$this->getException()->getTitle().'</h3>
				</div>
				<div class="panel-body">'.$this->getException()->getMessage().'</div>
			</div>';
	}
}