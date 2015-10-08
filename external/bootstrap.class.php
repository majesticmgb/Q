<?php

/**
 * @author TimoBakx
 */

namespace External;

use Core\External;

class Bootstrap extends External
{
	public function getTitle()
	{
		return 'Bootstrap';
	}

	public function getName()
	{
		return 'bootstrap';
	}

	public function getVersion()
	{
		return '3.3.5';
	}

	public function initialize()
	{
	}

	public function getJavascriptFiles()
	{
		return array(
			$this->getHttpPath().'js/bootstrap.min.js',
		);
	}

	public function getStyleSheets()
	{
		return array(
			$this->getHttpPath().'css/bootstrap.min.css',
			$this->getHttpPath().'css/bootstrap-theme.min.css',
		);
	}
}