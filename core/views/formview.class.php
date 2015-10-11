<?php

/**
 * @author TimoBakx
 */

namespace Core\Views;

use Core\FormElements\FormElement;
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
	 * @return string
	 */
	protected abstract function getCancelUrl();

	protected abstract function handleSubmit();

	protected final function isSubmitted()
	{
		return (bool)Q::get()->params()->get('formsubmit', false);
	}

	protected final function isValid()
	{

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
		if ($this->isSubmitted())
		{
			$allFieldsValid = true;
			foreach ($this->formElements as $formElement)
			{
				$formElement->setValue(Q::get()->params()->get($formElement->getName(), $formElement->getValue()));
				if (!$formElement->isValid())
				{
					$allFieldsValid = false;
				}
			}

			if ($allFieldsValid)
			{
				$this->handleSubmit();
			}
		}

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