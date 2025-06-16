<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Greensy Market</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #fdf9fd;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navigation */
        header {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
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
            margin: 0;
            padding: 0;
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
            color: #333;
            text-decoration: none;
        }

        .login-btn:hover, .cart-btn:hover {
            color: #2b6b46;
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

        /* Main content area */
        .main-content {
            flex: 1;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            background: linear-gradient(135deg, #2b6b46, #1e4d31);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(255,255,255,0.05) 10px,
                rgba(255,255,255,0.05) 20px
            );
            animation: shimmer 3s linear infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .header p {
            font-size: 1.5rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
            line-height: 1.4;
        }

        .content {
            padding: 40px;
        }

        .section {
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
        }

        .section:nth-child(1) { animation-delay: 0.2s; }
        .section:nth-child(2) { animation-delay: 0.4s; }
        .section:nth-child(3) { animation-delay: 0.6s; }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .section-title {
            text-align: left;
            font-size: 2rem;
            color: #2b6b46;
            margin-bottom: 40px;
            position: relative;
            padding-bottom: 10px;
            border-bottom: 3px solid #2b6b46;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 80px;
            height: 3px;
            background-color: #2b6b46;
            border-radius: 2px;
        }

        /* Empty cart styles */
        .empty-cart {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .empty-cart-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-cart h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
        }

        .empty-cart p {
            font-size: 1rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .shop-now-btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #2b6b46;
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            border: 2px solid #2b6b46;
        }

        .shop-now-btn:hover {
            background-color: #1e4d31;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(43, 107, 70, 0.3);
        }

        .cart-item {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 2px solid #f0f0f0;
            border-radius: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #f9f9f9, #ffffff);
        }

        .cart-item:hover {
            border-color: #2b6b46;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(43, 107, 70, 0.15);
        }

        .item-image {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            margin-right: 20px;
            object-fit: cover;
            border: 3px solid #e0e0e0;
            transition: transform 0.3s ease;
        }

        .cart-item:hover .item-image {
            transform: scale(1.05);
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .item-price {
            color: #2b6b46;
            font-weight: 700;
            font-size: 1em;
        }

        .item-quantity {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        .quantity-btn {
            background: #2b6b46;
            color: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2em;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantity-btn:hover {
            background: #1e4d31;
            transform: scale(1.1);
        }

        .quantity-display {
            margin: 0 15px;
            font-size: 1.2em;
            font-weight: bold;
            min-width: 30px;
            text-align: center;
        }

        .remove-item {
            background: #dc3545;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1em;
            margin-left: 15px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .remove-item:hover {
            background: #c82333;
            transform: scale(1.1);
        }

        .total-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 25px;
            border-radius: 15px;
            border: 2px solid #2b6b46;
            margin: 30px 0;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .total-final {
            font-size: 1.5em;
            font-weight: bold;
            color: #2b6b46;
            border-top: 2px solid #2b6b46;
            padding-top: 15px;
            margin-top: 15px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
            font-size: 1em;
        }

        .form-input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 12px;
            font-size: 1em;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #fafafa, #ffffff);
        }

        .form-input:focus {
            outline: none;
            border-color: #2b6b46;
            box-shadow: 0 0 20px rgba(43, 107, 70, 0.2);
            transform: translateY(-1px);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .payment-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .payment-option {
            position: relative;
            cursor: pointer;
        }

        .payment-radio {
            position: absolute;
            opacity: 0;
        }

        .payment-card {
            display: flex;
            align-items: center;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            height: 100%;
        }

        .payment-radio:checked + .payment-card {
            border-color: #2b6b46;
            background: linear-gradient(135deg, #e8f3ec, #f0f7f2);
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(43, 107, 70, 0.2);
        }

        .payment-icon {
            font-size: 2em;
            margin-right: 15px;
            transition: transform 0.3s ease;
        }

        .payment-radio:checked + .payment-card .payment-icon {
            transform: scale(1.2);
        }

        .payment-info h3 {
            margin-bottom: 5px;
            color: #333;
            font-size: 1.1em;
        }

        .payment-info p {
            color: #666;
            font-size: 0.9em;
        }

        .checkout-btn {
            background: linear-gradient(135deg, #2b6b46, #1e4d31);
            color: white;
            border: none;
            padding: 20px 40px;
            border-radius: 50px;
            font-size: 1.3em;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            margin-top: 30px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .checkout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        .checkout-btn:hover::before {
            left: 100%;
        }

        .checkout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(43, 107, 70, 0.4);
        }

        .checkout-btn:active {
            transform: translateY(-1px);
        }

        .checkout-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .checkout-section {
            display: none;
        }

        .checkout-section.show {
            display: block;
        }

        /* Footer */
        footer {
            background-color: #1d4731;
            color: #fff;
            padding: 60px 20px 30px;
            margin-top: auto;
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
            padding: 0;
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

        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px 20px;
            }
            .nav-links {
                flex-direction: column;
                width: 100%;
                margin-top: 15px;
            }
            .nav-links li {
                margin: 10px 0;
            }
            .user-actions {
                flex-direction: column;
                width: 100%;
                margin-top: 15px;
                align-items: flex-start;
            }
            .search-box {
                margin-right: 0;
                margin-bottom: 10px;
                width: 100%;
            }
            .search-box input {
                width: 100%;
            }
            .login-btn, .cart-btn {
                margin-left: 0;
                margin-top: 10px;
            }

            .header h1 {
                font-size: 2rem;
            }
            .header p {
                font-size: 1.2rem;
            }
            .section-title {
                font-size: 1.5rem;
            }

            .container {
                margin: 10px;
                border-radius: 15px;
            }
            
            .content {
                padding: 20px;
            }
            
            .cart-item {
                flex-direction: column;
                text-align: center;
            }
            
            .item-image {
                margin: 0 0 15px 0;
            }
            
            .item-quantity {
                margin: 15px 0 0 0;
            }
            
            .payment-options {
                grid-template-columns: 1fr;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .footer-column {
                text-align: center;
            }
            .copyright {
                flex-direction: column;
                text-align: center;
            }
            .social-links {
                margin-top: 15px;
            }
            .social-links a {
                margin: 0 8px;
            }
        }

        @media (max-width: 576px) {
            .nav-links li {
                margin-left: 0;
            }
            .header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="nav-container">
            <a class="navbar-brand fw-bold text-success" href="/">GREENSY</a>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="/#shop">Shop</a></li>
                <li><a href="/#about">About</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
            <div class="user-actions">
                <div class="search-box">
                    <input type="text" placeholder="Search...">
                    <button type="submit">🔍</button>
                </div>
                <div class="user-actions">
                    <a href="{{ route('login') }}" class="login-btn">👤 Login</a>
                    <a href="#" class="cart-btn">🛒 <span class="cart-count" id="cartCount">0</span></a>
                </div>
            </div>
        </div>
    </header>

    <div class="main-content">
        <div class="container">
            <div class="header">
                <h1>🥬 Checkout</h1>
                <p>Sayuran Segar Langsung ke Rumah Anda</p>
            </div>

            <div class="content">
                <div class="section">
                    <h2 class="section-title">🛒 Keranjang Belanja</h2>

                    <!-- Empty Cart State -->
                    <div class="empty-cart" id="emptyCart">
                        <div class="empty-cart-icon">🛒</div>
                        <h3>Keranjang Belanja Kosong</h3>
                        <p>Belum ada produk yang ditambahkan ke keranjang.<br>
                        Silakan kembali ke halaman utama untuk berbelanja.</p>
                        <a href="/" class="shop-now-btn">Mulai Belanja</a>
                    </div>

                    <!-- Cart Items List (Hidden initially) -->
                    <div class="cart-items-list" id="cartItemsList" style="display: none;">
                        <!-- Cart items will be populated here by JavaScript -->
                    </div>

                    <!-- Total Section (Hidden initially) -->
                    <div class="total-section" id="totalSection" style="display: none;">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span id="subtotal">Rp 0</span>
                        </div>
                        <div class="total-row">
                            <span>Ongkos Kirim:</span>
                            <span>Rp 10,000</span>
                        </div>
                        <div class="total-row total-final">
                            <span>Total:</span>
                            <span id="total">Rp 10,000</span>
                        </div>
                    </div>
                </div>

                <!-- Checkout Form Section (Hidden initially) -->
                <div class="checkout-section" id="checkoutSection">
                    <form id="checkoutForm">
                        <div class="section">
                            <h2 class="section-title">📍 Alamat Pengiriman</h2>
                            
                            <div class="form-group">
                                <label for="fullName" class="form-label">Nama Lengkap</label>
                                <input type="text" id="fullName" name="full_name" class="form-input" placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="tel" id="phone" name="phone_number" class="form-input" placeholder="08xxxxxxxxxx" required>
                            </div>

                            <div class="form-group">
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea id="address" name="address" class="form-input form-textarea" placeholder="Jalan, No. Rumah, RT/RW, Kelurahan..." required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="city" class="form-label">Kota</label>
                                <input type="text" id="city" name="city" class="form-input" placeholder="Nama kota" required>
                            </div>

                            <div class="form-group">
                                <label for="postalCode" class="form-label">Kode Pos</label>
                                <input type="text" id="postalCode" name="postal_code" class="form-input" placeholder="12345" required>
                            </div>

                            <div class="form-group">
                                <label for="notes" class="form-label">Catatan Pengiriman (Opsional)</label>
                                <textarea id="notes" name="notes" class="form-input" placeholder="Catatan khusus untuk kurir..."></textarea>
                            </div>
                        </div>

                        <div class="section">
                            <h2 class="section-title">💳 Metode Pembayaran</h2>
                            
                            <div class="payment-options">
                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="cod" class="payment-radio" checked>
                                    <div class="payment-card">
                                        <div class="payment-icon">💵</div>
                                        <div class="payment-info">
                                            <h3>Bayar di Tempat</h3>
                                            <p>Cash on Delivery (COD)</p>
                                        </div>
                                    </div>
                                </label>

                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="transfer" class="payment-radio">
                                    <div class="payment-card">
                                        <div class="payment-icon">🏦</div>
                                        <div class="payment-info">
                                            <h3>Transfer Bank</h3>
                                            <p>BCA, BNI, Mandiri</p>
                                        </div>
                                    </div>
                                </label>

                                <label class="payment-option">
                                    <input type="radio" name="payment_method" value="ewallet" class="payment-radio">
                                    <div class="payment-card">
                                        <div class="payment-icon">📱</div>
                                        <div class="payment-info">
                                            <h3>E-Wallet</h3>
                                            <p>GoPay, OVO, DANA</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="checkout-btn" id="checkoutBtn" disabled>
                            🚚 Pesan Sekarang - Rp 0
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Store</h3>
                <ul class="footer-links">
                    <li><a href="#">Shop all</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                    <li><a href="#">Share Picky</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Address</h3>
                <p class="address">
                    500 Terry Francine Street<br>
                    San Francisco, CA 94158
                </p>
            </div>
            
            <div class="footer-column">
                <h3>OPENING HOURS</h3>
                <p class="hours">
                    Mon - Fri: 7am - 10pm<br>
                    Saturday: 8am - 10pm<br>
                    Sunday: 8am - 11pm
                </p>
            </div>
        </div>
        
        <div class="copyright">
            <p>© 2025 by Greensy. Powered and secured by Laravel</p>
            <div class="social-links">
                <a href="#">✕</a>
                <a href="#">📷</a>
                <a href="#">📧</a>
                <a href="#">▶️</a>
            </div>
        </div>
    </footer>

    <script>
        // Cart management
        let cart = [];

        // Load cart from localStorage on page load
        function loadCart() {
            const savedCart = localStorage.getItem('greensyCart');
            if (savedCart) {
                cart = JSON.parse(savedCart);
                displayCart();
                updateCartCount();
            }
        }

        // Save cart to localStorage
        function saveCart() {
            localStorage.setItem('greensyCart', JSON.stringify(cart));
        }

        // Update cart count in navbar
        function updateCartCount() {
            const cartCount = document.getElementById('cartCount');
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
        }

        // Display cart items
        function displayCart() {
            const emptyCart = document.getElementById('emptyCart');
            const cartItemsList = document.getElementById('cartItemsList');
            const totalSection = document.getElementById('totalSection');
            const checkoutSection = document.getElementById('checkoutSection');
            const checkoutBtn = document.getElementById('checkoutBtn');

            if (cart.length === 0) {
                emptyCart.style.display = 'block';
                cartItemsList.style.display = 'none';
                totalSection.style.display = 'none';
                checkoutSection.classList.remove('show');
                checkoutBtn.disabled = true;
                return;
            }

            emptyCart.style.display = 'none';
            cartItemsList.style.display = 'block';
            totalSection.style.display = 'block';
            checkoutSection.classList.add('show');
            checkoutBtn.disabled = false;

            // Clear existing items
            cartItemsList.innerHTML = '';

            // Add each cart item
            cart.forEach((item, index) => {
                const cartItemDiv = document.createElement('div');