<?php

/**
 * @author TimoBakx
 */

namespace Modules\Pages\Entities;

class Page extends \Core\Entity
{
	protected $id;
	protected $title;
	protected $body;

	public function getID()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getBody()
	{
		return $this->body;
	}
}