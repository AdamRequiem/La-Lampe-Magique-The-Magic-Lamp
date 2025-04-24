<?php
session_start();

try {
    $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
    $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        try {
            $query = "SELECT * FROM client WHERE EMAIL = :email";
            $stmt = $Con->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $email;
                    $_SESSION['type_compte'] = $user['TYPE_COMPTE'];
                    $_SESSION['EMAIL'] = $email; // Stocke l'email après la connexion
                    $_SESSION['CLIENT_ID'] = $user['ID_CLIENT']; // Stocke l'ID du client après la connexion
                    header('Location: index.php');
                    exit();
                } else {
                    $error = "Mot de passe incorrect.";
                }
            } else {
                $error = "Email incorrect.";
            }
        } catch (PDOException $e) {
            $error = "Erreur : " . $e->getMessage();
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - La Lampe Magique</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="login-body">
    <?php include 'header.php'; ?>
    <div class="login-container">
        <div class="login-form-section">
            <h1>Bon retour à La Lampe Magique !</h1>
            <h2>Authentification</h2>
            <form id="loginForm" class="login-form" method="POST" action="">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <?php if (isset($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <button type="submit">Se connecter</button>
            </form>
            <p>Vous n'avez pas de compte ? <a href="Inscription.php">Créez-en un</a></p>
        </div>
        <div class="login-image-section"></div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>