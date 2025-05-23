<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='1.5'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            position: relative;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 20px 20px 0 0;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 20px;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .logo svg {
            width: 40px;
            height: 40px;
            color: white;
        }

        .brand-name {
            font-size: 28px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .brand-subtitle {
            color: #718096;
            font-size: 14px;
            font-weight: 400;
        }

        .status-message {
            background: linear-gradient(135deg, #48bb78, #38a169);
            color: white;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
            display: none;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            color: #2d3748;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            background: #f7fafc;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-input:focus + .form-label {
            color: #667eea;
        }

        .input-error {
            color: #e53e3e;
            font-size: 12px;
            margin-top: 8px;
            display: none;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid #cbd5e0;
            border-radius: 4px;
            margin-right: 12px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkbox:checked {
            background: #667eea;
            border-color: #667eea;
        }

        .checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
            font-weight: bold;
        }

        .checkbox-label {
            font-size: 14px;
            color: #4a5568;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }

        .forgot-link {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #5a67d8;
            text-decoration: underline;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 16px 32px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 32px 0;
            position: relative;
            color: #a0aec0;
            font-size: 14px;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e2e8f0;
            z-index: -1;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 20px;
        }

        .signup-link {
            text-align: center;
        }

        .signup-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #5a67d8;
            text-decoration: underline;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: rgba(255, 255, 255, 0.7);
            font-size: 12px;
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
                margin: 10px;
            }

            .logo {
                width: 60px;
                height: 60px;
            }

            .logo svg {
                width: 30px;
                height: 30px;
            }

            .brand-name {
                font-size: 24px;
            }

            .form-actions {
                flex-direction: column;
                gap: 16px;
            }

            .btn-primary {
                width: 100%;
            }
        }

        /* Dark mode styles */
        @media (prefers-color-scheme: dark) {
            body {
                background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            }

            .login-container {
                background: rgba(45, 55, 72, 0.95);
                color: white;
            }

            .brand-name {
                color: white;
            }

            .brand-subtitle {
                color: #a0aec0;
            }

            .form-label {
                color: #e2e8f0;
            }

            .form-input {
                background: #4a5568;
                border-color: #718096;
                color: white;
            }

            .form-input::placeholder {
                color: #a0aec0;
            }

            .checkbox-label {
                color: #e2e8f0;
            }

            .divider::before {
                background: #4a5568;
            }

            .divider span {
                background: rgba(45, 55, 72, 0.95);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Logo Section -->
        <div class="logo-section">
            <div class="logo">
                <svg fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2L3 7v11a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V7l-7-5z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h1 class="brand-name">Laravel</h1>
            <p class="brand-subtitle">Welcome back! Please sign in to your account</p>
        </div>

        <!-- Status Message -->
        <div id="status-message" class="status-message">
            <!-- Status messages will appear here -->
        </div>

        <!-- Login Form -->
        <form id="login-form">
            <input type="hidden" name="_token" value="csrf-token-here">

            <!-- Email Field -->
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input
                    id="email"
                    class="form-input"
                    type="email"
                    name="email"
                    placeholder="Enter your email address"
                    required
                    autofocus
                    autocomplete="username">
                <div class="input-error" id="email-error"></div>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    class="form-input"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password">
                <div class="input-error" id="password-error"></div>
            </div>

            <!-- Remember Me -->
            <div class="checkbox-group">
                <input type="checkbox" id="remember_me" class="checkbox" name="remember">
                <label for="remember_me" class="checkbox-label">Remember me for 30 days</label>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <a href="#forgot-password" class="forgot-link">Forgot password?</a>
                <button type="submit" class="btn-primary">Sign In</button>
            </div>
        </form>

        <!-- Divider -->
        <div class="divider">
            <span>New to Laravel?</span>
        </div>

        <!-- Sign Up Link -->
        <div class="signup-link">
            <a href="#register">Create your account</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        © 2024 Laravel. All rights reserved.
    </div>

    <script>
        // Form validation and interaction
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Clear previous errors
            document.querySelectorAll('.input-error').forEach(el => {
                el.style.display = 'none';
            });

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            let hasErrors = false;

            // Email validation
            if (!email) {
                showError('email-error', 'Email address is required');
                hasErrors = true;
            } else if (!isValidEmail(email)) {
                showError('email-error', 'Please enter a valid email address');
                hasErrors = true;
            }

            // Password validation
            if (!password) {
                showError('password-error', 'Password is required');
                hasErrors = true;
            } else if (password.length < 6) {
                showError('password-error', 'Password must be at least 6 characters');
                hasErrors = true;
            }

            if (!hasErrors) {
                // Show success message
                showStatus('Login successful! Redirecting to dashboard...');

                // Simulate redirect after 2 seconds
                setTimeout(() => {
                    alert('This is a demo. In a real Laravel app, you would be redirected to the dashboard.');
                }, 2000);
            }
        });

        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }

        function showStatus(message) {
            const statusElement = document.getElementById('status-message');
            statusElement.textContent = message;
            statusElement.style.display = 'block';
        }

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        // Enhanced input interactions
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.form-label').style.color = '#667eea';
            });

            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.querySelector('.form-label').style.color = '';
                }
            });

            // Add typing animation effect
            input.addEventListener('input', function() {
                if (this.classList.contains('error')) {
                    this.classList.remove('error');
                    this.style.borderColor = '#e2e8f0';
                }
            });
        });

        // Error state styling
        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            const inputElement = errorElement.previousElementSibling;

            errorElement.textContent = message;
            errorElement.style.display = 'block';

            inputElement.style.borderColor = '#e53e3e';
            inputElement.classList.add('error');
        }

        // Add smooth loading effect on form submission
        document.getElementById('login-form').addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.btn-primary');
            const originalText = submitBtn.textContent;

            if (!e.defaultPrevented) {
                submitBtn.textContent = 'Signing In...';
                submitBtn.style.opacity = '0.7';

                setTimeout(() => {
                    submitBtn.textContent = originalText;
                    submitBtn.style.opacity = '1';
                }, 2000);
            }
        });
    </script>
</body>
</html>
