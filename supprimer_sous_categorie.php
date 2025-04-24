<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['type_compte'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

$Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
$ID_SOUS_CATEGORIE = $_GET['no'];
$Con->query("DELETE FROM sous_categorie WHERE ID_SOUS_CATEGORIE=$ID_SOUS_CATEGORIE");
header('Location: admin_list_sous_categorie.php');
?>
