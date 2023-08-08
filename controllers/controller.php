<?php
require_once './models/model.php';

class Controller {
    public function getAllPostsAsJSON()
    {
        $postModel = new Post();
        $posts = $postModel->getAllPosts();

        header('Content-Type: json');
        echo json_encode($posts);
    }

    public function error404() {
        return "Erreur 404";
    }
}