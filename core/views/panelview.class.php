<?php

/**
 * @author TimoBakx
 */

namespace Core\Views;

abstract class PanelView extends View
{
	protected abstract function getPanelTitle();
	protected abstract function getPanelBody();

	protected function getPanelType()
	{
		return 'primary';
	}

	public final function getBody()
	{
		return '<div class="panel panel-'.$this->getPanelType().'">
				<div class="panel-heading">
					<h3 class="panel-title">'.$this->getPanelTitle().'</h3>
				</div>
				<div class="panel-body">'.$this->getPanelBody().'</div>
			</div>';
	}
}