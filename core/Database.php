<?php

namespace Core;

use PDO;
use PDOException;

class Database {
    private $host = "localhost";
    private $port = "5433"; 
    private $dbname = "projet_mvc";
    private $username = "postgres"; 
    private $password = "1234"; 
    private $pdo;

    public function __construct() {
        try {
            $dsn = "pgsql:host=localhost;port=5433;dbname=projet_mvc";
            $this->pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
                PDO::ATTR_EMULATE_PREPARES => false 
            ]);

            echo 'DB';
        } catch (PDOException $e) {
            echo 'not';
            die("Erreur de connexion : " . $e->getMessage());
            
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
