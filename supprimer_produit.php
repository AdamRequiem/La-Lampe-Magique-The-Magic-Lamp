<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['type_compte'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

$Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
$ID_PRODUIT = $_GET['no'];
$Con->query("DELETE FROM produit WHERE ID_PRODUIT=$ID_PRODUIT");
header('Location: admin_list.php');
?>