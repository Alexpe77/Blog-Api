<?php

require_once 'config/databasemanager.php';

class Post
{

    private $db;

    public function __construct()
    {
        $this->db = DatabaseManager::getInstance();
    }

    public function getAllPosts()
    {
        $query = "SELECT id, title, body, author, created_at, updated_at
        FROM posts";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllPostsAsJSON(){
        $posts = $this->getAllPosts();
        header('Content-Type: application/json');
        echo json_encode($posts);
    }
}
