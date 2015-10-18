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
			'mysql:host=' . $host . ';dbname=' . $database, $username, $password
		);

		$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
	}

	public function select($query, $class = 'StdClass', ...$parameters)
	{
		$s = $this->pdo->prepare($query);

		$s->execute($parameters);

		return $s->fetchObject($class);
	}

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

	public function execute($query, ...$parameters)
	{
		$s = $this->pdo->prepare($query);

		return $s->execute($parameters);
	}
}