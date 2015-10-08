<?php

/**
 * @author TimoBakx
 */

namespace Core\Views;

/**
 * Class FormView
 *
 * @package Core
 */
abstract class FormView extends PanelView
{
	/**
	 * @return \Core\FormElements\FormElement[]
	 */
	protected abstract function getFormFields();

	protected abstract function getAction();

	protected abstract function getCancelUrl();

	protected function getSubmitTitle()
	{
		return 'Submit';
	}
	protected function getCancelTitle()
	{
		return 'Cancel';
	}

	protected function useAjax()
	{
		return false;
	}

	protected function usePost()
	{
		return true;
	}

	protected function getFormAttributes()
	{
		return array();
	}

	protected function getFormStartTag()
	{
		$tag = '<form';
		if ($this->usePost())
			$tag .= ' method="post"';
		if ($this->useAjax())
			$tag .= ' class="ajax-form"';
		if ($this->getAction())
			$tag .= ' action="'.$this->getAction().'"';
		$tag .= '>';

		return $tag;
	}

	/**
	 * @return string
	 */
	protected final function getPanelBody()
	{
		$body = $this->getFormStartTag();

		$fields = $this->getFormFields();
		foreach ($fields as $field)
		{
			$body .= $field->getHtml();
		}

		if ($this->getAction() && $this->getSubmitTitle())
		{
			$body .= '<button type="submit" class="btn btn-primary">'.$this->getSubmitTitle().'</button>';
		}

		if ($this->getCancelUrl() && $this->getCancelTitle())
		{
			$body .= '<a class="btn btn-default pull-right" href="'.$this->getCancelUrl().'">'.$this->getCancelTitle().'</a>';
		}

		$body .= '</form>';

		return $body;
	}
}