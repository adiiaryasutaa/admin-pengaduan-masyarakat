<?php

namespace Core;

use Core\Routing\Router;

class Application
{
	protected static string $host;
	protected static string $routePath;
	protected static string $controllerPath;
	protected static string $viewPath;

	protected static self$selfInstance;
	protected static Router $router;

	public function __construct(array $options)
	{
		self::$selfInstance = $this;
		self::$router = new Router();

		self::$host = $options['host'];
		self::$routePath = $options['paths']['route'];
		self::$controllerPath = $options['paths']['controller'];
		self::$viewPath = $options['paths']['view'];

		$this->registerRoutes();
		//$this->includeAllControllers();
	}

	protected function registerRoutes()
	{
		require_once(self::$routePath);
	}

	protected function includeAllControllers()
	{
		$files = array_diff(scandir(self::$controllerPath), array('..', '.'));

		foreach ($files as $file) {

		}

		echo "<pre>";
		var_dump($files);
		echo "</pre>";
		die();
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

	public static function getViewPath()
	{
		return self::$viewPath;
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