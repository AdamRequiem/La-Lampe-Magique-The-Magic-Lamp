<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['type_compte'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

$Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
$ID_CLIENT = $_GET['no'];
$Con->query("DELETE FROM client WHERE ID_CLIENT=$ID_CLIENT");
header('Location: admin_list_client.php');
?>
