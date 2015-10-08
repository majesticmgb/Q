<?php

/**
 * @author TimoBakx
 */

namespace External;

use Core\External;
use Core\Q;

class Smarty extends External
{
	public function getTitle()
	{
		return 'Smarty Template Engine';
	}

	public function getName()
	{
		return 'smarty';
	}

	public function getVersion()
	{
		return '3.1.27';
	}

	public function initialize()
	{
		include($this->getServerPath().'/Smarty.class.php');
	}

	public function getInstance()
	{
		$instance = new \Smarty();

		$instance->setTemplateDir(Q::get()->getServerPath().'templates/');
		$instance->setCompileDir(Q::get()->getServerPath().'dynamic/smarty/templates_c/');

		return $instance;
	}
}