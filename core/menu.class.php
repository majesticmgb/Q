<?php

/**
 * @author TimoBakx
 */

namespace Core;

use Core\Views\View;

/**
 * Class Menu
 *
 * @package Core
 */
class Menu
{
	/**
	 * @var Module
	 */
	private $module;
	/**
	 * @var String
	 */
	private $title;
	/**
	 * @var View[]
	 */
	private $views;

	public function __construct(Module $module, $title = null)
	{
		$this->module = $module;
		$this->title = $title;
	}

	public function addView(View $view)
	{
		$this->views[] = $view;
	}

	public function getTitle()
	{
		if ($this->title)
		{
			return $this->title;
		}

		elseif (count($this->views) == 1)
		{
			/** @var View $view */
			$view = reset($this->views);

			return $view->getMenuTitle();
		}

		elseif (count($this->views) > 1)
		{
			$this->module->getMenuTitle();
		}

		return '';
	}

	public function getHtml()
	{
		$html = '';

		if (count($this->views) == 1)
		{
			/** @var View $view */
			$view = reset($this->views);

			$current = $view->isCurrent();

			$html = '<li'.($current?' class="active"':'').'><a href="' . $view->getUrl() . '">';
			$html .= $this->getTitle();
			if ($current)
				$html .= ' <span class="sr-only">(current)</span>';
			$html .= '</a></li>';
		}
		elseif (count($this->views) > 1)
		{
			$html = '<li class="dropdown">';
			$html .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
			$html .= $this->getTitle();
			$html .= ' <span class="caret"></span></a>';
			$html .= '<ul class="dropdown-menu">';

			/** @var View $view */
			foreach ($this->views as $view)
			{
				$html .= '<li><a href="' . $view->getUrl() . '">';
				$html .= $view->getMenuTitle();
				$html .= '</a></li>';
			}

			$html .= '</ul></li>';
		}

		return $html;
	}
}