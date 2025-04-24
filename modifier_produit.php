<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['type_compte'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

$ID_PRODUIT = $_POST['ID_PRODUIT'];
$NOM_PRODUIT = $_POST['NOM_PRODUIT'];
$PRIX = $_POST['PRIX'];
$STOCK = $_POST['STOCK'];
$DESCRIPTION_PRODUIT = $_POST['DESCRIPTION_PRODUIT'];
$photo = $_POST['photo'];

$Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");

$stmt = $Con->prepare("UPDATE produit SET NOM_PRODUIT = :nom, photo = :photo, PRIX = :prix, STOCK = :stock, DESCRIPTION_PRODUIT = :description WHERE ID_PRODUIT = :id");

$stmt->bindParam(':nom', $NOM_PRODUIT);
$stmt->bindParam(':photo', $photo);
$stmt->bindParam(':prix', $PRIX);
$stmt->bindParam(':stock', $STOCK);
$stmt->bindParam(':description', $DESCRIPTION_PRODUIT);
$stmt->bindParam(':id', $ID_PRODUIT);

$stmt->execute();

header('Location: admin_list.php');
?>