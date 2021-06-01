<!doctype html>
<html lang="en">

<head>
    <title>Répertoire téléphonique</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/style.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/contacts">Contacts</a>
                    </li>

                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/ajouter-contact">Ajouter un contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/deconnexion">Se déconnecter</a>
                        </li>

                    <?php } else { ?>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/connexion">Se connecter</a>
                        </li>

                    <?php } ?>


                </ul>
            </div>
        </nav>