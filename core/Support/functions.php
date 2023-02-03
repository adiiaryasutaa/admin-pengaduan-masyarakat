<?php

use Core\Application;

function asset(string $path)
{
	return Application::getHost() . "\\$path";
}