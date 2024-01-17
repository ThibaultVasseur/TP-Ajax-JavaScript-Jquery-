    
    // Attache un gestionnaire d'événements au formulaire avec l'ID 'loginForm' lors de sa soumission
 $('#loginForm').submit(function (event) {
        
        // Empêche le comportement par défaut du formulaire (par exemple, le rechargement de la page)
        event.preventDefault();

        // Récupère les données du formulaire
        var formData = {
            loginUsername: $('#loginUsername').val(),
            loginPassword: $('#loginPassword').val()
        };

        // Fait une requête AJAX au serveur
        $.ajax({
            type: 'POST',                     // Méthode de requête
            url: 'controller/loginHandler.php',          // L'URL vers laquelle la requête est envoyée
            data: formData,                   // Les données à envoyer
            dataType: 'json',                 // Type de données attendues en retour
            encode: true                      // Encode les données
        })
        // Si la requête AJAX réussit
        .done(function (data) {
            // Si la connexion est réussie (selon la réponse du serveur)
            if (data.success) {
                alert('Connexion réussie!');  // Affiche une alerte à l'utilisateur
                // Affiche le message renvoyé par le serveur dans l'élément avec l'ID 'loginResult'
                $('#loginResult').html('<p>' + data.message + '</p>');
                // Redirige l'utilisateur vers 'home.php'
                window.location.href = 'home.php';
            } else {
                // Si la connexion échoue, affiche le message d'erreur renvoyé par le serveur
                $('#loginResult').html('<p>' + data.message + '</p>');
            }
        })
        // Si la requête AJAX échoue
        .fail(function (data) {
            // Affiche un message d'erreur dans la console
            console.error('Une erreur s\'est produite lors de la connexion.');
        });
    });

