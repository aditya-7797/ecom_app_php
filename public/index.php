<?php

$config = require __DIR__ . '/../config/app.php';

require __DIR__ . '/../app/controllers/HomeController.php';
require __DIR__ . '/../app/controllers/ProductController.php';

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/public/index.php')), '/');

if ($scriptDir !== '' && str_starts_with($requestPath, $scriptDir)) {
	$requestPath = substr($requestPath, strlen($scriptDir)) ?: '/';
}

$requestPath = rtrim($requestPath, '/');
$requestPath = $requestPath === '' ? '/' : $requestPath;

$homeController = new HomeController($config);
$productController = new ProductController($config);

if (preg_match('#^/products/(\d+)$#', $requestPath, $matches) === 1) {
	$productController->show((int) $matches[1]);
	exit;
}

switch ($requestPath) {
	case '/':
		$homeController->index();
		break;

	case '/products':
		$productController->index();
		break;

	default:
		http_response_code(404);
		$title = $config['app_name'] . ' | Not Found';
		$heading = '404 - Page Not Found';
		$message = 'No route is defined for this URL yet.';
		$environment = $config['environment'];
		$baseUrl = $config['base_url'];
		require __DIR__ . '/../app/views/home.php';
		break;
}
