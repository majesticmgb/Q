<?php

namespace Core;

use PDO;

class DB
{
	/**
	 * @var PDO
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
		$this->pdo = new PDO(
			'mysql:host=' . $host . ';dbname=' . $database, $username, $password
		);

		$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
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
		$s = $this->execute($query, ...$parameters);

		return $s->fetchObject($class);
	}

	/**
	 * @param string $query
	 * @param string $class
	 * @param int    $offset
	 * @param int    $count
	 * @param mixed  ...$parameters
	 *
	 * @return Entity
	 */
	public function selectAll($query, $class = 'StdClass', $offset = 0, $count = 0, ...$parameters)
	{
		if ($count)
		{
			$query .= ' LIMIT :offset-INT, :count-INT';

			$parameters[] = $offset;
			$parameters[] = $count;
		}

		$s = $this->execute($query, ...$parameters);

		return $s->fetchAll(PDO::FETCH_CLASS, $class);
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
	 * @return \PDOStatement
	 */
	public function execute($query, ...$parameters)
	{
		$bindings = [];
		$i = 0;

		$query = preg_replace_callback(
			'/:([a-z]+)-([a-z]+)/i',
			function ($matches) use ($parameters, &$bindings, &$i)
			{
				$key   = $matches[1];
				$value = (isset($parameters[$i]) ? $parameters[$i] : null);
				$type  = $matches[2];

				switch ($type)
				{
					case 'INT':
						$type = PDO::PARAM_INT;
						break;
					case 'STRING':
					default:
						$type = PDO::PARAM_STR;
						break;
				}

				$bindings[] = array(
					'key'   => $key,
					'value' => $value,
					'type'  => $type,
				);

				$i += 1;

				return ':' . $key;
			},
			$query
		);

		$s = $this->pdo->prepare($query);

		foreach ($bindings as $binding)
		{
			$s->bindValue(':'.$binding['key'], $binding['value'], $binding['type']);
		}

		$s->execute();

		return $s;
	}
}