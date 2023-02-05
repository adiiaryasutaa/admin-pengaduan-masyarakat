<?php

namespace Core\Session;

use Core\Support\Arr;

class Store
{
	protected array $attributes;

	public function __construct()
	{
		$this->start();
		$this->attributes = & $_SESSION;
	}

	public function start()
	{
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
	}

	public function get(string $key, $default = null)
	{
		$this->start();

		return Arr::get($this->attributes, $key, $default);
	}

	public function set(string $key, $value): self
	{
		$this->start();

		Arr::set($this->attributes, $key, $value);

		return $this;
	}

	public function remove(string $key): void
	{
		$this->start();

		Arr::remove($this->attributes, $key);
	}

	public function pull(string $key, $default = null)
	{
		$value = $this->get($key, $default);
		$this->remove($key);
		return $value;
	}

	public function clear(): void
	{
		$this->start();

		session_unset();
	}

	public function has(string $key): bool
	{
		$this->start();

		return Arr::has($_SESSION, $key);
	}
}