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
	 * @return string[]
	 */
	public function getAttributes()
	{
		return get_object_vars($this);
	}
}