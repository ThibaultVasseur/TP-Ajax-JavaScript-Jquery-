<!-- Formulaire d'inscription -->
<div class="container">
    <h2>Inscription</h2>
    <<form method="post" id="registrationForm" action="controller/register.php">

        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Adresse email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        
        <button id="idImg" type="submit">S'inscrire</button>
    </form>
    <div id="registrationResult"></div> <!-- Résultat de l'inscription sera affiché ici -->
</div>