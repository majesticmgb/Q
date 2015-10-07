<?php

/**
 * @author TimoBakx
 */

namespace Core;

final class Params
{
	const TYPE_GET  = 1;
	const TYPE_POST = 2;
	const TYPE_ALL  = 3;
	protected $getParams  = array();
	protected $postParams = array();

	public function __construct()
	{
		foreach ($_GET as $key => $value)
		{
			$this->getParams[$key] = $value;
		}

		foreach ($_POST as $key => $value)
		{
			$this->postParams[$key] = $value;
		}
	}

	public function get($key, $default = null, $type = self::TYPE_ALL)
	{
		if ($type ^ self::TYPE_GET && isset($this->getParams[$key]))
		{
			return $this->getParams[$key];
		}
		elseif ($type ^ self::TYPE_POST && isset($this->postParams[$key]))
		{
			return $this->postParams[$key];
		}

		return $default;
	}
}