<?php

$files = [
	__DIR__ . '\\core\\Application.php',
	__DIR__ . '\\core\\Routing\\Router.php',
	__DIR__ . '\\core\\Http\\Response.php',
	__DIR__ . '\\core\\View\\View.php',
	__DIR__ . '\\core\\View\\LayoutContract.php',
	__DIR__ . '\\core\\Support\\functions.php',

	// Controllers
	__DIR__ . '\\app\\controller\\HomeController.php',

	// Layouts
	__DIR__ . '\\app\\layout\\MainLayout.php',
];

foreach ($files as $file) {
	require_once($file);
}