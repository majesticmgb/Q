<?php

/**
 * @author TimoBakx
 */

namespace Core;

abstract class External
{
	public final function __construct()
	{
	}

	public abstract function getTitle();

	public abstract function getVersion();

	public abstract function initialize();

	public abstract function getInstance();
}