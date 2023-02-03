<?php

use App\Controller\HomeController;
use Core\Application;

$router = Application::getRouter();

$router->get('/', [HomeController::class, 'index']);