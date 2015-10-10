<?php

/**
 * @author TimoBakx
 */

namespace Core;

/**
 * Class GeneralError
 *
 * @package Core
 */
class GeneralError implements \JsonSerializable
{
	/**
	 * @var string
	 */
	protected $title;
	/**
	 * @var string
	 */
	protected $message;

	/**
	 * @param string $title
	 * @param string $message
	 */
	public function __construct($title, $message)
	{
		$this->setTitle($title);
		$this->setMessage($message);
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
		return array(
			'title'   => $this->getTitle(),
			'message' => $this->getMessage(),
		);
	}
}