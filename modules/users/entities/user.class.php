<?php

/**
 * @author TimoBakx
 */

namespace Modules\Users\Entities;

use Core\Entity;

/**
 * Class User
 *
 * @package Modules\Users\Entities
 */
class User extends Entity
{
	/**
	 * @var int
	 */
	protected $id;
	/**
	 * @var string
	 */
	protected $email;
	/**
	 * @var string
	 */
	protected $password;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}
}

