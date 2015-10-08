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
	protected $username;
	/**
	 * @var string
	 */
	protected $password;


}

