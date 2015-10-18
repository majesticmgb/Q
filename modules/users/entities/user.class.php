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
	 * @var string
	 */
	protected $firstName;
	/**
	 * @var string
	 */
	protected $middleName;
	/**
	 * @var string
	 */
	protected $lastName;

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

	/**
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	 * @param string $firstName
	 */
	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	/**
	 * @return string
	 */
	public function getMiddleName()
	{
		return $this->middleName;
	}

	/**
	 * @param string $middleName
	 */
	public function setMiddleName($middleName)
	{
		$this->middleName = $middleName;
	}

	/**
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	 * @param string $lastName
	 */
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		$name = [];

		if ($this->firstName)
			$name[] = $this->firstName;
		if ($this->middleName)
			$name[] = $this->middleName;
		if ($this->lastName)
			$name[] = $this->lastName;

		return implode(' ', $name);
	}
}

