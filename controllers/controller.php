<?php
require_once './models/model.php';

class Controller
{
    public function getAllPostsAsJSON()
    {
        $postModel = new Post();
        $posts = $postModel->getAllPosts();

        header('Content-Type: application/json');
        echo json_encode($posts);
    }

    public function createPost()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postData = json_decode(file_get_contents('php://input'), true);

            if (
                isset($postData['title']) &&
                isset($postData['body']) &&
                isset($postData['author'])
            ) {
                $postModel = new Post();

                $postModel->createPost(
                    $postData['title'],
                    $postData['body'],
                    $postData['author']
                );
                header('Content-Type: application/json');
                echo json_encode(['message' => 'Post created successfully']);
            } else {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['error' => 'Missing data']);
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(405);
            echo json_encode(['error' => 'Unauthorized method']);
        }
    }

    public function getPostById($postId)
    {
        $postId = (int)$postId;

        if ($postId > 0) {
            $postModel = new Post();

            $post = $postModel->getPostById($postId);

            if ($post) {
                header('Content-Type: application/json');
                echo json_encode($post);
            } else {

                header('Content-Type: application/json');
                http_response_code(404);
                echo json_encode(['error' => 'Post not found']);
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(['error' => 'ID not valid']);
        }
    }

    public function updatePost($postId)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $postData = json_decode(file_get_contents('php://input'), true);
            if (
                isset($postData['title']) &&
                isset($postData['body']) &&
                isset($postData['author'])
            ) {
                $postId = (int)$postId;

                if ($postId > 0) {
                    $postModel = new Post();

                    $postModel->updatePost(
                        $postId,
                        $postData['title'],
                        $postData['body'],
                        $postData['author']
                    );

                    header('Content-Type: application/json');
                    echo json_encode(['message' => 'Post updated successfully']);
                } else {
                    header('Content-Type: application/json');
                    http_response_code(400);
                    echo json_encode(['error' => 'ID not valid']);
                }
            } else {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['error' => 'Missing data']);
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(405);
            echo json_encode(['error' => 'Unauthorized method']);
        }
    }

    public function deletePost($postId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $postId = (int)$postId;

            if ($postId > 0) {
                $postModel = new Post();

                $postModel->deletePost($postId);

                header('Content-Type: application/json');
                echo json_encode(['message' => 'Post deleted successfully']);
            } else {
                header('Content-Type: application/json');
                http_response_code(400);
                echo json_encode(['error' => 'ID not valid']);
            }
        } else {
            header('Content-Type: application/json');
            http_response_code(405);
            echo json_encode(['error' => 'Unauthorized method']);
        }
    }
}
