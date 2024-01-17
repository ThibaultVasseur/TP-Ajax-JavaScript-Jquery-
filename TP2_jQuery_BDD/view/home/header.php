<?php session_start()?>
    <header>
        <!-- Navigation du site -->
        <nav class="ClassHeader">
    <ul class="classNavUl">
    <li><a href="index.php?acceuil">Accueil</a></li>
        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="controller/logout.php">Déconnexion</a></li>
        <?php else: ?>
            <li><a href="index.php?register">Inscription</a></li>
            <li><a href="index.php?login">Connexion</a></li>
        <?php endif; ?>
    </ul>
</nav>
    </header>
