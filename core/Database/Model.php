<?php

namespace Core\Database;

use Core\Application;
use Core\Support\Arr;
use PDO;
use RuntimeException;

abstract class Model
{
	protected string $modelClass;
	protected string $table;
	protected QueryBuilder $queryBuilder;
	protected array $data = [];

	public function __construct()
	{
		$this->queryBuilder = new QueryBuilder();
		$this->queryBuilder->from($this->table);
	}

	public function select(array |string $columns)
	{
		$this->queryBuilder->select($columns);

		return $this;
	}

	public function where(array |string $columns, $value = null)
	{
		$this->queryBuilder->where($columns, $value);

		return $this;
	}

	public function first()
	{
		$query = $this->queryBuilder->build();

		$database = Application::getDatabase();

		$statement = $database->prepare($query);
		$statement->execute($this->queryBuilder->getBinds());

		if ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
			$this->data = $data;
		} else {
			return null;
		}

		$this->queryBuilder->reset();

		return $this;
	}

	public function get()
	{
		$query = $this->queryBuilder->build();

		$database = Application::getDatabase();

		$statement = $database->prepare($query);
		$statement->execute($this->queryBuilder->getBinds());

		$models = [];

		$result = $statement->fetchAll(PDO::FETCH_ASSOC);

		foreach ($result as $data) {
			$models[] = (new $this->modelClass())->setData($data);
		}

		$this->queryBuilder->reset();

		return $models;
	}

	public function all(array |string $columns = [])
	{
		return $this->select($columns)->get();
	}

	public function setData(array $data)
	{
		$this->data = $data;

		return $this;
	}

	public function dd()
	{
		dd($this->queryBuilder->build());
	}

	public function __get($name)
	{
		if (Arr::exists($this->data, $name)) {
			return $this->data[$name] ?? null;
		}

		throw new RuntimeException("Undifined data $name");
	}
}