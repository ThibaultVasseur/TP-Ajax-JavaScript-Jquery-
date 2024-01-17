$(document).ready(function () {
    // Lorsque le formulaire d'inscription est soumis
    $('#registrationForm').submit(function (event) {
        event.preventDefault();

        // Collecter les données du formulaire
        var formData = {
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };

        // Envoyer les données au serveur via AJAX
        $.ajax({
            type: 'POST',
            url: 'controller/register.php',
            data: formData,
            dataType: 'json',
            encode: true
        })
        .done(function (data) {
            // Afficher le message renvoyé par le serveur
            $('#registrationResult').html('<p>' + data.message + '</p>');
            
            // Si l'inscription est réussie, redirection vers home.php
            if (data.success) {
                alert('Inscription réussie! Redirection vers home.php'); 
                window.location.href = 'view/home.php';//redirection sur la page home
            }
        })
        .fail(function (data) {
            console.error('Une erreur s\'est produite lors de l\'inscription.');
        });
    });
});
