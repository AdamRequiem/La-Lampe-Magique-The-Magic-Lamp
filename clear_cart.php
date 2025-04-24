<?php
session_start();

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit();
}

$client_id = $_SESSION['client_id'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=your_database", "username", "password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

$query = "DELETE cp FROM commande_produit cp
          JOIN commande c ON cp.ID_COMMANDE = c.ID_COMMANDE
          WHERE c.ID_CLIENT = ? AND c.STATUT = 'En cours'";
$stmt = $conn->prepare($query);
$stmt->execute([$client_id]);

$conn = null;

header('Location: cart.php');
exit();
?>
