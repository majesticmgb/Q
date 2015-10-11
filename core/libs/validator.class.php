<?php

/**
 * @author TimoBakx
 */

namespace Core\Libs;

final class Validator
{
	private final function __construct() {}

	public static function isString($string)
	{
		return (is_string($string) && strlen($string) !== 0);
	}

	public static function isEmail($email)
	{
		return (self::isString($email) && preg_match('/^([a-z0-9_.-])+@([a-z0-9_.-]+)\.([a-z]+)$/i', $email));
	}
}