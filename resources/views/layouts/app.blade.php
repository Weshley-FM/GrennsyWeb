<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greensy Market | Kitchen Ingredients</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* CSS Umum Anda (dari kode yang Anda berikan sebelumnya) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #fdf9fd;
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
        
        /* CSS Tambahan untuk Halaman Autentikasi (Login/Register) */
        @if(Route::is('login') || Route::is('register'))
        body.auth-centered { /* Class ini akan ditambahkan ke body oleh script di bawah */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f2f8f4; /* Anda bisa menyesuaikan warna background khusus auth */
        }
        .auth-card {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .logo-container a {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2b6b46;
            text-decoration: none;
        }
        @endif
        /* End CSS Tambahan */

        /* Hero Section */
        .hero {
            position: relative;
            height: 575px;
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
            padding: 60px 20px;
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
    {{-- BAGIAN HEADER (NAVBAR) --}}
    @if (!Route::is('login') && !Route::is('register'))
        <header>
            <div class="nav-container">
                <a class="navbar-brand fw-bold text-success" href="{{ route('landing') }}">GREENSY</a>
                <ul class="nav-links">
                    <li><a href="{{ route('landing') }}">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#about">About</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link" style="background:none; border:none; color:inherit; cursor:pointer; padding:0;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
                <div class="user-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Search...">
                        <button type="submit">🔍</button>
                    </div>
                    <div class="user-actions">
                        @guest
                            <a href="{{ route('login') }}" class="login-btn">👤 Login</a>
                        @endguest
                        <a href="{{ route('cart.index') }}" class="cart-btn">🛒 <span class="cart-count">0</span></a>
                    </div>
                </div>
            </div>
        </header>
    @endif

    {{-- BAGIAN KONTEN SPESIFIK HALAMAN --}}
    <main>
        @yield('content') {{-- Ini adalah placeholder utama untuk konten dari view lain --}}
    </main>

    {{-- BAGIAN FOOTER --}}
    @if (!Route::is('login') && !Route::is('register'))
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
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Script untuk menambahkan class ke body jika di halaman auth (login/register) --}}
    @if(Route::is('login') || Route::is('register'))
    <script>
        document.body.classList.add('auth-centered');
    </script>
    @endif

    {{-- Placeholder untuk script tambahan dari view lain --}}
    @stack('scripts')
</body>
</html>