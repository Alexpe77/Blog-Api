<?php

// require_once 'config/routes.php';
include 'config/routes.php';

ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', 'error.log');

echo "Hello from index page";

$router->run();