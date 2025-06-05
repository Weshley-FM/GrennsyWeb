<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Greensy Market | Your Cart</title>
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
            background-color: #f0fff0;
            padding: 60px 0;
        }
        .table thead {
            background-color: #d4edda;
        }
        .table tbody tr:hover {
            background-color: #f6fdf6;
        }
        .btn-outline-success:hover {
            background-color: #198754;
            color: #fff;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
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
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#shop">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="#profile">Profile</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="container">
        <h2 class="text-success mb-4 text-center">Your Cart</h2>

        @if($cartItems->count())
            <form method="POST" action="{{ route('transactions.update') }}">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered bg-white shadow-sm align-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th style="width: 120px;">Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cartTable">
                            @foreach($cartItems as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ $item->product->name }}</td>
                                    <td>Rp{{ number_format($item->product->price, 0, ',', '.') }}</td>
                                    <td>
                                        <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" min="1"
                                               class="form-control quantity-input">
                                    </td>
                                    <td class="item-total fw-bold text-success">
                                        Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-sm btn-outline-danger">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Grand Total:</td>
                                <td id="grandTotal" class="fw-bold text-success">Rp0</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Update Cart</button>
                    <a href="{{ route('checkout') }}" class="btn btn-outline-success ms-2">Proceed to Checkout</a>
                </div>
            </form>
        @else
            <p class="text-center text-muted">Your cart is currently empty.</p>
        @endif
    </div>
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
    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    }

    function updateTotals() {
        let grandTotal = 0;

        document.querySelectorAll('#cartTable tr').forEach(row => {
            const priceText = row.children[1].textContent.replace(/[^\d]/g, '');
            const price = parseInt(priceText);
            const qty = parseInt(row.querySelector('.quantity-input').value) || 1;
            const itemTotal = price * qty;

            row.querySelector('.item-total').textContent = formatRupiah(itemTotal);
            grandTotal += itemTotal;
        });

        document.getElementById('grandTotal').textContent = formatRupiah(grandTotal);
    }

    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('input', updateTotals);
    });

    window.addEventListener('DOMContentLoaded', updateTotals);
</script>

</body>
</html>
