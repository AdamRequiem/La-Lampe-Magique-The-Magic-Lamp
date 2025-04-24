function confirmersupp(ID_PRODUIT) {
  if (confirm("Voulez-vous vraiment supprimer ce produit ?")) {
    location.href = "supprimer_produit.php?no=" + ID_PRODUIT;
  }
}

// JavaScript pour fermer le sous-menu en cliquant à l'extérieur
document.addEventListener('click', function (event) {
  const dropdowns = document.querySelectorAll('.menu-item.dropdown');
  dropdowns.forEach(function (dropdown) {
    if (!dropdown.contains(event.target)) {
      dropdown.querySelector('.submenu').style.display = 'none';
    }
  });
});

// Ouvrir le sous-menu au survol (mobile-friendly)
document.querySelectorAll('.menu-item.dropdown').forEach(function (dropdown) {
  dropdown.addEventListener('mouseover', function () {
    this.querySelector('.submenu').style.display = 'block';
  });
  dropdown.addEventListener('mouseout', function () {
    this.querySelector('.submenu').style.display = 'none';
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const carouselImages = document.querySelector(".carousel-images");
  const images = document.querySelectorAll(".carousel-images img");
  const prevButton = document.querySelector(".carousel-button.prev");
  const nextButton = document.querySelector(".carousel-button.next");

  let currentIndex = 0;

  // Fonction pour mettre à jour la position du carrousel
  function updateCarousel() {
    const offset = -currentIndex * 100;
    carouselImages.style.transform = `translateX(${offset}%)`;
  }

  // Bouton suivant
  nextButton.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % images.length;
    updateCarousel();
  });

  // Bouton précédent
  prevButton.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateCarousel();
  });

  // Défilement automatique
  setInterval(() => {
    currentIndex = (currentIndex + 1) % images.length;
    updateCarousel();
  }, 5000); // Change d'image toutes les 5 secondes
});

const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

function updateCart() {
  const cartItemsContainer = document.querySelector('.cart-items');
  const totalElement = document.querySelector('.total');
  cartItemsContainer.innerHTML = '';
  let total = 0;

  cartItems.forEach((item, index) => {
    const itemTotal = item.price * item.quantity;
    total += itemTotal;
    const listItem = document.createElement('li');
    listItem.innerHTML = `
      ${item.name} - ${item.price}Dh x ${item.quantity} = ${itemTotal}Dh
      <button onclick="removeItem(${index})">Retirer</button>
    `;
    cartItemsContainer.appendChild(listItem);
  });

  totalElement.textContent = `Total : ${total}Dh`;
}

function removeItem(index) {
  cartItems.splice(index, 1);
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
  updateCart();
}

function addToCart(productName, productPrice) {
  const existingItem = cartItems.find(item => item.name === productName);
  if (existingItem) {
    existingItem.quantity++;
  } else {
    cartItems.push({ name: productName, price: productPrice, quantity: 1 });
  }
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
  updateCart();
}

function displayCartItems() {
  const cartItemsContainer = document.querySelector('.cart-items');
  const totalElement = document.querySelector('.total');

  const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

  let total = 0;
  cartItemsContainer.innerHTML = ''; // Clear previous items

  cartItems.forEach((item, index) => {
    const itemTotal = item.price * item.quantity;
    total += itemTotal;
    const listItem = document.createElement('li');
    listItem.innerHTML = `
      ${item.name} - ${item.price}Dh x ${item.quantity} = ${itemTotal}Dh
      <button onclick="removeItem(${index})">Retirer</button>
    `;
    cartItemsContainer.appendChild(listItem);
  });

  totalElement.textContent = `Total : ${total}Dh`;
}

function clearCart() {
  cartItems.length = 0;
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
  updateCart();
}

// Event listener for adding items to the cart
document.addEventListener('DOMContentLoaded', function() {
  const addToCartButtons = document.querySelectorAll('.add-to-cart');

  addToCartButtons.forEach(button => {
    if (!button.hasAttribute('data-listener-added')) {
      button.addEventListener('click', function() {
        const productCard = this.closest('.product-card');
        const productName = productCard.querySelector('h3').textContent;
        const productPrice = parseFloat(productCard.querySelector('p').textContent.replace('Prix : ', '').replace('Dh', ''));
        addToCart(productName, productPrice);
        alert(`${productName} a été ajouté au panier.`);
      });
      button.setAttribute('data-listener-added', 'true');
    }
  });

  // Display cart items if on the cart page
  if (document.querySelector('.cart-items')) {
    displayCartItems();
  }

  // Add event listener for clearing the cart
  const clearCartButton = document.querySelector('.clear-cart');
  if (clearCartButton) {
    clearCartButton.addEventListener('click', clearCart);
  }
});

updateCart();

const slides = document.querySelector('.slides');
const dotsContainer = document.querySelector('.dots');
let currentIndex = 0;

// Ajouter des indicateurs de navigation
for (let i = 0; i < 6; i++) {
    let dot = document.createElement('span');
    dot.addEventListener('click', () => goToSlide(i));
    dotsContainer.appendChild(dot);
}

const dots = dotsContainer.children;
dots[0].classList.add('active');

function goToSlide(index) {
    slides.style.transform = `translateX(-${index * 120}px)`;
    dots[currentIndex].classList.remove('active');
    dots[index].classList.add('active');
    currentIndex = index;
}