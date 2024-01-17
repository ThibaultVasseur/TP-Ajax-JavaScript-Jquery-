<main>
    <?php
    // Vérifier si l'utilisateur est connecté pour personnaliser le message de bienvenue
    if (isset($_SESSION['username'])) {
        echo "<h1>Bienvenue sur le site, " . htmlspecialchars($_SESSION['username']) . "</h1>";
    } else {
        echo "<h1>Connectez vous</h1>";
    }
    ?>
    <!-- Formulaire de déconnexion -->
    <form action="controller/logout.php" method="post">
        <button type="submit">Déconnexion</button>
    </form>
</main>
</body>
</html>
