<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Views;

use Core\FormElements;
use Core\Q;
use Core\Views\FormView;
use Modules\Users\Entities\User;

class Edit extends FormView
{
	/**
	 * @var User
	 */
	private $user;

	/**
	 * @return mixed
	 */
	protected function initializeFormElements()
	{
		$this->user = $this->module()->controller('User')->get(Q::get()->params()->get('id'));

		$this->addFormElement(new FormElements\EmailField('email', 'Email address', $this->user->getEmail(), true));
		//$this->addFormElement(new FormElements\PasswordField('password', 'Password', '', true));
	}

	/**
	 * @return string
	 */
	protected function getCancelUrl()
	{
		return '';
	}

	/**
	 * @return mixed
	 */
	protected function handleSubmit()
	{
		// TODO: Implement handleSubmit() method.
	}

	protected function getPanelTitle()
	{
		return 'Edit '.$this->user->getEmail();
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return 'Edit user';
	}

	/**
	 * @return string[]
	 */
	public function getBreadcrumbs()
	{
		return array(
			$this->module()->getTitle() => $this->module()->getUrl(),
			$this->getPanelTitle()      => $this->getUrl(),
		);
	}
}