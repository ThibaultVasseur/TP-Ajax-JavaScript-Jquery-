<?php
// Connexion à la base de données
try {
    $pdo = new PDO('mysql:host=localhost;dbname=blogsjt', 'root', '');
} catch (PDOException $e) {
    echo json_encode(array('success' => false, 'message' => 'Erreur de connexion à la base de données.'));
    exit();
}