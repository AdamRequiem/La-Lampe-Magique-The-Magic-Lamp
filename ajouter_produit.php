<?php
session_start();

?>
<html>
    <head>
        <title>Ajouter produit</title>
        <link rel="stylesheet" href="../bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">         
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta charset="utf-8">
        <script src="animation.js"></script>
    </head>
    <body>
        <?php
        include 'header.php'; ?>
        <div class="container">
        <h1>Ajouter un nouveau Produit</h1>
        <form method="post" action="sauvegarderproduit.php" class="needs-validation form-background" novalidate>
            <div class="form-group">
                <label for="nomProduit">Nom :</label>
                <input type="text" class="form-control" id="nomProduit" name="NOM_PRODUIT" required />
            </div>
            <div class="form-group">
                <label for="photo">Chemin :</label>
                <input type="text" class="form-control" id="photo" name="photo" required />
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="text" class="form-control" id="prix" name="PRIX" required />
            </div>
            <div class="form-group">
                <label for="stock">Stock :</label>
                <input type="text" class="form-control" id="stock" name="STOCK" required />
            </div>
            <div class="form-group">
                <label for="descriptionProduit">Description :</label>
                <input type="text" class="form-control" id="descriptionProduit" name="DESCRIPTION_PRODUIT" required />
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    </body>
</html>