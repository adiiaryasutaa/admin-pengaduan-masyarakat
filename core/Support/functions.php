<?php

use Core\Application;
use Core\View\View;

function asset(string $path)
{
	return Application::getHost() . "\\$path";
}

function view(string $view, array $data = [], array $nests = [])
{
	return new View($view, $data, $nests);
}

function route(string $route)
{
	return Application::getHost() . "\\$route";
}