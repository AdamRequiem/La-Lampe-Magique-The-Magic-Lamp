<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit();
}

try {
    $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
    $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

$email = $_SESSION['user'];
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $new_email = $_POST['email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    if (!empty($name) && !empty($new_email) && !empty($old_password)) {
        try {
            $query = "SELECT password FROM client WHERE EMAIL = :email";
            $stmt = $Con->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($old_password, $user['password'])) {
                $query = "UPDATE client SET NOM_CLIENT = :name, EMAIL = :email";
                if (!empty($new_password)) {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $query .= ", password = :password";
                }
                $query .= " WHERE EMAIL = :current_email";
                $stmt = $Con->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $new_email);
                if (!empty($new_password)) {
                    $stmt->bindParam(':password', $hashed_password);
                }
                $stmt->bindParam(':current_email', $email);
                $stmt->execute();

                $_SESSION['user'] = $new_email;
                $email = $new_email;
                $success = "Informations mises à jour avec succès.";
            } else {
                $error = "Ancien mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            $error = "Erreur : " . $e->getMessage();
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}

try {
    $query = "SELECT * FROM client WHERE EMAIL = :email";
    $stmt = $Con->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur - La Lampe Magique</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="profile-body">
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1>Profil Utilisateur</h1>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" method="POST" action="">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo htmlspecialchars($user['NOM_CLIENT']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($user['EMAIL']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="old_password">Ancien mot de passe</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Ancien mot de passe" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nouveau mot de passe">
                            </div>
                            <?php if (isset($error) && $error): ?>
                                <div class="alert alert-danger"><?php echo $error; ?></div>
                            <?php elseif (isset($success)): ?>
                                <div class="alert alert-success"><?php echo $success; ?></div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
<script src="animation.js"></script>
</html>
