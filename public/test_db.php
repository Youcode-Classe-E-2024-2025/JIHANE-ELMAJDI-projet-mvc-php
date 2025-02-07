<?php

require_once "../core/Database.php";

use Core\Database;

$db = new Database();
$conn = $db->getConnection();

if ($conn) {
    echo "✅ Connexion réussie à PostgreSQL !<br>";

   
    $query = "SELECT * FROM users";
    $stmt = $conn->query($query);
    $users = $stmt->fetchAll();

    if ($users) {
        echo "Voici les utilisateurs :<br>";
        print_r($users); 
    } else {
        echo "Aucun utilisateur trouvé ou la table est vide.";
    }
} else {
    echo "❌ Échec de la connexion.";
}
