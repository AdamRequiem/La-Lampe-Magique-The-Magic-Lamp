<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Lampe Magique</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .pagination {
      text-align: center;
      margin: 20px 0;
    }
    .pagination a {
      margin: 0 5px;
      padding: 8px 16px;
      text-decoration: none;
      color: #333;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    .pagination a:hover {
      background-color: #f0f0f0;
    }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>
  <?php
  $categorie = isset($_GET['categorie']) ? htmlspecialchars($_GET['categorie']) : null;
  $sous_categorie = isset($_GET['sous_categorie']) ? htmlspecialchars($_GET['sous_categorie']) : null;

  if ($categorie) {
    try {
      $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
      $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT image, couleur FROM CATEGORIE WHERE NOM_CATEGORIE = :categorie";
      $stmt = $Con->prepare($sql);
      $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $image = $row['image'];
        $couleur = $row['couleur'];
      } else {
        $image = 'default.png';
        $couleur = 'FFFFFF';
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $Con = null;
  } else {
    $image = 'default.png';
    $couleur = 'FFFFFF';
  }
  ?>
  <style>
    .categories-menu {
      background-color: #<?php echo $couleur; ?>;
    }
  </style>
  <img src="<?php echo $image; ?>" alt="Banniere" name="banniere" width="100%">
  <div class="main-content">
    <aside class="sidebar">
      <h2>
        <?php
        if ($categorie) {
          echo ucfirst($categorie);
        } elseif ($sous_categorie) {
          try {
            $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
            $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT CATEGORIE.NOM_CATEGORIE FROM SOUS_CATEGORIE 
                    JOIN CATEGORIE ON SOUS_CATEGORIE.ID_CATEGORIE = CATEGORIE.ID_CATEGORIE 
                    WHERE SOUS_CATEGORIE.NOM_SOUS_CATEGORIE = :sous_categorie";
            $stmt = $Con->prepare($sql);
            $stmt->bindParam(':sous_categorie', $sous_categorie, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $categorie = $row['NOM_CATEGORIE'];
              echo ucfirst($categorie);
            } else {
              echo "Catégorie inconnue";
            }
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
          $Con = null;
        } else {
          echo "Catégorie inconnue";
        }
        ?>
      </h2>
      <ul>
        <?php
        if ($categorie) {
          try {
            $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
            $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT NOM_SOUS_CATEGORIE FROM SOUS_CATEGORIE 
                    JOIN CATEGORIE ON SOUS_CATEGORIE.ID_CATEGORIE = CATEGORIE.ID_CATEGORIE 
                    WHERE CATEGORIE.NOM_CATEGORIE = :categorie";
            $stmt = $Con->prepare($sql);
            $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<li><a href="produits.php?categorie=' . urlencode($categorie) . '&sous_categorie=' . urlencode($row["NOM_SOUS_CATEGORIE"]) . '">' . htmlspecialchars($row["NOM_SOUS_CATEGORIE"]) . '</a></li>';
              }
            } else {
              echo "<li>Pas de sous-catégories</li>";
            }
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
          $Con = null;
        }
        ?>
      </ul>
    </aside>
    <section id="products" class="products">
      <div class="product-list">
      <?php
      $productsPerPage = 8;

      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $start = ($page - 1) * $productsPerPage;

      try {
        $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
        $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($sous_categorie) {
          $sql = "SELECT NOM_PRODUIT as nom, PRIX as prix, photo, ID_PRODUIT FROM PRODUIT 
                  JOIN SOUS_CATEGORIE ON PRODUIT.ID_SOUS_CATEGORIE = SOUS_CATEGORIE.ID_SOUS_CATEGORIE 
                  WHERE SOUS_CATEGORIE.NOM_SOUS_CATEGORIE = :sous_categorie
                  LIMIT :start, :productsPerPage";
          $stmt = $Con->prepare($sql);
          $stmt->bindParam(':sous_categorie', $sous_categorie, PDO::PARAM_STR);
        } else if ($categorie) {
          $sql = "SELECT NOM_PRODUIT as nom, PRIX as prix, photo, ID_PRODUIT FROM PRODUIT 
                  JOIN SOUS_CATEGORIE ON PRODUIT.ID_SOUS_CATEGORIE = SOUS_CATEGORIE.ID_SOUS_CATEGORIE 
                  JOIN CATEGORIE ON SOUS_CATEGORIE.ID_CATEGORIE = CATEGORIE.ID_CATEGORIE 
                  WHERE CATEGORIE.NOM_CATEGORIE = :categorie
                  LIMIT :start, :productsPerPage";
          $stmt = $Con->prepare($sql);
          $stmt->bindParam(':categorie', $categorie, PDO::PARAM_STR);
        } else {
          throw new Exception("Aucune catégorie ou sous-catégorie spécifiée.");
        }

        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':productsPerPage', $productsPerPage, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="product-card">';
            echo '<img src="' . htmlspecialchars($row["photo"]) . '" alt="' . htmlspecialchars($row["nom"]) . '">';
            echo '<h3>' . htmlspecialchars($row["nom"]) . '</h3>';
            echo '<p>Prix : ' . htmlspecialchars($row["prix"]) . 'Dh</p>';
            echo '<button class="add-to-cart" data-product-id="' . $row["ID_PRODUIT"] . '">Ajouter au panier</button>';
            echo '</div>';
          }
        } else {
          echo "Pas de résultat";
        }

        if ($sous_categorie) {
          $totalProducts = $Con->query("SELECT COUNT(*) FROM PRODUIT 
                                        JOIN SOUS_CATEGORIE ON PRODUIT.ID_SOUS_CATEGORIE = SOUS_CATEGORIE.ID_SOUS_CATEGORIE 
                                        WHERE SOUS_CATEGORIE.NOM_SOUS_CATEGORIE = '$sous_categorie'")->fetchColumn();
        } else {
          $totalProducts = $Con->query("SELECT COUNT(*) FROM PRODUIT 
                                        JOIN SOUS_CATEGORIE ON PRODUIT.ID_SOUS_CATEGORIE = SOUS_CATEGORIE.ID_SOUS_CATEGORIE 
                                        JOIN CATEGORIE ON SOUS_CATEGORIE.ID_CATEGORIE = CATEGORIE.ID_CATEGORIE 
                                        WHERE CATEGORIE.NOM_CATEGORIE = '$categorie'")->fetchColumn();
        }
        $totalPages = ceil($totalProducts / $productsPerPage);
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
      }
      $Con = null;
      ?>
      </div>
    </section>
  </div>
  <div class="pagination">
    <?php
    for ($i = 1; $i <= $totalPages; $i++) {
      echo '<a href="?page=' . $i . '&categorie=' . urlencode($categorie) . '&sous_categorie=' . urlencode($sous_categorie) . '">' . $i . '</a> ';
    }
    ?>
  </div>
  <?php include 'footer.php'; ?>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
      if (!button.hasAttribute('data-listener-added')) {
        button.addEventListener('click', function() {
          const productId = this.getAttribute('data-product-id');
          fetch(`check_stock.php?id=${productId}`)
            .then(response => response.json())
            .then(data => {
              if (data.stock >= 1) {
                const productCard = this.closest('.product-card');
                const productName = productCard.querySelector('h3').textContent;
                const productPrice = parseFloat(productCard.querySelector('p').textContent.replace('Prix : ', '').replace('Dh', ''));
                if (!this.classList.contains('added')) {
                  addToCart(productName, productPrice);
                  this.classList.add('added');
                }
              } else {
                alert('Stock insuffisant.');
              }
            })
            .catch(error => console.error('Error:', error));
        });
        button.setAttribute('data-listener-added', 'true');
      }
    });
  });
  </script>
</body>
</html>