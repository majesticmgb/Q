<?php

/**
 * @author TimoBakx
 */

namespace Core\Exceptions;

/**
 * Class QException
 *
 * @package Core\Exceptions
 */
class QException extends \Exception
{
	/**
	 * @var string
	 */
	private $title = '';

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function __construct($title, $message)
	{
		parent::__construct($message);

		$this->setTitle($title);
	}
}