<?php

$files = [
	__DIR__ . '\\core\\Application.php',
	__DIR__ . '\\core\\Routing\\Router.php',
	__DIR__ . '\\core\\Http\\Response.php',

	// Controllers
	__DIR__ . '\\app\\controller\\TestController.php',
];

foreach ($files as $file) {
	require_once($file);
}