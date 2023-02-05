<?php

namespace Core\Http;

class Request
{
	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	public function uri()
	{
		return $_SERVER['REQUEST_URI'];
	}

	public function only(array $names)
	{
		$data = [];

		foreach ($names as $name) {
			$data[$name] = ($this->method() === 'GET' ? $_GET[$name] : $_POST[$name]) ?? null;
		}

		return $data;
	}
}