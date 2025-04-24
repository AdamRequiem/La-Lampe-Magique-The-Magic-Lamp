<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Lampe Magique</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .patisserie {
      background-color: #AA8774;
    }
  </style>
</head>
<body>
<?php include 'header.php'; ?>
  <img src="patisserie.png" alt="Patisserie" width="100%">
  <div class="main-content">
    <aside class="sidebar">
      <h2>Pâtisserie</h2>
      <ul>
        <li><a href="#">Pains</a></li>
        <li><a href="#">Viennoiseries</a></li>
        <li><a href="#">Gateaux et tartes</a></li>
      </ul>
    </aside>
    <section id="products" class="products">
      <div class="product-list">
        <?php
        try {
          // Database connection
          $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
          $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Fetch products from the database
          $sql = "SELECT NOM_PRODUIT as nom, PRIX as prix, photo FROM PRODUIT 
                  JOIN SOUS_CATEGORIE ON PRODUIT.ID_SOUS_CATEGORIE = SOUS_CATEGORIE.ID_SOUS_CATEGORIE 
                  JOIN CATEGORIE ON SOUS_CATEGORIE.ID_CATEGORIE = CATEGORIE.ID_CATEGORIE 
                  WHERE CATEGORIE.NOM_CATEGORIE = 'patisserie'";
          $stmt = $Con->query($sql);

          if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="product-card">';
              echo '<img src="' . htmlspecialchars($row["photo"]) . '" alt="' . htmlspecialchars($row["nom"]) . '">';
              echo '<h3>' . htmlspecialchars($row["nom"]) . '</h3>';
              echo '<p>Prix : ' . htmlspecialchars($row["prix"]) . 'Dh</p>';
              echo '<button class="add-to-cart">Ajouter au panier</button>';
              echo '</div>';
            }
          } else {
            echo "Pas de résultat";
          }
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $Con = null;
        ?>
      </div>
    </section>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
