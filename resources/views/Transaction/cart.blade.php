<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Toko Sayur Segar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
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
            font-size: 2.5em;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.9;
            position: relative;
            z-index: 1;
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
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #2b6b46;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 50px;
            height: 3px;
            background: #1e4d31;
            border-radius: 2px;
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
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .item-price {
            color: #2b6b46;
            font-size: 1.1em;
            font-weight: bold;
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
            font-size: 1.1em;
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

        @media (max-width: 768px) {
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
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🥬 Checkout</h1>
            <p>Sayuran Segar Langsung ke Rumah Anda</p>
        </div>

        <div class="content">
            <!-- Keranjang Belanja -->
            <div class="section">
                <h2 class="section-title">🛒 Keranjang Belanja</h2>
                
                <div class="cart-item">
                    <img src="https://images.unsplash.com/photo-1590779033100-9f60a05a013d?w=200&h=200&fit=crop" alt="Bayam" class="item-image">
                    <div class="item-details">
                        <div class="item-name">Bayam Segar</div>
                        <div class="item-price">Rp 8,000 / ikat</div>
                    </div>
                    <div class="item-quantity">
                        <button class="quantity-btn" onclick="changeQuantity(this, -1)">-</button>
                        <span class="quantity-display">2</span>
                        <button class="quantity-btn" onclick="changeQuantity(this, 1)">+</button>
                    </div>
                </div>

                <div class="cart-item">
                    <img src="https://images.unsplash.com/photo-1582515073490-39981397c445?w=200&h=200&fit=crop" alt="Wortel" class="item-image">
                    <div class="item-details">
                        <div class="item-name">Wortel Organik</div>
                        <div class="item-price">Rp 12,000 / kg</div>
                    </div>
                    <div class="item-quantity">
                        <button class="quantity-btn" onclick="changeQuantity(this, -1)">-</button>
                        <span class="quantity-display">1</span>
                        <button class="quantity-btn" onclick="changeQuantity(this, 1)">+</button>
                    </div>
                </div>

                <div class="cart-item">
                    <img src="https://images.unsplash.com/photo-1540420773420-3366772f4999?w=200&h=200&fit=crop" alt="Brokoli" class="item-image">
                    <div class="item-details">
                        <div class="item-name">Brokoli Hijau</div>
                        <div class="item-price">Rp 15,000 / buah</div>
                    </div>
                    <div class="item-quantity">
                        <button class="quantity-btn" onclick="changeQuantity(this, -1)">-</button>
                        <span class="quantity-display">1</span>
                        <button class="quantity-btn" onclick="changeQuantity(this, 1)">+</button>
                    </div>
                </div>

                <div class="cart-item">
                    <img src="https://images.unsplash.com/photo-1586016158394-1b51aa7e6eb8?w=200&h=200&fit=crop" alt="Tomat" class="item-image">
                    <div class="item-details">
                        <div class="item-name">Tomat Merah</div>
                        <div class="item-price">Rp 10,000 / kg</div>
                    </div>
                    <div class="item-quantity">
                        <button class="quantity-btn" onclick="changeQuantity(this, -1)">-</button>
                        <span class="quantity-display">2</span>
                        <button class="quantity-btn" onclick="changeQuantity(this, 1)">+</button>
                    </div>
                </div>

                <div class="total-section">
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span id="subtotal">Rp 71,000</span>
                    </div>
                    <div class="total-row">
                        <span>Ongkos Kirim:</span>
                        <span>Rp 10,000</span>
                    </div>
                    <div class="total-row total-final">
                        <span>Total:</span>
                        <span id="total">Rp 81,000</span>
                    </div>
                </div>
            </div>

            <!-- Form Alamat Pengiriman -->
            <div class="section">
                <h2 class="section-title">📍 Alamat Pengiriman</h2>
                
                <form id="shipping-form">
                    <div class="form-group">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" id="fullName" name="fullName" class="form-input" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" class="form-input" placeholder="08xxxxxxxxxx" required>
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
                        <input type="text" id="postalCode" name="postalCode" class="form-input" placeholder="12345" required>
                    </div>

                    <div class="form-group">
                        <label for="notes" class="form-label">Catatan Pengiriman (Opsional)</label>
                        <textarea id="notes" name="notes" class="form-input" placeholder="Catatan khusus untuk kurir..."></textarea>
                    </div>
                </form>
            </div>

            <!-- Metode Pembayaran -->
            <div class="section">
                <h2 class="section-title">💳 Metode Pembayaran</h2>
                
                <div class="payment-options">
                    <label class="payment-option">
                        <input type="radio" name="payment" value="cod" class="payment-radio" checked>
                        <div class="payment-card">
                            <div class="payment-icon">💵</div>
                            <div class="payment-info">
                                <h3>Bayar di Tempat</h3>
                                <p>Cash on Delivery (COD)</p>
                            </div>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="payment" value="transfer" class="payment-radio">
                        <div class="payment-card">
                            <div class="payment-icon">🏦</div>
                            <div class="payment-info">
                                <h3>Transfer Bank</h3>
                                <p>BCA, BNI, Mandiri</p>
                            </div>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="payment" value="ewallet" class="payment-radio">
                        <div class="payment-card">
                            <div class="payment-icon">📱</div>
                            <div class="payment-info">
                                <h3>E-Wallet</h3>
                                <p>GoPay, OVO, DANA</p>
                            </div>
                        </div>
                    </label>

                    <label class="payment-option">
                        <input type="radio" name="payment" value="qris" class="payment-radio">
                        <div class="payment-card">
                            <div class="payment-icon">📲</div>
                            <div class="payment-info">
                                <h3>QRIS</h3>
                                <p>Scan & Pay</p>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <button class="checkout-btn" onclick="processOrder()">
                🚚 Pesan Sekarang - Rp 81,000
            </button>
        </div>
    </div>

    <script>
        function changeQuantity(button, change) {
            const quantityDisplay = button.parentNode.querySelector('.quantity-display');
            let currentQuantity = parseInt(quantityDisplay.textContent);
            let newQuantity = currentQuantity + change;
            
            if (newQuantity < 1) newQuantity = 1;
            
            quantityDisplay.textContent = newQuantity;
            updateTotal();
            
            // Add animation effect
            quantityDisplay.style.transform = 'scale(1.2)';
            setTimeout(() => {
                quantityDisplay.style.transform = 'scale(1)';
            }, 150);
        }

        function updateTotal() {
            // Simulate total calculation
            const items = document.querySelectorAll('.cart-item');
            let subtotal = 0;
            
            items.forEach(item => {
                const priceText = item.querySelector('.item-price').textContent;
                const price = parseInt(priceText.replace(/\D/g, ''));
                const quantity = parseInt(item.querySelector('.quantity-display').textContent);
                subtotal += price * quantity;
            });
            
            const shipping = 10000;
            const total = subtotal + shipping;
            
            document.getElementById('subtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
            document.getElementById('total').textContent = `Rp ${total.toLocaleString('id-ID')}`;
            document.querySelector('.checkout-btn').innerHTML = `🚚 Pesan Sekarang - Rp ${total.toLocaleString('id-ID')}`;
        }

        function processOrder() {
            const form = document.getElementById('shipping-form');
            const paymentMethod = document.querySelector('input[name="payment"]:checked').value;
            
            if (form.checkValidity()) {
                // Simulate order processing
                const button = document.querySelector('.checkout-btn');
                button.innerHTML = '⏳ Memproses Pesanan...';
                button.disabled = true;
                
                setTimeout(() => {
                    alert('🎉 Pesanan berhasil! Sayuran segar akan segera dikirim ke alamat Anda.');
                    button.innerHTML = '✅ Pesanan Berhasil';
                }, 2000);
            } else {
                form.reportValidity();
                alert('⚠️ Mohon lengkapi semua field yang diperlukan!');
            }
        }

        // Add smooth scroll effect for form validation
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-input');
            inputs.forEach(input => {
                input.addEventListener('invalid', function() {
                    this.scrollIntoView({ behavior: 'smooth', block: 'center' });
                });
            });
        });

        // Initialize total calculation
        updateTotal();
    </script>
</body>
</html>