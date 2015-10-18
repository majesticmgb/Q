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
	 * @var string
	 */
	private $title;
	/**
	 * @var View[]
	 */
	private $views;

	/**
	 * @param Module $module
	 * @param string $title
	 */
	public function __construct(Module $module, $title = '')
	{
		$this->module = $module;
		$this->title = $title;
	}

	/**
	 * @param View $view
	 */
	public function addView(View $view)
	{
		$this->views[] = $view;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		if (strlen($this->title))
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

	/**
	 * @return string
	 */
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
			$dropdownHtml = '';
			$current = false;

			/** @var View $view */
			foreach ($this->views as $view)
			{
				$dropdownCurrent = $view->isCurrent();

				$dropdownHtml .= '<li'.($dropdownCurrent?' class="active"':'').'><a href="' . $view->getUrl() . '">';
				$dropdownHtml .= $view->getMenuTitle();
				if ($dropdownCurrent)
					$dropdownHtml .= ' <span class="sr-only">(current)</span>';
				$dropdownHtml .= '</a></li>';

				if ($dropdownCurrent)
					$current = true;
			}

			$html = '<li class="dropdown'.($current?' active':'').'">';
			$html .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';
			$html .= $this->getTitle();
			if ($current)
				$html .= ' <span class="sr-only">(current)</span>';
			$html .= ' <span class="caret"></span></a>';
			$html .= '<ul class="dropdown-menu">';
			$html .= $dropdownHtml;
			$html .= '</ul></li>';
		}

		return $html;
	}
}