<?php

namespace Core\Database;

use RuntimeException;

class QueryBuilder
{
	protected array $select = [];
	protected array $tables = [];
	protected array $where = [];
	protected array $binds = [];

	public function select(array |string $columns)
	{
		$this->reset();

		if (is_string($columns)) {
			foreach (explode(',', $columns) as $column) {
				$this->select[] = $column;
			}
		} else {
			$this->select = array_merge($this->select, $columns);
		}

		return $this;
	}

	public function from(array |string $tables)
	{
		if (is_string($tables)) {
			foreach (explode(',', $tables) as $table) {
				$this->tables[] = $table;
			}
		} else {
			$this->tables = array_merge($this->tables, $tables);
		}

		return $this;
	}

	public function where(array |string $columns, $value = null)
	{
		if (is_array($columns)) {
			$values = array_values($columns);
			$columns = array_keys($columns);

			foreach ($columns as $i => $column) {
				$this->where($column, $values[$i]);
			}
		} else {
			$this->where[] = trim($columns);
			$this->binds[$columns] = $value;
		}

		return $this;
	}

	public function build()
	{
		if (empty($this->select)) {
			$this->select[] = '*';
		}

		if (empty($this->tables)) {
			throw new RuntimeException('No table selected');
		}

		$query = "SELECT " . implode(', ', array_map(function ($column) {
			return $column === "*" ? "$column" : "`$column`";
		}, $this->select));

		$query .= " FROM " . implode(', ', array_map(function ($table) {
			return "`$table`";
		}, $this->tables));

		if (!empty($this->where)) {
			$query .= " WHERE " . implode(', ', array_map(function ($where) {
				return "`$where` = :$where";
			}, $this->where));
		}

		return $query;
	}

	public function reset()
	{
		$this->select = [];
		//$this->tables = [];
		$this->where = [];
		$this->binds = [];

		return $this;
	}

	public function getBinds()
	{
		return $this->binds;
	}
}