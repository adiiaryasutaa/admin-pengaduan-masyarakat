<?php

require_once(__DIR__ . '\\..\\loader.php');

use Core\Application;

$app = new Application([
	'host' => 'http://admin-pengaduan-masyarakat.test',
	'paths' => [
		'route' => __DIR__ . '\\..\\app\\routes\\index.php',
		'controller' => __DIR__ . '\\..\\app\\controller',
		'view' => __DIR__ . '\\..\\views',
	]
]);

$app->start();