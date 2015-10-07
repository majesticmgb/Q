<?php

/**
 * @author TimoBakx
 */

namespace Core;

abstract class Controller
{
	public final function __contruct()
	{

	}

	public abstract function initialize();
	protected abstract function getTable();
	protected abstract function getEntityClass();

	public final function get($selector)
	{
		$s = Q::get()->pdo()->query('SELECT * FROM `'.$this->getTable().'` WHERE '.$selector);
		return $s->fetchObject($this->getEntityClass());
	}
}