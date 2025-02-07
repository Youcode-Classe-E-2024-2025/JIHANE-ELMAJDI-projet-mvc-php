<?php

class ArticleController {
    public function index() {
        $articleModel = new Article();
        $articles = $articleModel->getAll();
        require_once '../app/views/articles/index.php';
    }
}
