<?php
session_start();

try {
    $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
    $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['NOM_CLIENT'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($nom) && !empty($email) && !empty($password)) {
        try {
            $query = "SELECT * FROM client WHERE EMAIL = :email";
            $stmt = $Con->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() == 0) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO client (NOM_CLIENT, EMAIL, password) VALUES (:nom, :email, :password)";
                $stmt = $Con->prepare($query);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();

                $_SESSION['user'] = $email;
                header('Location: connexion.php');
                exit();
            } else {
                $error = "Cet email est déjà utilisé.";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - La Lampe Magique</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="signup-body">
    <?php include 'header.php'; ?>
    <div class="signup-container">
        <div class="signup-form-container">
            <h1>Bienvenue chez La Lampe magique !</h1>
            <h2>Inscription</h2>
            <form id="signupForm" method="POST" action="">
                <input type="text" name="NOM_CLIENT" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <?php if (isset($error)): ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php endif; ?>
                <button type="submit">S'inscrire</button>
            </form>
            <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous.</a></p>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="scriptp.js"></script>
</body>
</html>