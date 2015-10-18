<?php

namespace Core;

class DB
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	/**
	 * @param string $host
	 * @param string $database
	 * @param string $username
	 * @param string $password
	 */
	public function __construct($host, $database, $username, $password)
	{
		$this->pdo = new \PDO(
			'mysql:host=' . $host . ';dbname=' . $database, $username, $password
		);

		$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
	}

	/**
	 * @param string $query
	 * @param string $class
	 * @param mixed  ...$parameters
	 *
	 * @return Entity
	 */
	public function select($query, $class = 'StdClass', ...$parameters)
	{
		$s = $this->pdo->prepare($query);

		$s->execute($parameters);

		return $s->fetchObject($class);
	}

	/**
	 * @param string $table
	 * @param Entity $entity
	 *
	 * @return bool
	 */
	public function store($table, Entity $entity)
	{
		$attributes = ($entity->getAttributes());

		$values  = [];
		$columns = [];
		foreach ($attributes as $column => $value)
		{
			$columns[] = '`' . $column . '`';
			$values[]  = ':' . $column;
		}

		$s = $this->pdo->prepare('REPLACE INTO `' . $table . '` (' . implode(', ', $columns) . ') VALUES (' . implode(', ', $values) . ')');

		foreach ($attributes as $column => $value)
		{
			$s->bindValue(':' . $column, $value);
		}

		return $s->execute();
	}

	/**
	 * @param string $query
	 * @param string ...$parameters
	 *
	 * @return bool
	 */
	public function execute($query, ...$parameters)
	{
		$s = $this->pdo->prepare($query);

		return $s->execute($parameters);
	}
}