<?php

/**
 * Redirige vers une autre URL
 * 
 * @param string $ou Le fragment d'URL auquel rediriger
 */
function rediriger(string $ou) {
    header('location: ' . BASE_URL . $ou);  // La redirection
    die();  // Pour empêcher du code superflu de s'exécuter
}

/**
 * Vérifie la session et,
 * si elle est invalide,
 * affiche une page d'erreur
 */
function verifier_session() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        // Si la session est invalide
        // Affiche une erreur "accès interdit" (403)
        require __DIR__ . '/views/erreur/403.html.php';
        die();
    }
}
