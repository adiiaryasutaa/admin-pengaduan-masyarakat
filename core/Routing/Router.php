<?php

namespace Core\Routing;

use Closure;
use Core\Http\Request;
use Core\Http\Response;

class Router
{
	protected array $routes = [];

	public function addRoute(string $method, string $uri, array |callable $action)
	{
		$this->routes[$method][$uri] = $this->makeCallableAction($action);
	}

	public function get(string $uri, array |callable $action)
	{
		$this->addRoute('GET', $uri, $action);
	}

	public function post(string $uri, array |callable $action)
	{
		$this->addRoute('POST', $uri, $action);
	}

	public function makeCallableAction($action)
	{
		if (is_array($action)) {
			return function () use ($action) {
				return call_user_func([new $action[0], $action[1]]);
			};
		}

		return $action;
	}

	protected function getActionWithParameters()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$uri = $_SERVER['REQUEST_URI'];

		if (isset($this->routes[$method][$uri])) {
			return $this->routes[$method][$uri];
		}

		return null;
	}

	public function resolve()
	{
		$action = $this->getActionWithParameters();

		if (is_null($action)) {
			return new Response('404 | Not Found', 404);
		}

		$result = $action();

		if (!$result instanceof Response) {
			$result = new Response($result ?? '');
		}

		return $result;
	}
}