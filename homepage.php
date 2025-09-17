<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YhemiRoses Fabrics</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Header / Navigation -->
    <header>
      <div class="logo">YhemiRoses Fabrics</div>
      <nav>
        <ul>
          <li><a href="homepage.php">Home</a></li>
          <li><a href="about.html">About Us</a></li>
          <li><a href="products.html">Products</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li>
            <a href="cart.html">Cart <span id="cart-count">0</span></a>
          </li>
        </ul>
      </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
      <h1>Beautiful Fabrics, Beautiful You</h1>
      <p>Discover premium Ankara fabrics that inspire style and elegance.</p>
      <a href="products.html" class="btn">Shop Now</a>
    </section>

    <!-- Featured Products -->
    <section class="featured-products">
      <h2>Our Latest Ankara Designs</h2>
      <div class="products-grid">
        <div class="product-card">
          <img src="images/ankara 1.jpg" alt="Ankara 1" />
          <h3>Ankara Print 1</h3>
          <p>₦10000</p>
          <button
            class="add-to-cart"
            data-name="Ankara Print 1"
            data-price="10000"
          >
            Add to Cart
          </button>
        </div>
        <div class="product-card">
          <img src="images/ankara 2.jpg" alt="Ankara 2" />
          <h3>Ankara Print 2</h3>
          <p>₦12 000</p>
          <button
            class="add-to-cart"
            data-name="Ankara Print 2"
            data-price="12000"
          >
            Add to Cart
          </button>
        </div>
        <div class="product-card">
          <img src="images/ankara 3.jpg" alt="Ankara 3" />
          <h3>Ankara Print 3</h3>
          <p>₦15 000</p>
          <button
            class="add-to-cart"
            data-name="Ankara Print 3"
            data-price="15000"
          >
            Add to Cart
          </button>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="footer-content">
        <div class="footer-about">
          <h3>About YhemiRoses Fabrics</h3>
          <p>Premium Ankara fabrics for your unique style.</p>
        </div>
        <div class="footer-links">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
        <div class="footer-contact">
          <h3>Contact Us</h3>
          <p>Email: info@yhemiroses.com</p>
          <p>Phone: +234 802 357 9868</p>
          <div class="socials">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Twitter</a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        &copy; 2025 YhemiRoses Fabrics. All rights reserved.
      </div>
    </footer>

    <!-- CART SCRIPT -->
    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const cartCount = document.getElementById("cart-count");
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Update cart count
        function updateCartCount() {
          cartCount.textContent = cart.reduce(
            (acc, item) => acc + item.quantity,
            0
          );
        }

        // Add to cart logic
        document.querySelectorAll(".add-to-cart").forEach((btn) => {
          btn.addEventListener("click", () => {
            const name = btn.getAttribute("data-name");
            const price = parseInt(btn.getAttribute("data-price"));

            // Check if item already exists in cart
            const existingItem = cart.find((item) => item.name === name);

            if (existingItem) {
              existingItem.quantity++;
            } else {
              cart.push({ name, price, quantity: 1 });
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartCount();
            alert(name + " added to cart!");
          });
        });

        updateCartCount();
      });
    </script>
  </body>
</html>
