<?php

use Bramus\Router\Router;

require_once __DIR__ . '/../vendor/autoload.php';
require_once './models/model.php';
require_once './controllers/controller.php';

$controller = new Controller();
$router = new Router();

$router->get('/posts', [$controller, 'getAllPostsAsJSON']);

$router->get('/post/{id}', [$controller, 'getPostById']);

$router->post('/post', [$controller, 'createPost']);

$router->put('/post/{id}', [$controller, 'updatePost']);

$router->delete('/post/{id}', [$controller, 'deletePost']);

$router->run();