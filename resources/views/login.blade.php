<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Greensy</title>
    <style>
        /* CSS yang Anda berikan, tidak perlu perubahan di sini */
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

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideIn 0.8s ease-out;
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
            margin-bottom: 40px;
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

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .form-group input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #d5e8dc;
            border-radius: 12px;
            font-size: 1rem;
            background: #f6faf7;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-group input:focus {
            border-color: #2b6b46;
            background: white;
            box-shadow: 0 0 0 4px rgba(43, 107, 70, 0.1);
            transform: translateY(-2px);
        }

        .form-group input::placeholder {
            color: #bdc3c7;
        }

        /* Tambahan: styling untuk pesan error Laravel */
        .form-group .invalid-feedback {
            color: #e3342f; /* Merah untuk error */
            font-size: 0.85rem;
            margin-top: 5px;
            display: block; /* Agar di baris baru */
        }
        .form-group input.is-invalid {
            border-color: #e3342f; /* Border merah jika ada error */
        }


        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%; /* Sesuaikan ini jika label tinggi */
            transform: translateY(-50%); /* Sesuaikan ini jika label tinggi */
            /* Anda mungkin perlu menyesuaikan 'top' dan 'transform' agar ikon pas dengan input field, bukan label */
            background: none;
            border: none;
            color: #7f8c8d;
            cursor: pointer;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }
        /* Tambahan CSS untuk posisi password-toggle yang lebih akurat */
        .form-group.has-password-toggle .password-toggle {
            top: calc(50% + 10px); /* Sesuaikan 10px ini dengan setengah tinggi input field + setengah tinggi label + margin label */
            /* Ini akan membuat ikon lebih ke tengah input field */
        }


        .password-toggle:hover {
            color: #2b6b46;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 0.9rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #5a6c7d;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #2b6b46;
        }

        .forgot-password {
            color: #2b6b46;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: #1f5d42;
            text-decoration: underline;
        }

        .login-btn {
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

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(43, 107, 70, 0.4);
        }

        .login-btn:active {
            transform: translateY(0);
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

        .social-login {
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
        }

        .social-btn:hover {
            border-color: #2b6b46;
            color: #2b6b46;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .signup-link {
            text-align: center;
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .signup-link a {
            color: #2b6b46;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
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

        @media (max-width: 480px) {
            .login-container {
                margin: 20px;
                padding: 35px 25px;
            }
            
            .logo h1 {
                font-size: 2.2rem;
            }
            
            .social-login {
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

    <div class="login-container">
        <div class="logo">
            <h1>Greensy</h1>
            <p>Masuk ke akun Anda</p>
        </div>

        {{-- FORMULIR INI YANG PENTING UNTUK LARAVEL --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf {{-- INI WAJIB UNTUK KEAMANAN LARAVEL --}}

            <div class="form-group">
                <label for="email">Email atau Username</label>
                {{-- Gunakan name="email" untuk input email --}}
                {{-- Tambahkan class 'is-invalid' jika ada error validasi --}}
                {{-- value="{{ old('email') }}" untuk mengisi kembali input jika validasi gagal --}}
                <input type="text" id="email" name="email" placeholder="Masukkan email atau username"
                       value="{{ old('email') }}" required autofocus
                       class="@error('email') is-invalid @enderror">
                
                {{-- Tampilkan pesan error validasi untuk email --}}
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group has-password-toggle"> {{-- Tambahkan class ini untuk styling password-toggle --}}
                <label for="password">Password</label>
                {{-- Gunakan name="password" untuk input password --}}
                <input type="password" id="password" name="password" placeholder="Masukkan password" required
                       class="@error('password') is-invalid @enderror">
                <button type="button" class="password-toggle" onclick="togglePassword()">👁</button>

                {{-- Tampilkan pesan error validasi untuk password --}}
                @error('password')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="remember-forgot">
                <label class="remember-me">
                    {{-- name="remember" untuk fungsi "ingat saya" Laravel --}}
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Ingat saya</span>
                </label>
                {{-- Pastikan rute 'password.request' ada jika Anda mengizinkan lupa password --}}
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">Lupa password?</a>
                @else
                    <a href="#" class="forgot-password">Lupa password?</a> {{-- Fallback jika rute tidak ada --}}
                @endif
            </div>

            <button type="submit" class="login-btn">Masuk</button>
        </form>

        <div class="divider">
            <span>atau</span>
        </div>

        <!-- <div class="social-login">
            <a href="#" class="social-btn">📱 Google</a>
            <a href="#" class="social-btn">📘 Facebook</a>
        </div> -->

        <div class="signup-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁';
            }
        }
        
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.form-group').style.transform = 'scale(1.02)'; // Gunakan closest untuk parent .form-group
            });
            
            input.addEventListener('blur', function() {
                this.closest('.form-group').style.transform = 'scale(1)'; // Gunakan closest
            });
        });

        document.querySelector('.login-btn').addEventListener('click', function() {
            const submitBtn = this;
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Masuk...';
            submitBtn.disabled = true;

        });
    </script>
</body>
</html>