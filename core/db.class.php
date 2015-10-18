<?php

namespace Core;

class DB
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	public function __construct($host, $database, $username, $password)
	{
		$this->pdo = new \PDO(
			'mysql:host='.$host.';dbname='.$database,
			$username,
			$password
		);
	}

	public function select($query, $class = 'StdClass', ...$parameters)
	{
		$s = $this->pdo->prepare($query);

		$s->execute($parameters);

		$result = $s->fetchAll(\PDO::FETCH_CLASS, $class);

		if (count($result))
			return reset($result);

		return new $class();
	}
}