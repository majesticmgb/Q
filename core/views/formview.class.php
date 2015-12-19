<?php

/**
 * @author TimoBakx
 */

namespace Core\Views;

use Core\Buttons\Button;
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
	 * @return FormElement[]
	 */
	protected abstract function getFormElements();

	/**
	 * @return Button[]
	 */
	protected abstract function getButtons();

	/**
	 * @return string
	 */
	protected final function getPanelBody()
	{
		$body = '<form method="post">';

		$formElements = $this->getFormElements();
		foreach ($formElements as $formElement)
		{
			$body .= $formElement->getHtml();
		}

		$buttons = $this->getButtons();
		foreach ($buttons as $button)
		{
			$body .= $button->getHtml();
		}

		$body .= '</form>';

		return $body;
	}
}