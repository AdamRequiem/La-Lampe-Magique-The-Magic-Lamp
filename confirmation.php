<?php
session_start();

if (!isset($_SESSION['client_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center">Commande passée avec succès !</h1>
        <p class="text-center">Merci pour votre achat. Votre commande a été passée avec succès.</p>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>
        </div>
    </div>
<?php include 'footer.php'; ?>
</body>
</html>
