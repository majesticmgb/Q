<?php

/**
 * @author TimoBakx
 */

namespace External;

use Core\External;

class Smarty extends External
{
	public function getTitle()
	{
		return 'Smarty';
	}

	public function getVersion()
	{
		return '3.1.27';
	}

	public function initialize()
	{
		include(__DIR__.'/smarty/Smarty.class.php');
	}

	public function getInstance()
	{
		$instance = new \Smarty();

		$instance->setTemplateDir('templates/');
		$instance->setCompileDir('dynamic/smarty/templates_c/');

		return $instance;
	}
}