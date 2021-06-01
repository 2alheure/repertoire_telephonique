<?php require __DIR__ . '/../parties/haut_de_page.html.php'; ?>

<h1>Ajouter un contact</h1>

<form action="<?php echo BASE_URL; ?>/ajouter-contact-handler" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required autofocus>
    </div>

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label for="num">Numéro de téléphone</label>
        <input type="tel" class="form-control" name="num" id="num" placeholder="Numéro de téléphone" required>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="Image" required>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter ce contact</button>
</form>

<?php require __DIR__ . '/../parties/bas_de_page.html.php'; ?>