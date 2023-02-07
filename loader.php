<?php

$files = [
	// Application
	__DIR__ . '\\core\\Application.php',

	// Database
	__DIR__ . '\\core\\Database\\Connection.php',
	__DIR__ . '\\core\\Database\\Model.php',
	__DIR__ . '\\core\\Database\\QueryBuilder.php',

	// Auth
	__DIR__ . '\\core\\Auth\\AuthManager.php',

	// Routing
	__DIR__ . '\\core\\Routing\\Redirector.php',
	__DIR__ . '\\core\\Routing\\Router.php',

	// Session
	__DIR__ . '\\core\\Session\\Store.php',

	// Http
	__DIR__ . '\\core\\Http\\Request.php',
	__DIR__ . '\\core\\Http\\Response.php',
	__DIR__ . '\\core\\Http\\RedirectResponse.php',

	// View
	__DIR__ . '\\core\\View\\View.php',
	__DIR__ . '\\core\\View\\LayoutContract.php',

	// Support
	__DIR__ . '\\core\\Support\\Arr.php',
	__DIR__ . '\\core\\Support\\helpers.php',

	// Controllers
	__DIR__ . '\\app\\controller\\Controller.php',
	__DIR__ . '\\app\\controller\\HomeController.php',
	__DIR__ . '\\app\\controller\\AduanController.php',
	__DIR__ . '\\app\\controller\\AuthController.php',
	__DIR__ . '\\app\\controller\\ProfileController.php',

	// Models
	__DIR__ . '\\app\\model\\Petugas.php',
	__DIR__ . '\\app\\model\\Aduan.php',

	// Layouts
	__DIR__ . '\\app\\layout\\MainLayout.php',
	__DIR__ . '\\app\\layout\\AuthLayout.php',
];

foreach ($files as $file) {
	require_once($file);
}