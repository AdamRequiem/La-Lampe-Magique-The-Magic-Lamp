<?php
session_start();

if (!isset($_SESSION['EMAIL'])) {
    header('Location: connexion.php');
    exit();
}

$client_id = $_SESSION['EMAIL'];

try {
    $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
    $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

$query = "SELECT p.NOM_PRODUIT, p.PRIX, cp.QUANTITE, (p.PRIX * cp.QUANTITE) AS TOTAL
          FROM commande_produit cp
          JOIN produit p ON cp.ID_PRODUIT = p.ID_PRODUIT
          JOIN commande c ON cp.ID_COMMANDE = c.ID_COMMANDE
          WHERE c.ID_CLIENT = ? AND c.STATUT = 'En cours'";
$stmt = $Con->prepare($query);
$stmt->execute([$client_id]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = 0;
$cart_items = [];
foreach ($result as $row) {
    $cart_items[] = $row;
    $total += $row['TOTAL'];
}
$Con = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Lampe Magique</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>
  <div class="cart">
    <h2>Panier</h2>
    <ul class="cart-items">
      <?php foreach ($cart_items as $item): ?>
        <li>
          <?php echo htmlspecialchars($item['NOM_PRODUIT']); ?> - 
          <?php echo htmlspecialchars($item['QUANTITE']); ?> x 
          <?php echo htmlspecialchars($item['PRIX']); ?>Dh = 
          <?php echo htmlspecialchars($item['TOTAL']); ?>Dh
        </li>
      <?php endforeach; ?>
    </ul>
    <p class="total">Total : <?php echo htmlspecialchars($total); ?>Dh</p>
    <button type="button" class="checkout-button" onclick="checkout()">Passer à la caisse</button>
    <button type="button" class="clear-cart" onclick="clearCart()">Vider le panier</button>
  </div>
<?php include 'footer.php'; ?>
<script>
function checkout() {
   location.href = "checkout.php";
}

function clearCart() {
  alert('Vider le panier');
}
</script>
</body>
</html>
