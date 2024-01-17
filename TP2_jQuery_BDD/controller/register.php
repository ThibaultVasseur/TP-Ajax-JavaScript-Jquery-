<?php
// Démarrage de la session PHP pour pouvoir utiliser des variables de session
header('Content-Type: application/json');
include 'model/connBDD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && !empty($_POST['username']) && 
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password'])) {
        
        // Récupération des données envoyées par le formulaire
        $username = $_POST['username'];
        $email = $_POST['email'];

        // Hachage du mot de passe avec l'algorithme BCRYPT pour des raisons de sécurité
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);}}

// Préparation de la requête pour vérifier si l'adresse e-mail entrée est déjà présente dans la base de données
$stmt = $pdo->prepare('SELECT email FROM user WHERE email = ?');
$stmt->execute([$email]);
$existingUser = $stmt->fetch();

// Si un utilisateur avec cette adresse e-mail est trouvé, on renvoie une erreur
if ($existingUser) {
    echo json_encode(array('success' => false, 'message' => 'Adresse mail déjà utilisée.'));
    exit(); // Arrêt du script pour éviter toute exécution ultérieure
}

// Si l'adresse e-mail n'est pas trouvée, on continue en insérant le nouvel utilisateur dans la base de données
$stmt = $pdo->prepare('INSERT INTO user (username, email, password) VALUES (?, ?, ?)');
$result = $stmt->execute([$username, $email, $password]);

// Si l'insertion est réussie, on renvoie un message de succès et on met à jour la session avec le nom d'utilisateur
if ($result) {
    $_SESSION['username'] = $username;  
    echo json_encode(array('success' => true, 'message' => 'Inscription réussie!'));
} else {
    // Si une erreur survient lors de l'insertion, on renvoie un message d'erreur
    echo json_encode(array('success' => false, 'message' => 'Erreur lors de l\'inscription.'));
}
?>
