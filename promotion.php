<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Lampe Magique - Promotions</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .product-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .product-card {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
      margin: 10px;
      text-align: center;
      width: 200px;
    }
    .product-card img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
    }
    .product-card h3 {
      font-size: 18px;
      margin: 10px 0;
    }
    .product-card p {
      font-size: 16px;
      color: #555;
    }
    .prix {
      font-size: 16px;
      color: #555;
    }
    .old-price {
      text-decoration: line-through;
      color: red;
    }
    .new-price {
      color: green;
      font-weight: bold;
    }
    .add-to-cart {
      background-color: black;
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 16px;
      border-radius: 5px;
      transition: 0.3s;
    }
    .add-to-cart:hover {
      background-color: #333;
    }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="main-content">
    <section id="products" class="products">
      <h2>Promotions THE ORDINARY</h2>
      <div class="product-list">
        <div class="product-card">
          <img src="image/ordinary.jpg" alt="THE ORDINARY Acide Hyaluronique 2% + B5 Sérum Hydratant">
          <h3>THE ORDINARY Acide Hyaluronique 2% + B5 Sérum Hydratant</h3>
          <p class="prix"><span class="old-price">150.00Dh</span> <span class="new-price">115.00Dh</span></p>
          <button class="add-to-cart" data-product-id="110">Ajouter au panier</button>
        </div>
        <div class="product-card">
          <img src="image/ordinary.jpg" alt="THE ORDINARY Niacinamide 10% + Zinc 1% Sérum Anti-Imperfections">
          <h3>THE ORDINARY Niacinamide 10% + Zinc 1% Sérum Anti-Imperfections</h3>
          <p class="prix"><span class="old-price">100.00Dh</span> <span class="new-price">79.00Dh</span></p>
          <button class="add-to-cart" data-product-id="111">Ajouter au panier</button>
        </div>
        <div class="product-card">
          <img src="image/ordinary1.jpg" alt="THE ORDINARY Solution de Peeling AHA 30% + BHA 2% Soin Exfoliant 30 ml">
          <h3>THE ORDINARY Solution de Peeling AHA 30% + BHA 2% Soin Exfoliant 30 ml</h3>
          <p class="prix"><span class="old-price">160.00Dh</span> <span class="new-price">130.00Dh</span></p>
          <button class="add-to-cart" data-product-id="112">Ajouter au panier</button>
        </div>
      </div>
    </section>
  </div>
  <?php include 'footer.php'; ?>
  <script src="animation.js"></script>
</body>
</html>
