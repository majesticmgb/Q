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
	protected $user;

	protected function initializeData()
	{
		$this->user = $this->module()->controller('User')->get(Q::get()->params()->get('id'));
	}

	/**
	 * @return mixed
	 */
	protected function initializeFormElements()
	{
		$this->addFormElement(new FormElements\TextField('firstName', 'First name', $this->user->getFirstName(), true));
		$this->addFormElement(new FormElements\TextField('middleName', 'Middle name', $this->user->getMiddleName()));
		$this->addFormElement(new FormElements\TextField('lastName', 'Last name', $this->user->getLastName(), true));
		$this->addFormElement(new FormElements\EmailField('email', 'Email address', $this->user->getEmail(), true));
		//$this->addFormElement(new FormElements\PasswordField('password', 'Password', '', true));
	}

	/**
	 * @return string
	 */
	protected function getCancelUrl()
	{
		return $this->module()->view('index')->getUrl();
	}

	/**
	 * @return mixed
	 */
	protected function handleSubmit()
	{
		$this->user->setFirstName($this->getFormElement('firstName')->getValue());
		$this->user->setMiddleName($this->getFormElement('middleName')->getValue());
		$this->user->setLastName($this->getFormElement('lastName')->getValue());
		$this->user->setEmail($this->getFormElement('email')->getValue());

		if ($this->module()->controller('user')->save($this->user))
		{
			Q::get()->redirect($this->module()->view('index')->getUrl());
		}
	}

	public function getTitle()
	{
		return 'Edit '.$this->user->getName();
	}

	/**
	 * @return string
	 */
	protected function getPanelTitle()
	{
		return 'Edit user';
	}

	/**
	 * @return string[]
	 */
	public function getBreadcrumbs()
	{
		$breadcrumbs = $this->module()->view('Index')->getBreadcrumbs();

		$breadcrumbs[$this->getPanelTitle()] = $this->getPanelTitle();

		return $breadcrumbs;
	}

	/**
	 * @return string
	 */
	protected function getAction()
	{
		return $this->getUrl().'?id='.$this->user->getID();
	}
}