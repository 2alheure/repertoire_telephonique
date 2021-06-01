<?php require __DIR__ . '/../parties/haut_de_page.html.php'; ?>

<h1>Modifier un contact</h1>

<?php if (isset($erreur)) { ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erreur</strong> <?php echo $erreur; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>

<?php if (isset($information)) { ?>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Information</strong> <?php echo $information; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php } ?>

<form action="<?php echo BASE_URL; ?>/modifier-contact?id=<?php echo $contact->id; ?>" method="POST">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $contact->nom; ?>" placeholder="Nom" required autofocus>
    </div>

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $contact->prenom; ?>" placeholder="Prénom" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" value="<?php echo $contact->email; ?>" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label for="num">Numéro de téléphone</label>
        <input type="tel" class="form-control" name="num" id="num" value="<?php echo $contact->num_tel; ?>" placeholder="Numéro de téléphone" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter ce contact</button>
</form>

<?php require __DIR__ . '/../parties/bas_de_page.html.php'; ?>