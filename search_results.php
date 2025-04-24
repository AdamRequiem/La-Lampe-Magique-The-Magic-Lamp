<?php
session_start();

try {
    $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
    $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

$search_query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';

$results = [];
if (!empty($search_query)) {
    $stmt = $Con->prepare("SELECT * FROM produit WHERE NOM_PRODUIT LIKE :query");
    $stmt->execute(['query' => '%' . $search_query . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Résultats de recherche - La Lampe Magique</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="main-content">
        <h1 class="search-results-heading">Résultats de recherche pour "<?php echo $search_query; ?>"</h1>
        <div>


        
        </div>
        <?php if (!empty($results)): ?>
            <div class="product-list">
                <?php foreach ($results as $result): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($result['photo']); ?>" alt="<?php echo htmlspecialchars($result['NOM_PRODUIT']); ?>">
                        <h3><?php echo htmlspecialchars($result['NOM_PRODUIT']); ?></h3>
                        <p>Prix : <?php echo htmlspecialchars($result['PRIX']); ?> Dh</p>
                        <button class="add-to-cart" data-product-id="<?php echo $result['ID_PRODUIT']; ?>">Ajouter au panier</button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Aucun résultat trouvé.</p>
        <?php endif; ?>
    </div>
    <?php include 'footer.php'; ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addToCartButtons = document.querySelectorAll('.add-to-cart');

        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                fetch(`check_stock.php?id=${productId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.stock >= 1) {
                            const productCard = this.closest('.product-card');
                            const productName = productCard.querySelector('h3').textContent;
                            const productPrice = parseFloat(productCard.querySelector('p').textContent.replace('Prix : ', '').replace('Dh', ''));
                            addToCart(productName, productPrice);
                        } else {
                            alert('Stock insuffisant.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
    </script>
</body>
</html>