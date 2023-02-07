<?php

use Core\Application;
use Core\Routing\Redirector;
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
	$uri = Application::getHost();

	return "$uri$route";
}

function session()
{
	return Application::getSession();
}

function auth()
{
	return Application::getAuth();
}

function redirect(string $to, int $status = 302)
{
	$response = Redirector::to($to);
	$response->setStatus($status);
	return $response;
}

function back(int $status = 302)
{
	$response = Redirector::back();
	$response->setStatus($status);
	return $response;
}

function dd(...$values)
{
	echo "<pre>";
	var_dump(...$values);
	echo "</pre>";
	exit();
}