<?php

/**
 * @author TimoBakx
 */

namespace Core;

abstract class External
{
	/**
	 *
	 */
	public final function __construct()
	{
	}

	/**
	 * @return string
	 */
	public final function getServerPath()
	{
		return Q::get()->getServerPath().'external/'.$this->getName().'/';
	}

	/**
	 * @return string
	 */
	public final function getHttpPath()
	{
		return Q::get()->getHttpPath().'external/'.$this->getName().'/';
	}

	/**
	 * @return string
	 */
	public abstract function getTitle();

	/**
	 * @return string
	 */
	public abstract function getName();

	/**
	 * @return string
	 */
	public abstract function getVersion();

	/**
	 * @return void
	 */
	public abstract function initialize();

	/**
	 * @return External
	 */
	public function getInstance()
	{
		return null;
	}

	/**
	 * @return string[]
	 */
	public function getJavascriptFiles()
	{
		return array();
	}

	/**
	 * @return string[]
	 */
	public function getStyleSheets()
	{
		return array();
	}
}