<?php
session_start();

$Con=new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8","root","");
$no=$_GET['no'];
$sql=$Con->query("SELECT * FROM produit WHERE ID_PRODUIT=$no");
$ligne=$sql->fetch();
?>
<html>
    <head>
        <title>Editer produit</title>
        <link rel="stylesheet" href="../bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7x2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta charset="utf-8">
        <script src="animation.js"></script>
    </head>
    <body>
        <?php
        include 'header.php'; ?>
        <div class="container">
        <h1>Modifier produit</h1>
        <form method="post" action="modifier_produit.php" class="needs-validation form-background" novalidate>
            <div class="form-group">
                <label for="nomProduit">Nom :</label>
                <input type="text" class="form-control" id="nomProduit" name="NOM_PRODUIT" value="<?php echo $ligne['NOM_PRODUIT']; ?>" required />
            </div>
            <div class="form-group">
                <label for="photo">Chemin :</label>
                <input type="text" class="form-control" id="photo" name="photo" value="<?php echo $ligne['photo']; ?>" required />
            </div>
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="text" class="form-control" id="prix" name="PRIX" value="<?php echo $ligne['PRIX']; ?>" required />
            </div>
            <div class="form-group">
                <label for="stock">Stock :</label>
                <input type="text" class="form-control" id="stock" name="STOCK" value="<?php echo $ligne['STOCK']; ?>" required />
            </div>
            <div class="form-group">
                <label for="descriptionProduit">Description :</label>
                <input type="text" class="form-control" id="descriptionProduit" name="DESCRIPTION_PRODUIT" value="<?php echo $ligne['DESCRIPTION_PRODUIT']; ?>" required />
            </div>
            <input type="hidden" name="ID_PRODUIT" value="<?php echo $ligne['ID_PRODUIT']; ?>" />
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </body>
</html>