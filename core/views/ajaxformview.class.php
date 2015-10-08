<?php

/**
 * @author TimoBakx
 */

namespace Core\Views;

abstract class AjaxFormView extends FormView
{
	protected function getFormStartTag()
	{
		$tag = '<form';
		$tag .= ' class="ajax-form" data-ajax-module="'.$this->module()->getName().'" data-ajax-name="'.$this->getSubmitAjaxName().'"';
		if ($this->usePost())
			$tag .= ' method="post"';
		if ($this->getAction())
			$tag .= ' action="'.$this->getAction().'"';
		$tag .= '>';

		return $tag;
	}

	protected abstract function getSubmitAjaxName();
}