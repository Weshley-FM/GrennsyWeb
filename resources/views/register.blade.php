<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Greensy</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 20px 0;
        }

        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(45deg, #2b6b46, #36744c, #1f5d42, #4a8056);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            padding: 45px 40px;
            width: 100%;
            max-width: 480px;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideIn 0.8s ease-out;
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo h1 {
            font-size: 2.8rem;
            background: linear-gradient(135deg, #2b6b46, #1f5d42);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
            margin-bottom: 8px;
            animation: logoGlow 2s ease-in-out infinite alternate;
        }

        @keyframes logoGlow {
            from { filter: drop-shadow(0 0 5px rgba(43, 107, 70, 0.3)); }
            to { filter: drop-shadow(0 0 15px rgba(43, 107, 70, 0.6)); }
        }

        .logo p {
            color: #7f8c8d;
            font-size: 0.95rem;
            font-weight: 400;
        }

        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
            flex: 1;
        }

        .form-group.full-width {
            flex: 1 1 100%;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #d5e8dc;
            border-radius: 12px;
            font-size: 0.95rem;
            background: #f6faf7;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-group input:focus, .form-group select:focus {
            border-color: #2b6b46;
            background: white;
            box-shadow: 0 0 0 4px rgba(43, 107, 70, 0.1);
            transform: translateY(-2px);
        }

        .form-group input::placeholder {
            color: #bdc3c7;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #7f8c8d;
            cursor: pointer;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #2b6b46;
        }

        .password-strength {
            margin-top: 8px;
            font-size: 0.8rem;
            display: none;
        }

        .strength-bar {
            width: 100%;
            height: 4px;
            background: #e8f5e8;
            border-radius: 2px;
            margin-bottom: 5px;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #e74c3c; width: 25%; }
        .strength-fair { background: #f39c12; width: 50%; }
        .strength-good { background: #f1c40f; width: 75%; }
        .strength-strong { background: #2b6b46; width: 100%; }

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 25px;
            font-size: 0.9rem;
            color: #5a6c7d;
            line-height: 1.4;
        }

        .terms-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #2b6b46;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .terms-checkbox a {
            color: #2b6b46;
            text-decoration: none;
            font-weight: 600;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        .register-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #2b6b46, #1f5d42);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(43, 107, 70, 0.4);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .register-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #d5e8dc;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 20px;
        }

        .social-register {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .social-btn {
            flex: 1;
            padding: 12px;
            border: 2px solid #d5e8dc;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            text-decoration: none;
            color: #5a6c7d;
            font-size: 0.9rem;
        }

        .social-btn:hover {
            border-color: #2b6b46;
            color: #2b6b46;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .login-link {
            text-align: center;
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .login-link a {
            color: #2b6b46;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #1f5d42;
            text-decoration: underline;
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(43, 107, 70, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 60px;
            height: 60px;
            top: 10%;
            left: 10%;
            animation-delay: -1s;
        }

        .floating-circle:nth-child(2) {
            width: 40px;
            height: 40px;
            top: 70%;
            right: 10%;
            animation-delay: -3s;
        }

        .floating-circle:nth-child(3) {
            width: 80px;
            height: 80px;
            bottom: 20%;
            left: -10%;
            animation-delay: -5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.8rem;
            margin-top: 5px;
            display: none;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #2b6b46;
            display: none;
        }

        @media (max-width: 600px) {
            .register-container {
                margin: 20px;
                padding: 35px 25px;
                max-height: 95vh;
            }
            
            .logo h1 {
                font-size: 2.2rem;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .social-register {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="background-animation"></div>
    
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    <div class="register-container">
        <div class="logo">
            <h1>Greensy</h1>
            <p>Buat akun baru Anda</p>
        </div>

        <div class="success-message" id="successMessage">
            ✅ Registrasi berhasil! Silakan cek email Anda untuk verifikasi.
        </div>

        <form id="registerForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">Nama Depan</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Nama depan" required>
                    <div class="error-message" id="firstNameError"></div>
                </div>
                <div class="form-group">
                    <label for="lastName">Nama Belakang</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Nama belakang" required>
                    <div class="error-message" id="lastNameError"></div>
                </div>
            </div>

            <div class="form-group full-width">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>
                <div class="error-message" id="emailError"></div>
            </div>

            <div class="form-group full-width">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Pilih username unik" required>
                <div class="error-message" id="usernameError"></div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="phone">No. Telefon</label>
                    <input type="tel" id="phone" name="phone" placeholder="08xxxxxxxxxx" required>
                    <div class="error-message" id="phoneError"></div>
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select id="gender" name="gender" required>
                        <option value="">Pilih</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="form-group full-width" style="position: relative;">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Buat password yang kuat" required>
                <button type="button" class="password-toggle" onclick="togglePassword('password')">👁️</button>
                <div class="password-strength" id="passwordStrength">
                    <div class="strength-bar">
                        <div class="strength-fill" id="strengthFill"></div>
                    </div>
                    <div id="strengthText">Kekuatan password: Lemah</div>
                </div>
                <div class="error-message" id="passwordError"></div>
            </div>

            <div class="form-group full-width" style="position: relative;">
                <label for="confirmPassword">Konfirmasi Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Ulangi password" required>
                <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">👁️</button>
                <div class="error-message" id="confirmPasswordError"></div>
            </div>

            <div class="terms-checkbox">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">
                    Saya setuju dengan <a href="#" target="_blank">Syarat & Ketentuan</a> dan 
                    <a href="#" target="_blank">Kebijakan Privasi</a> Greensy
                </label>
            </div>

            <button type="submit" class="register-btn" id="registerBtn">Daftar Sekarang</button>
        </form>

        <div class="divider">
            <span>atau daftar dengan</span>
        </div>

        <div class="social-register">
            <a href="#" class="social-btn">📱 Google</a>
            <a href="#" class="social-btn">📘 Facebook</a>
        </div>

        <div class="login-link">
            Sudah punya akun? <a href="#">Masuk di sini</a>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const toggleBtn = passwordInput.nextElementSibling;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }

        // Password strength checker
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthDiv = document.getElementById('passwordStrength');
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
            if (password.length > 0) {
                strengthDiv.style.display = 'block';
                
                let strength = 0;
                let strengthLabel = '';
                
                // Check password criteria
                if (password.length >= 8) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^A-Za-z0-9]/.test(password)) strength++;
                
                // Update strength display
                strengthFill.className = 'strength-fill';
                switch(strength) {
                    case 0:
                    case 1:
                        strengthFill.classList.add('strength-weak');
                        strengthLabel = 'Lemah';
                        break;
                    case 2:
                        strengthFill.classList.add('strength-fair');
                        strengthLabel = 'Cukup';
                        break;
                    case 3:
                    case 4:
                        strengthFill.classList.add('strength-good');
                        strengthLabel = 'Baik';
                        break;
                    case 5:
                        strengthFill.classList.add('strength-strong');
                        strengthLabel = 'Kuat';
                        break;
                }
                
                strengthText.textContent = `Kekuatan password: ${strengthLabel}`;
            } else {
                strengthDiv.style.display = 'none';
            }
        });

        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
                el.textContent = '';
            });
            
            let isValid = true;
            
            // Validate required fields
            const requiredFields = ['firstName', 'lastName', 'email', 'username', 'phone', 'gender', 'password', 'confirmPassword'];
            
            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                const error = document.getElementById(field + 'Error');
                
                if (!input.value.trim()) {
                    error.textContent = 'Field ini wajib diisi';
                    error.style.display = 'block';
                    isValid = false;
                }
            });
            
            // Validate email format
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email && !emailRegex.test(email)) {
                const emailError = document.getElementById('emailError');
                emailError.textContent = 'Format email tidak valid';
                emailError.style.display = 'block';
                isValid = false;
            }
            
            // Validate phone number
            const phone = document.getElementById('phone').value;
            const phoneRegex = /^[0-9]{10,13}$/;
            if (phone && !phoneRegex.test(phone.replace(/\D/g, ''))) {
                const phoneError = document.getElementById('phoneError');
                phoneError.textContent = 'Nomor telepon tidak valid';
                phoneError.style.display = 'block';
                isValid = false;
            }
            
            // Validate password match
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            if (password !== confirmPassword) {
                const confirmError = document.getElementById('confirmPasswordError');
                confirmError.textContent = 'Password tidak cocok';
                confirmError.style.display = 'block';
                isValid = false;
            }
            
            // Validate terms
            const terms = document.getElementById('terms').checked;
            if (!terms) {
                alert('Anda harus menyetujui Syarat & Ketentuan');
                isValid = false;
            }
            
            if (isValid) {
                // Simulate registration
                const submitBtn = document.getElementById('registerBtn');
                const originalText = submitBtn.textContent;
                submitBtn.textContent = 'Mendaftar...';
                submitBtn.disabled = true;
                
                setTimeout(() => {
                    document.getElementById('successMessage').style.display = 'block';
                    this.reset();
                    document.getElementById('passwordStrength').style.display = 'none';
                    submitBtn.textContent = originalText;
                    submitBtn.disabled = false;
                    
                    // Scroll to top to show success message
                    document.querySelector('.register-container').scrollTop = 0;
                }, 2000);
            }
        });

        // Real-time validation
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('blur', function() {
                const errorDiv = document.getElementById(this.id + 'Error');
                if (errorDiv && this.hasAttribute('required') && !this.value.trim()) {
                    errorDiv.textContent = 'Field ini wajib diisi';
                    errorDiv.style.display = 'block';
                } else if (errorDiv) {
                    errorDiv.style.display = 'none';
                }
            });
        });

        // Animation on input focus
        document.querySelectorAll('input, select').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.01)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
