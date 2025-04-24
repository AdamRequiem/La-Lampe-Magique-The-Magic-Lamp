<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['type_compte'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

$Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
$sql = $Con->query("SELECT * FROM sous_categorie");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des sous-catégories</title>
    <link rel="stylesheet" href="../bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="animation.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div>
        <button class="btn"><a href='ajouter_sous_categorie.php'>Ajouter une sous-catégorie</a></button>
        <table class="table">
            <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Catégorie</th>
                <th>Action</th>
                <th></th>
            </tr>
            </thead>
            <?php while ($ligne = $sql->fetch()): ?>
            <tbody class="tbody">
            <tr>
                <td><?php echo $ligne['NOM_SOUS_CATEGORIE']; ?></td>
                <td><?php echo $ligne['ID_CATEGORIE']; ?></td>
                <td><a href="editer_sous_categorie.php?no=<?php echo $ligne['ID_SOUS_CATEGORIE']; ?>" class="btn btn-info">Editer</a></td>
                <td><a class="btn btn-danger" onclick="confirmersupp(<?php echo $ligne['ID_SOUS_CATEGORIE']; ?>)">Supprimer</a></td>
            </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
