<?php

use App\Controller\AduanController;
use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\ProfileController;
use Core\Application;

$router = Application::getRouter();

$router->get('/', [HomeController::class, 'index']);

$router->get('/profil', [ProfileController::class, 'index']);

$router->get('/aduan', [AduanController::class, 'showAll']);

$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->post('/logout', [AuthController::class, 'logout']);