<?php

const LOGIN_ADMIN = 'admin';
const PASSWORD_ADMIN = 'test';

/**
 * Gère le formulaire de connexion
 * Et sa soumission
 */
function se_connecter() {

    if (!empty($_POST)) {
        // Si $_POST n'est pas vide
        // Ca veut dire que l'utilisateur a soumis le formulaire


        // On vérifie le contenu du formulaire
        if (
            !empty($_POST['login'])
            && !empty($_POST['password'])

            // On vérifie la concordance des identifiants + mdp
            && $_POST['login'] == LOGIN_ADMIN
            && $_POST['password'] == PASSWORD_ADMIN
        ) {

            // session_start(); // (Fait dans le router)
            // $_SESSION; // On peut à présent utiliser $_SESSION
            $_SESSION['role'] = 'admin';

            rediriger('/accueil');
        } else {
            $erreur = 'Mauvais identifiant ou mot de passe.';
        }
    }

    require __DIR__ . '/../../views/connexion.html.php';
}

/**
 * Déconnecte l'utilisateur
 * (Détruit la session)
 */
function se_deconnecter() {
    session_start(); // Obligé de récupérer la session courante 

    session_destroy(); // Pour pouvoir la détruire

    rediriger('/accueil');
}
