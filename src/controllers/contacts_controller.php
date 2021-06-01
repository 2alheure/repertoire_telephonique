<?php

// On appelle notre modèle
require __DIR__ . '/../models/Contacts.php';

/**
 * Affiche les contacts contenus dans ma table `contacts`
 */
function afficher_les_contacts() {
    $contacts = Contacts::all(); // On récupère TOUS nos contacts

    require __DIR__ . '/../../views/contacts/liste.html.php';
}

/**
 * Affiche le formulaire d'ajout de contact
 */
function ajouter_contact() {
    verifier_session();
    require __DIR__ . '/../../views/contacts/ajouter.html.php';
}

/**
 * Gère la soumission du formulaire d'ajout de contact
 */
function soumission_ajouter_contact() {
    verifier_session();

    if (
        // On vérifie qu'on reçoit ce qu'on veut
        !empty($_POST['nom'])
        && !empty($_POST['prenom'])
        && !empty($_POST['email'])
        && !empty($_POST['num'])

        // On vérifie que l'email est bien un email
        && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false

        // On vérifie que le num "a la forme d'un n° de tel"
        // Expression régulière = Regular Expression = Regex
        && preg_match('#(0|\+33|0033)[1-9][0-9]{8}#', $_POST['num'])
    ) {



        // On a toutes nos valeurs
        // Et elles sont correctes

        // On crée un contact (vide par défaut)
        $contact = new Contacts;

        // On remplit le contact
        $contact->nom = $_POST['nom'];
        $contact->prenom = $_POST['prenom'];
        $contact->email = $_POST['email'];
        $contact->num_tel = $_POST['num'];

        // On sauvegarde le contact
        $contact->save();

        // On redirige vers /contacts
        rediriger('/contacts');
    } else {
        // Il nous manque quelque chose

        // On affiche un message d'erreur
        // echo 'T\'es nul t\'as mal rempli le formulaire.';

        // Ou bien on redirige vers /ajouter-contact
        rediriger('/ajouter-contact');
    }
}

/**
 * Affiche le formulaire de modification de contact
 * Et gère la soumission du formulaire de mofication
 */
function modifier_contact() {

    verifier_session();

    // $_GET['id']; // Mon paramètre d'URL "id"

    if (empty($_GET['id'])) {
        // Si mon paramètre d'URL est vide
        // J'affiche une erreur
        require __DIR__ . '/../../views/erreur/generique.html.php';
        die();
    }

    // On récupère le contact dont l'id vaut $_GET['id']
    $contact = Contacts::retrieveByPK($_GET['id']);

    if (!empty($_POST)) {
        // Si le $_POST n'est pas vide
        // Ca veut dire qu'on a soumis le formulaire

        if (
            // On vérifie qu'on reçoit ce qu'on veut
            !empty($_POST['nom'])
            && !empty($_POST['prenom'])
            && !empty($_POST['email'])
            && !empty($_POST['num'])

            // On vérifie que l'email est bien un email
            && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false

            // On vérifie que le num "a la forme d'un n° de tel"
            && preg_match('#(0|\+33|0033)[1-9][0-9]{8}#', $_POST['num'])
        ) {
            // On modifie le contact
            $contact->nom = $_POST['nom'];
            $contact->prenom = $_POST['prenom'];
            $contact->email = $_POST['email'];
            $contact->num_tel = $_POST['num'];

            // On sauvegarde le contact
            $contact->save();

            // Message d'information (affiché dans la vue)
            $information = 'Contact modifié.';
        } else {
            // Message d'erreur (affiché dans la vue)
            $erreur = 'Tu as mal rempli le formulaire.';
        }
    }

    require __DIR__ . '/../../views/contacts/modifier.html.php';
}

/**
 * Supprime un contact
 */
function supprimer_contact() {

    verifier_session();

    if (empty($_GET['id'])) {
        // S'il manque le paramètre d'URL, ou s'il est vide

        // J'affiche une erreur
        require __DIR__ . '/../../views/erreur/generique.html.php';
        die();
    }

    // Je récupère le contact grâce à son id
    // $contact = Contacts::retrieveByPK($_GET['id']);

    $contact = Contacts::retrieveByField('id', $_GET['id'], SimpleOrm::FETCH_ONE);

    if ($contact == null) {
        // Si le contact est null
        // Il a pas été trouvé

        // J'affiche une erreur 404
        require __DIR__ . '/../../views/erreur/404.html.php';
        die();
    }

    // Je supprime le contact
    $contact->delete();

    // On redirige vers /contacts
    rediriger('/contacts');
}
