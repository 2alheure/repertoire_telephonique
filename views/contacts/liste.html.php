<?php require __DIR__ . '/../parties/haut_de_page.html.php'; ?>

<h1>Mes contacts</h1>

<div class="row">
    <?php foreach ($contacts as $c) { ?>

        <div class="col-12 col-md-5 rounded border shadow m-4">
            <h2><?php echo $c->prenom . ' ' . strtoupper($c->nom); ?></h2>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>

                <p>
                    <a href="mailto:<?php echo $c->email; ?>"><?php echo $c->email; ?></a><br>
                    <a href="tel:<?php echo $c->num_tel; ?>"><?php echo $c->num_tel; ?></a>
                </p>
                <p>
                    <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/modifier-contact?id=<?php echo $c->id; ?>">
                        Modifier
                    </a>
                    <a class="btn btn-danger supprimer" href="<?php echo BASE_URL; ?>/supprimer-contact?id=<?php echo $c->id; ?>" onclick="return confirm('Êtes-vous sûr ?')">
                        Supprimer
                    </a>
                </p>
                
            <?php } ?>
        </div>

    <?php } ?>
</div>

<?php require __DIR__ . '/../parties/bas_de_page.html.php'; ?>