<?php
session_start();
header('Content-Type: application/json');
include 'model/connBDD.php';

// Récupérer les données du formulaire
$loginUsername = $_POST['loginUsername'];
$loginPassword = $_POST['loginPassword'];

// Préparer la requête SQL pour récupérer l'utilisateur
$stmt = $pdo->prepare('SELECT * FROM user WHERE username = ?');
$stmt->execute([$loginUsername]);
$user = $stmt->fetch();

// Vérifier le mot de passe
if ($user && password_verify($loginPassword, $user['password'])) {
    $_SESSION['username'] = $user['username'];  // Mémoriser l'utilisateur connecté dans la session
    echo json_encode(array('success' => true, 'message' => 'Connexion réussie!'));
} else {
    echo json_encode(array('success' => false, 'message' => 'Identifiants incorrects.'));
}
?>
