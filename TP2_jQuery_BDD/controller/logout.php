<?php
session_start();
header('Location: view/home/acceuil.php');
session_destroy();
echo"Vous allez être rediriger vers la page d'accueil";
exit();
?>