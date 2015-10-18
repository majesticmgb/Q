<?php

/**
 * @author TimoBakx
 */

namespace Core\Views;

use Core\FormElements\FormElement;
use Core\Module;
use Core\Params;
use Core\Q;

/**
 * Class FormView
 *
 * @package Core\Views
 */
abstract class FormView extends PanelView
{
	/**
	 * @var bool
	 */
	private $submitted = false;
	/**
	 * @var bool
	 */
	private $valid     = true;
	/**
	 * @var FormElement[]
	 */
	private $formElements = array();

	/**
	 * @return FormElement[]
	 */
	protected final function getFormElements()
	{
		return $this->formElements;
	}

	/**
	 * @param $name
	 *
	 * @return FormElement
	 */
	protected final function getFormElement($name)
	{
		if (isset($this->formElements[$name]))
			return $this->formElements[$name];

		return null;
	}

	/**
	 * @param FormElement $formElement
	 */
	protected final function addFormElement(FormElement $formElement)
	{
		$this->formElements[$formElement->getName()] = $formElement;
	}

	/**
	 * @return string
	 */
	protected function getAction()
	{
		return $this->getUrl();
	}

	/**
	 *
	 */
	public final function initialize()
	{
		$this->initializeData();

		$this->initializeFormElements();

		// Check if submitted
		$this->submitted = (bool)Q::get()->params()->get('formsubmit', false);

		// Load values from get/post
		if ($this->isSubmitted())
		{
			foreach ($this->formElements as $formElement)
			{
				$formElement->setValue(Q::get()->params()->get($formElement->getName(), $formElement->getValue()));
			}
		}

		// Check validation
		if ($this->isSubmitted())
		{
			foreach ($this->formElements as $formElement)
			{
				if (!$formElement->isValid())
				{
					$this->valid = false;
					break;
				}
			}
		}

		// Handle submit
		if ($this->isSubmitted() && $this->isValid())
		{
			$this->handleSubmit();
		}
	}

	/**
	 * @return void
	 */
	protected abstract function initializeFormElements();

	/**
	 * @return void
	 */
	protected abstract function initializeData();

	/**
	 * @return string
	 */
	protected abstract function getCancelUrl();

	/**
	 * @return mixed
	 */
	protected abstract function handleSubmit();

	/**
	 * @return bool
	 */
	protected final function isSubmitted()
	{
		return $this->submitted;
	}

	/**
	 * @return bool
	 */
	protected final function isValid()
	{
		return $this->valid;
	}

	/**
	 * @return string
	 */
	protected function getSubmitTitle()
	{
		return 'Submit';
	}

	/**
	 * @return string
	 */
	protected function getCancelTitle()
	{
		return 'Cancel';
	}

	/**
	 * @return bool
	 */
	protected function useAjax()
	{
		return false;
	}

	/**
	 * @return bool
	 */
	protected function usePost()
	{
		return true;
	}

	/**
	 * @return string
	 */
	protected function getFormStartTag()
	{
		$tag = '<form';
		if ($this->usePost())
		{
			$tag .= ' method="post"';
		}
		if ($this->useAjax())
		{
			$tag .= ' class="ajax-form"';
		}
		if ($this->getAction())
		{
			$tag .= ' action="' . $this->getAction() . '"';
		}
		$tag .= '>';

		return $tag;
	}

	/**
	 * @return string
	 */
	protected final function getPanelBody()
	{
		$body = $this->getFormStartTag();

		foreach ($this->formElements as $formElement)
		{
			$body .= $formElement->getHtml($this->isSubmitted());
		}

		if ($this->getAction() && $this->getSubmitTitle())
		{
			$body .= '<input type="submit" class="btn btn-primary" name="formsubmit" value="' . $this->getSubmitTitle() . '">';
		}

		if ($this->getCancelUrl() && $this->getCancelTitle())
		{
			$body .= '<a class="btn btn-default pull-right" href="' . $this->getCancelUrl() . '">' . $this->getCancelTitle() . '</a>';
		}

		$body .= '</form>';

		return $body;
	}
}