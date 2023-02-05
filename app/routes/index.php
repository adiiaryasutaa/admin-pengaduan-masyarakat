<?php

use App\Controller\AuthController;
use App\Controller\HomeController;
use Core\Application;

$router = Application::getRouter();

$router->get('/', [HomeController::class, 'index']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);