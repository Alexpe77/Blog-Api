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

        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $escapedRows = array_map(function ($row) {
            return array_map('htmlspecialchars', $row);
        }, $rows);

        return $escapedRows;
    }

    public function createPost($title, $body, $author) {

        $query = "INSERT INTO posts (title, body, author) VALUES (:title, :body, :author)";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':body', $body, PDO::PARAM_STR);
        $statement->bindParam(':author', $author, PDO::PARAM_STR);
        $statement->execute();
    }

    public function getPostById($postId) {

        $query = "SELECT id, title, body, author, created_at, updated_at FROM posts WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $postId]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function updatePost($postId, $title, $body, $author) {
        $query = "UPDATE posts SET title = :title, body = :body, author = :author WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':id', $postId, PDO::PARAM_INT);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':body', $body, PDO::PARAM_STR);
        $statement->bindParam(':author', $author, PDO::PARAM_STR);
        $statement->execute();
    }

    public function deletePost($postId) {
        $query = "DELETE FROM posts WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->bindParam(':id', $postId, PDO::PARAM_INT);
        $statement->execute();
    }

}