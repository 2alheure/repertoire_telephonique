<?php require __DIR__ . '/parties/haut_de_page.html.php'; ?>

<h1>Se connecter</h1>

<?php if (isset($erreur)) { ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erreur</strong> <?php echo $erreur; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>

<form action="<?php echo BASE_URL; ?>/connexion" method="POST">
    <div class="form-group">
        <label for="login">Identifiant</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Identifiant" required autofocus>
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require __DIR__ . '/parties/bas_de_page.html.php'; ?>