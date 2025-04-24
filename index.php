<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Lampe Magique</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <style>
        .accueil {
            background-color: black;
        }
        .promo-section {
            padding-left: 500px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 40px;
            border-radius: 15px;
            background-color: white;
            width: 80%;
            max-width: 900px;
        }
        .promo-text {
            flex: 1;
            text-align: left;
        }
        .promo-text h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .promo-text p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }
        .promo-button {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            transition: 0.3s;
            align:center;
        }
        .promo-button:hover {
            background-color: #333;
        }
        .promo-image {
            flex: 1;
            text-align: right;
            width: 400px;
            height: 300px;    
        }
        .promo-image img {
            border-radius: 15px;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center; 
        }
        .centered-title {
            color: black;
        }
        .categories {
            max-width: 800px;
            margin: auto;
        }
        h2 span {
            background: #333;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .slider {
            display: flex;
            overflow: hidden;
            margin-top: 20px;
            position: relative;
        }
        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slide {
            width: 130px;
            padding: 10px;
            text-align: center;
        }
        .slide img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }
        .dots {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .dots span {
            height: 10px;
            width: 10px;
            margin: 0 5px;
            background: gray;
            border-radius: 50%;
            display: inline-block;
            cursor: pointer;
        }
        .dots .active {
            background: yellow;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="carousel">
        <div class="carousel-images">
            <img src="slide4.png" alt="Image 1">
            <img src="slide7.png" alt="Image 2">
            <img src="slide6.png" alt="Image 3">
            <img src="slide5.png" alt="Image 4">
        </div>
        <button class="carousel-button prev">⟨</button>
        <button class="carousel-button next">⟩</button>
    </div>
    <section id="home" class="hero">
        <h1>Bienvenue chez la lampe magique</h1>
        <h2>Où tous vos souhaits seront exaucés.</h2>
    </section>
    <img src="image/ramadan.png" alt="Produits en Promotion">
    <section class="promo-section" style="margin-left: 200px; margin-down: 1000px;">
        <div class="promo-text">
            <h2>PROMOTION EXCLUSIVE</h2>
            <p>Profitez d'une sélection de produits exceptionnels pour des combinaisons infiniment personnalisables.</p>
            <button class="promo-button" onclick="window.location.href='promotion.php'">Découvrir</button>
        </div>
        <div class="promo-image">
            <img src="image/ordeny.png" alt="Produits en Promotion">
        </div>
    </section>
    <br>
    <br>
    <section class="categories">
        <h2 class="centered-title" style="font-family:Lexend giga"><span>Les Produits Vedettes</span></h2>
        <div class="slider">
            <div class="slides">
                <div class="slide"><img src="image/coca1.png" alt="Fruits et légumes"><p>Coca-Cola</p></div>
                <div class="slide"><img src="image/nivea2.png" alt="Épices"><p>Nivea</p></div>
                <div class="slide"><img src="image/HUILOR.png" alt="Alimentation générale"><p>Huilor</p></div>
                <div class="slide"><img src="image/boucherie2.png" alt="Boucherie"><p>Boeuf</p></div>
                <div class="slide"><img src="image/patisserie2.png" alt="Pâtisserie"><p>Morceau de gâteau au chocolat</p></div>
                <div class="slide"><img src="image/edam.png" alt="Nettoyage"><p>Fromage Edam</p></div>
                <div class="slide"><img src="image/ariel.png" alt="Beauté et hygiéne"><p>Ariel Liquide</p></div>
                <div class="slide"><img src="image/ultra.png" alt="Beauté et hygiéne"><p>Ultra Doux</p></div>
                <div class="slide"><img src="image/poulet.png" alt="Beauté et hygiéne"><p>Poulet</p></div>
                <div class="slide"><img src="image/canel.png" alt="Beauté et hygiéne"><p>Cannelle</p></div>
                <div class="slide"><img src="image/lai.png" alt="Beauté et hygiéne"><p>Lait</p></div>
            </div>
        </div>
        <div class="dots"></div>
    </section>
    <br>
    <div class="custom-body">
        <div class="custom-container">
            <div class="custom-card">
                <img src="image/carte1.png" alt="Chocolat">
                <div class="custom-card-content">
                    <h3>Chocolat</h3>
                    <p>Découvrez nos délicieux assortiments de chocolats pour toutes les occasions</p>
                    <a href="produits.php?categorie=<?php echo urlencode('Patisserie'); ?>&sous_categorie=<?php echo urlencode('Chocolat'); ?>">Voir nos chocolats </a>
                </div>
            </div>
            <div class="custom-card">
                <img src="image/carte2.jpeg" alt="Cadeaux">
                <div class="custom-card-content">
                    <h3>Cadeaux</h3>
                    <p>Offrez des cadeaux uniques et personnalisés pour faire plaisir à vos proches</p>
                    <a href="produits.php?categorie=<?php echo urlencode('Beauté et hygiène'); ?>&sous_categorie=<?php echo urlencode('Maquillage'); ?>">Explorer nos cadeaux</a>
                </div>
            </div>
            <div class="custom-card">
                <img src="image/carte4.jpeg" alt="Gâteau">
                <div class="custom-card-content">
                    <h3>Gâteau</h3>
                    <p>Des gâteaux savoureux pour toutes vos célébrations et moments gourmands.</p>
                    <a href="produits.php?categorie=<?php echo urlencode('Patisserie'); ?>&sous_categorie=<?php echo urlencode('Gateaux et tartes'); ?>">Commander un gâteau</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <section class="super-offres">
        <h2>NOS PROMOTIONS</h2>
        <div class="offres-container">
            <div class="offre-card">
                <img src="image/laitd'amande .jpg" alt="Poisson Amateur Tajine">
                <h3>Créme de les mains </h3>
                <p class="prix"><span class="old-price">150.90 MAD</span> <span class="new-price">114.90 MAD</span></p>
                <button class="add-to-cart"> Ajouter au panier</button>
            </div>
            <div class="offre-card">
                <img src="image/ariel.jpg" alt="Panier Fruits Indispensables">
                <h3>Ariel 3L</h3>
                <p class="prix"><span class="old-price">199.00 MAD</span> <span class="new-price">70.90 MAD</span></p>
                <button class="add-to-cart"> Ajouter au panier</button>
            </div>
            <div class="offre-card">
                <img src="image/framboise (2).jpg" alt="Panier Hebdomadaire">
                <h3>Framboise 1Kg </h3>
                <p class="prix"><span class="old-price">27.00 MAD</span> <span class="new-price">15.00 MAD</span></p>
                <button class="add-to-cart">Ajouter au panier</button>
            </div>
        </div>
    </section>
    <br>
    <br>
    <script>
        const slides = document.querySelector('.slides');
        const dotsContainer = document.querySelector('.dots');
        let currentIndex = 0;
        
        for (let i = 0; i <= 6; i++) {
            if (i==0 || i==6){ 
                let dot = document.createElement('span');
                dot.addEventListener('click', () => goToSlide(i));
                dotsContainer.appendChild(dot);
            }
        }
        
        const dots = dotsContainer.children;
        dots[0].classList.add('active');
        
        function goToSlide(index) {
            slides.style.transform = `translateX(-${index * 120}px)`;
            dots[currentIndex].classList.remove('active');
            dots[index].classList.add('active');
            currentIndex = index;
        }
    </script>
    <script>
        const buttons = document.querySelectorAll('.add-to-cart');
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                alert("Produit ajouté au panier !");
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carouselImages = document.querySelector(".carousel-images");
            const images = document.querySelectorAll(".carousel-images img");
            const prevButton = document.querySelector(".carousel-button.prev");
            const nextButton = document.querySelector(".carousel-button.next");

            let currentIndex = 0;

            function updateCarousel() {
                const offset = -currentIndex * 100;
                carouselImages.style.transform = `translateX(${offset}%)`;
            }

            nextButton.addEventListener("click", () => {
                currentIndex = (currentIndex + 1) % images.length;
                updateCarousel();
            });

            prevButton.addEventListener("click", () => {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                updateCarousel();
            });

            setInterval(() => {
                currentIndex = (currentIndex + 1) % images.length;
                updateCarousel();
            }, 5000);
        });
    </script>
    <table class="features" style="width: 100%;">
        <tr>
            <td class="feature">
                <i class="fa-solid fa-leaf fa-2xl"></i>
                <h3>Produits Locaux</h3>
                <p>Soutenez l'économie locale<br>Qualité garantie</p>
            </td>
            <td class="feature">
                <i class="fa-solid fa-truck fa-2xl"></i>
                <h3>Livraison à domicile</h3>
                <p>sur tout le Maroc<br>Gratuite à partir de 1000 Dh d'achats</p>
            </td>
            <td class="feature">
                <i class="fa-solid fa-credit-card fa-2xl"></i>
                <h3>Paiement à la livraison</h3>
                <p>ou par carte bancaire</p>
            </td>
            <td class="feature">
                <i class="fa-solid fa-user-shield fa-2xl"></i>
                <h3>Paiement sécurisé</h3>
                <p></p>
            </td>
        </tr>
    </table>
    <?php include('footer.php'); ?>
    <script src="animation.js"></script>
</body>
</html>
