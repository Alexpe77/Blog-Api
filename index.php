<?php

include 'config/routes.php';

ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', 'error.log');

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $urlPath);
$route = isset($parts[2]) ? $parts[2] : '';

$validRoutes = ['', 'posts'];

foreach ($validRoutes as $validRoute) {
    if (strpos($route, $validRoute) === 0) {
        $isValidRoute = true;
        break;
    }
}

if (!$isValidRoute) {
    header('Location: /Blog-Api/posts');
    exit;
}

$router->run();