<?php
session_start();
if (!isset($_SESSION['EMAIL'])) {
    header("Location: index.php");
    exit();
}

try {
    $conn = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

$email = $_SESSION['EMAIL'];
$sql = "SELECT TYPE_COMPTE FROM client WHERE EMAIL = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    if ($result['TYPE_COMPTE'] !== 'admin') {
        header("Location: index.php");
        exit();
    }
} else {
    session_destroy();
    header("Location: index.php");
    exit();
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hub Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css"> 
    <link href="../bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
<?php
include 'header.php';
?>
    <div class="container mt-5">
        <h1 class="text-center">Hub Administrateur</h1>
        <div class="d-flex justify-content-around mt-4">
            <button class="btn btn-primary" onclick="location.href='admin_list.php'">Gérer produits</button>
            <button class="btn btn-primary" onclick="location.href='admin_list_client.php'">Gérer clients</button>
            <button class="btn btn-primary" onclick="location.href='admin_list_commande.php'">Gérer commandes</button>
            <button class="btn btn-primary" onclick="location.href='admin_list_categorie.php'">Gérer catégories</button>
            <button class="btn btn-primary" onclick="location.href='admin_list_sous_categorie.php'">Gérer sous-catégories</button>
        </div>
    </div>
    <div class="mt-5"></div>
</body>
</html>

<?php
include 'footer.php';
?>
