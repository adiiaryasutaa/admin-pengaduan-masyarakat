<?php

use App\Controller\AduanController;
use App\Controller\AuthController;
use App\Controller\HomeController;
use Core\Application;

$router = Application::getRouter();

$router->get('/', [HomeController::class, 'index']);

$router->get('/aduan', [AduanController::class, 'showAll']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);