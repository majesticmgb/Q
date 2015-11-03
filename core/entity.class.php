<?php

/**
 * @author TimoBakx
 */

namespace Core;

/**
 * Class Entity
 *
 * @package Core
 */
abstract class Entity
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @return int
	 */
	public final function getID()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public final function setID($id)
	{
		$this->id = $id;
	}

	/**
	 * @return string[]
	 */
	public function getAttributes()
	{
		return get_object_vars($this);
	}
}