<?php

namespace Core;

use App\Model\Petugas;
use Core\Auth\AuthManager as Auth;
use Core\Http\Request;
use Core\Routing\Router;
use Core\Session\Store as Session;
use Core\Database\Connection as Database;

class Application
{
	protected static string $host;
	protected static string $routePath;
	protected static string $controllerPath;
	protected static string $viewPath;

	protected static self$selfInstance;
	protected static Router $router;
	protected static Request $request;
	protected static Session $session;
	protected static Database $database;
	protected static Auth $auth;

	public function __construct(array $options)
	{
		self::$selfInstance = $this;
		self::$router = new Router();
		self::$request = new Request();
		self::$session = new Session();
		self::$database = new Database();
		self::$auth = new Auth();

		self::$host = $options['host'];
		self::$routePath = $options['paths']['route'];
		self::$controllerPath = $options['paths']['controller'];
		self::$viewPath = $options['paths']['view'];

		$this->registerRoutes();
		self::$auth->setAuthenticatebleModel(Petugas::class);
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

	public static function getRequest()
	{
		return self::$request;
	}

	public static function getSession()
	{
		return self::$session;
	}

	public static function getDatabase()
	{
		return self::$database;
	}

	public static function getAuth()
	{
		return self::$auth;
	}
}