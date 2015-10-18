<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Views;

use Core\Q;

class Account extends Edit
{
	protected function initializeData()
	{
		$this->user = $this->module()->controller('User')->get($this->module()->getLoggedInUserID());
	}

	public function getTitle()
	{
		return 'Edit profile';
	}

	public function getPanelTitle()
	{
		return $this->getTitle();
	}

	protected function getSubmitTitle()
	{
		return 'Save';
	}

	protected function getCancelUrl()
	{
		return Q::get()->getHttpPath();
	}
}