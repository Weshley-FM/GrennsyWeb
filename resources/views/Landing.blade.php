<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greensy Market | Kitchen Ingredients</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #fdf9fd
        }

        /* Navigation */
        header {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .logo {
            color: #2b6b46;
            font-weight: 700;
            font-size: 24px;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 25px;
        }

        .nav-links a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #2b6b46;
        }

        .user-actions {
            display: flex;
            align-items: center;
        }

        .search-box {
            position: relative;
            margin-right: 15px;
        }

        .search-box input {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
            width: 180px;
            transition: all 0.3s;
        }

        .search-box input:focus {
            width: 220px;
            border-color: #2b6b46;
        }

        .search-box button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
        }

        .login-btn, .cart-btn {
            background: none;
            border: none;
            cursor: pointer;
            margin-left: 15px;
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #2b6b46;
            color: white;
            font-size: 12px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Hero Section */
        .hero {
            position: relative;
            height: 600px;
            background-color: #f5f5f5;
            overflow: hidden;
            margin-bottom: 50px;
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.9;
        }

        .hero-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 10%;
            background: linear-gradient(90deg, rgba(43, 107, 70, 0.8) 0%, rgba(43, 107, 70, 0.4) 50%, rgba(255,255,255,0) 100%);
        }

        .hero-title {
            color: #fff;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            max-width: 500px;
        }

        .hero-subtitle {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 30px;
            max-width: 500px;
            line-height: 1.4;
        }

        .shop-btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #fff;
            color: #2b6b46;
            text-decoration: none;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            border: 2px solid #fff;
            width: fit-content;
        }

        .shop-btn:hover {
            background-color: transparent;
            color: #fff;
        }

        /* Shop Section */
        .shop-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            color: #2b6b46;
            margin-bottom: 40px;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: #2b6b46;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
        }

        .product-card {
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        /* Product card animation when clicked */
        .product-card.clicked {
            animation: pulse 0.5s ease-in-out;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .product-image {
            width: 100%;
            height: 180px;
            object-fit: contain;
            background-color: #f9f9f9;
            padding: 15px;
            transition: transform 0.3s;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .product-price {
            color: #2b6b46;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .add-to-cart {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-btn-small {
            background-color: #2b6b46;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
        }

        .cart-btn-small:hover {
            background-color: #1e4e32;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        /* About Section */
        .about-section {
            padding: 100px 20px;
            background-color: #f2f8f4;
        }

        .features {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature {
            text-align: center;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }

        .feature:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3rem;
            color: #2b6b46;
            margin-bottom: 20px;
        }

        .feature-title {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 15px;
        }

        .feature-desc {
            color: #666;
            line-height: 1.6;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .profile-section {
            background-color: #e5e5e5;
            border-radius: 10px;
            padding: 70px;
            margin-bottom: 30px;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-details {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .profile-field {
            margin-bottom: 15px;
        }

        .profile-field label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            color: #444;
        }

        .profile-field input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }

        /* Transaction History */
        .transactions-section {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .section-title {
            font-size: 22px;
            color: #2c6e49;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .transaction-list {
            width: 100%;
            border-collapse: collapse;
        }

        .transaction-list th {
            text-align: left;
            padding: 15px 10px;
            background-color: #f0f7f4;
            border-bottom: 2px solid #2c6e49;
            color: #2c6e49;
        }

        .transaction-list td {
            padding: 15px 10px;
            border-bottom: 1px solid #eee;
        }

        .transaction-list tr:hover {
            background-color: #f9f9f9;
        }

        .status {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .completed {
            background-color: #d1f2d9;
            color: #0e8c3a;
        }

        .processed {
            background-color: #fff5cc;
            color: #d4a017;
        }

        .canceled {
            background-color: #ffe5e5;
            color: #e53935;
        }

        /* Footer */
        footer {
            background-color: #1d4731;
            color: #fff;
            padding: 60px 20px 30px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .footer-column h3 {
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: #fff;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .address, .hours {
            color: #ccc;
            line-height: 1.6;
        }

        .copyright {
            max-width: 1200px;
            margin: 40px auto 0;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .social-links a {
            color: #ccc;
            margin-left: 15px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #fff;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .search-box {
                display: none;
            }

            .feature {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .nav-links li {
                margin-left: 15px;
            }

            .hero {
                height: 400px;
            }

            .hero-content {
                padding-left: 5%;
            }

            .hero-title {
                font-size: 1.8rem;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <header>
        <div class="nav-container">
            <a class="navbar-brand fw-bold text-success" href="#">GREENSY</a>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#shop">Shop</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#profil">Profil</a></li>
            </ul>
            <div class="user-actions">
                <div class="search-box">
                    <input type="text" id="searchInput" placeholder="Search..." oninput="filterProducts()">
                    <button type="submit">🔍</button>
                </div>
                <div class="user-actions">
                    <a href="{{ route('login') }}" class="login-btn">👤 Login</a>
                    <a href="{{ route('cart.index') }}" class="cart-btn">🛒 <span class="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span></a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero section -->
    <section class="hero">
        <img src="{{ asset('storage/images/herosection.png') }}" alt="herosection.png" class="hero-image">
        <div class="hero-content">
            <h1 class="hero-title">GREENSY MARKET</h1>
            <p class="hero-subtitle">WE'LL DELIVER EVERYTHING YOU NEED</p>
            <a href="#shop" class="shop-btn">SHOP ONLINE</a>
        </div>
    </section>

    <!-- Shop Section -->
    <section id="shop" class="shop-section">
        <h2 class="section-title">Greensy Shop</h2>
        <div class="products-grid">
            @if($products->count())
                @foreach ($products as $product)
                    <div class="product-card product" data-name="{{ strtolower($product->name) }}">
                        <img src="{{ $product->img ? asset('storage/' . $product->img) : asset('images/default.jpg') }}"
                             alt="{{ $product->name }}"
                             class="product-image">
                        <div class="product-info">
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-price">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            <div class="add-to-cart">
                                <button class="cart-btn-small">Add + </button>
                                <div class="quantity">0 +</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Belum ada produk yang tersedia.</p>
            @endif
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <h2 class="section-title">About Greensy Shop</h2>
        <div class="features">
            <div class="feature">
                <div class="feature-icon">💰</div>
                <h3 class="feature-title">Affordable Prices</h3>
                <p class="feature-desc">We offer quality products and services at prices that won't break the bank. Enjoy great value without compromising on excellence.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">📦</div>
                <h3 class="feature-title">Same Day Delivery</h3>
                <p class="feature-desc">Order today, receive it today! Our same-day delivery service ensures speed and convenience for your needs.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">🛡️</div>
                <h3 class="feature-title">Health & Safety Rules</h3>
                <p class="feature-desc">Your safety is our top priority. We follow strict health and safety protocols in every step of our service and delivery process.</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="profile-section">
            <div class="profile-header">
                <h2>Profil</h2>
            </div>
            <div class="profile-details">
                <div class="profile-field">
                    <label for="username">Username</label>
                    <input type="text" id="username" value="" readonly>
                </div>
                <div class="profile-field">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="" readonly>
                </div>
                <div class="profile-field">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" value="" readonly>
                </div>
                <div class="profile-field">
                    <label for="address">Alamat</label>
                    <input type="text" id="address" value="" readonly>
                </div>
            </div>
        </div>

        <div class="transactions-section">
            <h3 class="section-title">Riwayat Transaksi</h3>
            <table class="transaction-list">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Tanggal</th>
                        <th>Produk</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>#ORD-2025-5721</td><td>12 Mei 2025</td><td>Monstera Deliciosa, Fiddle Leaf Fig</td><td>Rp450.000</td><td><span class="status completed">Selesai</span></td></tr>
                    <tr><td>#ORD-2025-5682</td><td>5 Mei 2025</td><td>Snake Plant, Soil Mix Premium</td><td>Rp275.000</td><td><span class="status completed">Selesai</span></td></tr>
                    <tr><td>#ORD-2025-5590</td><td>27 April 2025</td><td>Ceramic Pot Medium, Plant Food</td><td>Rp320.000</td><td><span class="status processed">Diproses</span></td></tr>
                    <tr><td>#ORD-2025-5523</td><td>20 April 2025</td><td>Aloe Vera, Succulent Set</td><td>Rp185.000</td><td><span class="status canceled">Dibatalkan</span></td></tr>
                    <tr><td>#ORD-2025-5431</td><td>8 April 2025</td><td>Peace Lily, Gardening Tools</td><td>Rp395.000</td><td><span class="status completed">Selesai</span></td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Store</h3>
                <ul class="footer-links">
                    <li><a href="#shop">Shop all</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                    <li><a href="#">Share Picky</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Address</h3>
                <p class="address">500 Terry Francine Street<br>San Francisco, CA 94158</p>
            </div>
            <div class="footer-column">
                <h3>OPENING HOURS</h3>
                <p class="hours">Mon - Fri: 7am - 10pm<br>Saturday: 8am - 10pm<br>Sunday: 8am - 11pm</p>
            </div>
        </div>
        <div class="copyright">
            <p>© 2025 by Greensy. Powered and secured by Laravel</p>
        </div>
    </footer>

    <script>
        // Add click animation to product cards
        const productCards = document.querySelectorAll('.product-card');

        productCards.forEach(card => {
            card.addEventListener('click', function () {
                this.classList.add('clicked');
                setTimeout(() => this.classList.remove('clicked'), 500);
                const cartCount = document.querySelector('.cart-count');
                cartCount.textContent = parseInt(cartCount.textContent) + 1;
                const quantityDisplay = this.querySelector('.quantity');
                const currentQuantity = parseInt(quantityDisplay.textContent);
                quantityDisplay.textContent = (currentQuantity + 1) + ' +';
            });
        });

        // Add to cart button functionality
        const addToCartButtons = document.querySelectorAll('.cart-btn-small');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.stopPropagation();
                const productCard = this.closest('.product-card');
                productCard.classList.add('clicked');
                setTimeout(() => productCard.classList.remove('clicked'), 500);
                const cartCount = document.querySelector('.cart-count');
                cartCount.textContent = parseInt(cartCount.textContent) + 1;
                const quantityDisplay = productCard.querySelector('.quantity');
                const currentQuantity = parseInt(quantityDisplay.textContent);
                quantityDisplay.textContent = (currentQuantity + 1) + ' +';
            });
        });

        // Search function
        function filterProducts() {
            const query = document.getElementById("searchInput").value.toLowerCase();
            const products = document.querySelectorAll(".product-card");
            products.forEach(product => {
                const name = product.getAttribute('data-name');
                if (name.includes(query)) {
                    product.style.display = "";
                } else {
                    product.style.display = "none";
                }
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
