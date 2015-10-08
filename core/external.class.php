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

	public final function getServerPath()
	{
		return Q::get()->getServerPath().'external/'.$this->getName().'/';
	}

	public final function getHttpPath()
	{
		return Q::get()->getHttpPath().'external/'.$this->getName().'/';
	}

	public abstract function getTitle();

	public abstract function getName();

	public abstract function getVersion();

	public abstract function initialize();

	public function getInstance()
	{
		return null;
	}

	public function getJavascriptFiles()
	{
		return array();
	}

	public function getStyleSheets()
	{
		return array();
	}
}