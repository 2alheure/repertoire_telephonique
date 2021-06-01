<?php

// On anticipe l'utilisation de la variable $_SESSION
session_start();


// On fait des constantes utiles pour éviter les copier coller
const BASE_URL = 'http://localhost/test/repertoire_telephonique/router.php';
const ASSETS_URL = 'http://localhost/test/repertoire_telephonique/assets';

// On inclut nos fonctions pour pouvoir en bénéficier partout
require __DIR__ . '/functions.php';


// On inclut SimpleOrm pour l'avoir à disposition partout
require __DIR__ . '/SimpleOrm.class.php';
// On se connecte à la BDD ici, pour que ce soit disponible partout
$connexion = new mysqli('localhost', 'root', '');
SimpleOrm::useConnection($connexion, 'repertoire_telephonique');


// $_SERVER['PATH_INFO'];      // Ce qu'il y a après le dernier "/" de l'URL

// S'il n'y a rien dans $_SERVER['PATH_INFO']
if (!isset($_SERVER['PATH_INFO'])) {
    // Afficher la page d'accueil

    require __DIR__ . '/src/controllers/accueil_controller.php'; // Je vais chercher le fichier du contrôleur
    afficher_la_page_d_accueil();   // On appelle 
} else {

    // On teste la valeur de nos URL
    // if ($_SERVER['PATH_INFO'] == '/accueil') {
    //     // Afficher la page d'accueil

    //     require __DIR__ . '/src/controllers/accueil_controller.php'; // Je vais chercher le fichier du contrôleur
    //     afficher_la_page_d_accueil();   // On appelle la fonction du contrôleur


    // } elseif ($_SERVER['PATH_INFO'] == '/contacts') {
    //     // On affiche la liste des contacts

    //     include __DIR__ . '/src/controllers/contacts_controller.php';
    //     afficher_les_contacts();
    // }

    switch ($_SERVER['PATH_INFO']) {
        case '/accueil':
            // Afficher la page d'accueil
            require __DIR__ . '/src/controllers/accueil_controller.php'; // Je vais chercher le fichier du contrôleur
            afficher_la_page_d_accueil();   // On appelle la fonction du contrôleur
            break;



        case '/contacts':
            // On affiche la liste des contacts
            include __DIR__ . '/src/controllers/contacts_controller.php';
            afficher_les_contacts();
            break;



        case '/ajouter-contact':
            // On affiche le formulaire d'ajout de contact
            include __DIR__ . '/src/controllers/contacts_controller.php';
            ajouter_contact();
            break;



        case '/ajouter-contact-handler':
            // On gère la soumission du formulaire d'ajout de contact
            include __DIR__ . '/src/controllers/contacts_controller.php';
            soumission_ajouter_contact();
            break;



        case '/modifier-contact':
            // On gère la soumission du formulaire d'ajout de contact
            include __DIR__ . '/src/controllers/contacts_controller.php';
            modifier_contact();
            break;



        case '/supprimer-contact':
            // On gère la soumission du formulaire d'ajout de contact
            include __DIR__ . '/src/controllers/contacts_controller.php';
            supprimer_contact();
            break;



        case '/connexion':
            // On gère la soumission du formulaire d'ajout de contact
            include __DIR__ . '/src/controllers/connexion_controller.php';
            se_connecter();
            break;



        case '/deconnexion':
            // On gère la soumission du formulaire d'ajout de contact
            include __DIR__ . '/src/controllers/connexion_controller.php';
            se_deconnecter();
            break;



        default:
            // Afficher une 404 ?
            include_once __DIR__ . '/src/controllers/erreur_controller.php';
            afficher_page_404();
    }
}
