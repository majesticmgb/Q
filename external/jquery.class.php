<?php

/**
 * @author TimoBakx
 */

namespace External;

use Core\External;

class JQuery extends External
{
	public function getTitle()
	{
		return 'jQuery';
	}

	public function getName()
	{
		return 'jquery';
	}

	public function getVersion()
	{
		return '2.1.4';
	}

	public function initialize()
	{

	}

	public function getInstance()
	{
		return null;
	}

	public function getJavascriptFiles()
	{
		return array(
			$this->getHttpPath().'jquery-'.$this->getVersion().'.min.js',
		);
	}
}