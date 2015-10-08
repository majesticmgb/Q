<?php

/**
 * @author TimoBakx
 */

namespace Core\FormElements;

abstract class FormElement
{
	private $name;
	private $title;
	private $value;
	private $placeholder;

	public function __construct($name, $title, $value)
	{
		$this->setName($name);
		$this->setTitle($title);
		$this->setValue($value);
	}

	public final function setName($name)
	{
		$this->name = $name;
	}

	public final function getName()
	{
		return $this->name;
	}

	public final function setTitle($title)
	{
		$this->title = $title;
	}

	public final function getTitle()
	{
		return $this->title;
	}

	public final function setValue($value)
	{
		$this->value = $value;
	}

	public final function getValue()
	{
		return $this->value;
	}

	public final function setPlaceholder($placeholder)
	{
		$this->placeholder = $placeholder;
	}

	public final function getPlaceholder()
	{
		return $this->placeholder;
	}

	protected abstract function getField();

	public final function getHtml()
	{
		$html = '<div class="form-group">';
		$html .= '<label for="' . $this->getName() . '">' . $this->getTitle() . '</label>';
		$html .= $this->getField();
		$html .= '</div>';

		return $html;
	}

	public final function __toString()
	{
		return $this->getField();
	}
}