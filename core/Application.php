<?php

namespace Core;

use Core\Routing\Router;

class Application
{
	protected static string $host;
	protected static string $routePath;

	protected static self$selfInstance;
	protected static Router $router;

	public function __construct(array $options)
	{
		self::$selfInstance = $this;
		self::$router = new Router();

		self::$host = $options['host'];
		self::$routePath = $options['paths']['route'];

		$this->registerRoutes();
	}

	protected function registerRoutes()
	{
		require_once(self::$routePath);
	}

	public function start()
	{
		$reponse = self::$router->resolve();

		$reponse->send();
	}

	public static function getHost()
	{
		return self::$host;
	}

	public static function getInstance()
	{
		return self::$selfInstance;
	}

	public static function getRouter()
	{
		return self::$router;
	}
}