<?php

/**
 * @author TimoBakx
 */

namespace Core\FormElements;

/**
 * Class FormField
 *
 * @package Core\FormElements
 */
abstract class FormElement
{
	/**
	 * @var string
	 */
	private $name;
	/**
	 * @var string
	 */
	private $title;
	/**
	 * @var string
	 */
	private $value;
	/**
	 * @var bool
	 */
	private $required;
	/**
	 * @var string
	 */
	private $placeholder;
	private $classes = ['form-group' => 'form-group'];

	/**
	 * @param string $name
	 * @param string $title
	 * @param string $value
	 * @param bool   $required
	 */
	public function __construct($name, $title, $value, $required = false)
	{
		$this->setName($name);
		$this->setTitle($title);
		$this->setValue($value);
		$this->setRequired($required);

		if ($this->isRequired())
		{
			$this->addClass('required');
		}
	}

	/**
	 * @param $name
	 */
	public final function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public final function getName()
	{
		return $this->name;
	}

	/**
	 * @param $title
	 */
	public final function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public final function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param $value
	 */
	public final function setValue($value)
	{
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public final function getValue()
	{
		return $this->value;
	}

	/**
	 * @return boolean
	 */
	public function isRequired()
	{
		return $this->required;
	}

	/**
	 * @param boolean $required
	 */
	public function setRequired($required)
	{
		$this->required = (bool)$required;
	}

	/**
	 * @param $placeholder
	 */
	public final function setPlaceholder($placeholder)
	{
		$this->placeholder = $placeholder;
	}

	/**
	 * @return string
	 */
	public final function getPlaceholder()
	{
		return $this->placeholder;
	}

	public final function addClass($class)
	{
		$this->classes[$class] = $class;
	}

	public final function getClasses($asString = false)
	{
		if ($asString)
		{
			return implode(' ', $this->classes);
		}

		return $this->classes;
	}

	/**
	 * @return mixed
	 */
	protected abstract function getField();

	public function isValid()
	{
		return true;
	}

	/**
	 * @param bool $showValidation
	 *
	 * @return string
	 */
	public final function getHtml($showValidation = false)
	{
		if ($showValidation)
		{
			$this->addClass('has-feedback');
			if ($this->isValid())
			{
				$this->addClass('has-success');
			}
			else
			{
				$this->addClass('has-error');
			}
		}

		$html = '<div class="' . $this->getClasses(true) . '">';
		$html .= '<label class="control-label" for="' . $this->getName() . '">' . $this->getTitle() . '</label>';
		$html .= $this->getField();
		if ($showValidation)
		{
			$html .= '<span class="glyphicon glyphicon-' . ($this->isValid() ? 'ok' : 'remove') . ' form-control-feedback" aria-hidden="true"></span>';
			$html .= '<span id="input' . ($this->isValid() ? 'Success' : 'Error') . '2Status" class="sr-only">(' . ($this->isValid() ? 'success' : 'error') . ')</span>';
		}
		$html .= '</div>';

		return $html;
	}

	/**
	 * @return mixed
	 */
	public final function __toString()
	{
		return $this->getField();
	}
}