<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Greensy Market | Kitchen Ingredients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        .hero {
            background-color: #f0fff0;
            padding: 60px 0;
            text-align: center;
        }
        .product-card {
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.02);
        }
        footer {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-success" href="#">Greensy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-4">
                <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#shop">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="#profile">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4 text-success">Welcome to Greensy Market</h1>
            <p class="lead">Your one-stop shop for fresh and organic kitchen ingredients</p>
            <a href="#shop" class="btn btn-success mt-3">Shop Now</a>
        </div>
    </section>

    <!-- ABOUT US SECTION -->
    <section id="about" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4">About Us</h2>
            <p class="text-center w-75 mx-auto">
                Greensy Market is committed to bringing high-quality, eco-friendly kitchen essentials directly to your home.
                From local farmers to your table, we ensure freshness, affordability, and sustainability every step of the way.
            </p>
        </div>
    </section>

    <!-- SHOP SECTION -->
    <section id="shop" class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0 text-success">Shop Ingredients</h2>

                <!-- SEARCH BAR -->
                <form class="d-flex" role="search" onsubmit="event.preventDefault(); filterProducts();">
                    <input class="form-control me-2" id="searchInput" type="search" placeholder="Search ingredients...">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>

            @if($products->count())
                <div class="row g-4" id="productList">
                    @foreach ($products as $product)
                        <div class="col-md-3 product">
                            <div class="card product-card h-100 shadow-sm">
                                <img src="{{ $product->img ? asset('storage/' . $product->img) : asset('images/default.jpg') }}"
                                     class="card-img-top"
                                     alt="{{ $product->name }}">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-muted">{{ $product->size }} - Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                                    <button class="btn btn-outline-success">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted">No products available at the moment.</p>
            @endif
        </div>
    </section>

    <!-- PROFILE SECTION -->
    <section id="profile" class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-4">Your Profile</h2>
            <div class="card mx-auto" style="max-width: 400px;">
                <div class="card-body text-center">
                    <img src="https://via.placeholder.com/100" class="rounded-circle mb-3" alt="Profile">
                    <h5 class="card-title">Guest User</h5>
                    <p class="card-text">Log in to manage your orders and save favorite items.</p>
                    <a href="/login" class="btn btn-success">Login</a>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- FOOTER -->
<footer class="text-center py-3 mt-auto">
    <div class="container">
        <p class="mb-0">&copy; {{ date('Y') }} Greensy Market. All rights reserved.</p>
        <small>Email: greensy@example.com | WhatsApp: 0812-3456-7890</small>
    </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function filterProducts() {
        const query = document.getElementById("searchInput").value.toLowerCase();
        const products = document.querySelectorAll(".product");
        products.forEach(product => {
            const title = product.querySelector(".card-title").textContent.toLowerCase();
            product.style.display = title.includes(query) ? "" : "none";
        });
    }
</script>
</body>
</html>
