<?php

class Article {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM articles")->fetchAll();
    }
}
