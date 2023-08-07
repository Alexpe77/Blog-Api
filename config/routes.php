<?php

require_once '../vendor/autoload.php';
require_once '../controllers/controller.php';

use Bramus\Router\Router;

$router = new Router();

$router->get('/api/v1/posts', function() {
    $postModel = new Post();
    $postModel->getAllPostsAsJSON();
});

$router->run();