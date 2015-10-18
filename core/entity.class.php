<?php

/**
 * @author TimoBakx
 */

namespace Core;

abstract class Entity
{
	public function getAttributes()
	{
		return get_object_vars($this);
	}
}