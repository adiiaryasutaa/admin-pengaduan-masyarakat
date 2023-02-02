<?php
use App\Controller\TestController;
use Core\Application;

$router = Application::getRouter();

$router->get('/', function () {
	return 'Hello';
});

$router->get('/test', [TestController::class, 'index']);