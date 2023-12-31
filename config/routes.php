<?php

use Bramus\Router\Router;

require_once __DIR__ . '/../vendor/autoload.php';
require_once './models/model.php';
require_once './controllers/controller.php';

$controller = new Controller();
$router = new Router();

$router->get('/', [$controller, 'getAllPostsAsJSON']);

$router->get('/posts', [$controller, 'getAllPostsAsJSON']);

$router->get('/post/(\d+)', [$controller, 'getPostById']);

$router->post('/post', [$controller, 'createPost']);

$router->put('/post/(\d+)', [$controller, 'updatePost']);

$router->delete('/post/(\d+)', [$controller, 'deletePost']);