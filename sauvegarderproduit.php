<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['type_compte'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

$NOM_PRODUIT=$_POST['NOM_PRODUIT'];
$PRIX=$_POST['PRIX'];
$STOCK=$_POST['STOCK'];
$DESCRIPTION_PRODUIT=$_POST['DESCRIPTION_PRODUIT'];
$photo=$_POST['photo'];
$Con=new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8","root","");
$sql=$Con->query("insert into produit (NOM_PRODUIT,photo,PRIX,STOCK,DESCRIPTION_PRODUIT) values ('$NOM_PRODUIT','$photo','$PRIX','$STOCK','$DESCRIPTION_PRODUIT')");
header('Location: admin_list.php');
?>