<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LandCaffe - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://images.unsplash.com/photo-1447933601403-0c6688de566e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80') no-repeat center center;
            background-size: cover;
            position: relative;
            color: #fff;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }
        
        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            position: relative;
            z-index: 2;
            margin: 1rem;
        }
        
        .brand {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .brand-name {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            margin: 0;
            line-height: 1;
            letter-spacing: 1px;
        }
        
        .brand-tagline {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            font-weight: 300;
            margin-top: 0.5rem;
            letter-spacing: 1px;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            padding-left: 45px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            font-size: 0.95rem;
            color: #333;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 1);
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }
        
        .btn-login {
            width: 100%;
            padding: 12px;
            background: #FF9F43;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-login:hover {
            background: #FF8C21;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 159, 67, 0.4);
        }
        
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
        }
        
        .register-link,
        .forgot-password {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .register-link:hover,
        .forgot-password:hover {
            color: #FF9F43;
            text-decoration: none;
        }
        
        /* Responsive adjustments */
        @media (max-width: 480px) {
            .login-container {
                margin: 1rem;
                padding: 1.5rem;
            }
            
            .brand-name {
                font-size: 2rem;
            }
            
            .form-footer {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }
        }
        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --primary-light: #D1FAE5;
            --accent: #34D399;
            --text: #1F2937;
            --text-secondary: #6B7280;
            --border: #E5E7EB;
            --error: #EF4444;
            --success: #10B981;
        }
        
        body {
            @apply bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen p-4;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-container {
            @apply bg-white rounded-2xl shadow-xl overflow-hidden w-full max-w-md;
            transition: all 0.3s ease;
            margin: 1rem;
        }
        
        .login-header {
            @apply bg-gradient-to-r from-primary to-primary-dark text-white p-6 md:p-8 text-center relative overflow-hidden;
        }
        
        .login-header::before {
            content: '';
            @apply absolute inset-0 bg-[url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29-22c3.314 0 6-2.686 6-6s-2.686-6-6-6-6 2.686-6 6 2.686 6 6 6zM32 63c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-7c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E")];
            @apply opacity-50;
        }
        
        .login-logo {
            @apply text-4xl font-bold mb-2 flex items-center justify-center gap-3 relative z-10;
        }
        
        .login-subtitle {
            @apply text-sm opacity-90 tracking-wider font-light relative z-10;
        }
        
        .login-body {
            @apply p-6 md:p-8;
        }
        
        .form-group {
            @apply mb-4 md:mb-6;
        }
        
        .form-label {
            @apply block text-sm font-medium text-gray-700 mb-2;
        }
        
        .form-control {
            @apply w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary/50 focus:border-primary transition-all duration-200 text-gray-700 text-sm md:text-base;
            height: 46px;
        }
        
        .input-group {
            @apply relative;
        }
        
        .input-icon {
            @apply absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400;
        }
        
        .input-with-icon {
            @apply pl-10;
        }
        
        .btn {
            @apply w-full py-3 px-4 rounded-lg font-medium transition-all duration-200 flex items-center justify-center gap-2 text-sm md:text-base;
        }
        
        .btn-primary {
            @apply bg-primary hover:bg-primary-dark text-white shadow-md hover:shadow-lg transform hover:-translate-y-0.5;
        }
        
        .btn-outline {
            @apply border border-gray-300 text-gray-700 hover:bg-gray-50;
        }
        
        .divider {
            @apply flex items-center my-6;
        }
        
        .divider::before, .divider::after {
            content: '';
            @apply flex-1 h-px bg-gray-200;
        }
        
        .divider-text {
            @apply px-4 text-sm text-gray-500;
        }
        
        .social-buttons {
            @apply grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6;
        }
        
        .forgot-password {
            @apply text-sm text-primary hover:text-primary-dark text-right block mt-1;
        }
        
        .error-message {
            @apply text-sm text-red-500 mt-1;
        }
        
        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            body {
                @apply bg-gradient-to-br from-gray-900 to-gray-800;
            }
            
            .login-container {
                @apply bg-gray-800 text-white;
            }
            
            .form-control {
                @apply bg-gray-700 border-gray-600 text-white placeholder-gray-400;
            }
            
            .form-label {
                @apply text-gray-300;
            }
            
            .divider-text {
                @apply text-gray-400;
            }
            
            .btn-outline {
                @apply border-gray-600 text-gray-300 hover:bg-gray-700;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        
        .delay-100 {
            animation-delay: 0.1s;
        }
        
        .delay-200 {
            animation-delay: 0.2s;
        }
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }
        
        .btn-login:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }
        
        .form-footer {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 1.5rem;
            font-size: 0.9rem;
        }
        
        @media (min-width: 640px) {
            .form-footer {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .remember-me input[type="checkbox"] {
            width: 1.1rem;
            height: 1.1rem;
            accent-color: var(--primary);
        }
        
        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .forgot-password:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        
        .text-danger {
            color: #e53935;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        
        .status {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            background-color: #e8f5e9;
            color: var(--primary-dark);
            font-size: 0.9rem;
            text-align: center;
        }
        
        @media (max-width: 480px) {
            .login-container {
                border-radius: 12px;
            }
            
            .login-header {
                padding: 2rem 1.5rem;
            }
            
            .login-body {
                padding: 1.5rem;
            }
            
            .form-footer {
                flex-direction: column;
                gap: 1rem;
    </style>
</head>
<body>
    <div class="login-container">
        <div class="brand">
            <h1 class="brand-name">LandCaffe</h1>
            <p class="brand-tagline">COFFEE AND HAPPINESS</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="form-group">
                <i class="fas fa-user input-icon"></i>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Username.." required autofocus>
            </div>

            <!-- Password -->
            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                <i class="fas fa-eye input-icon" style="left: auto; right: 15px; cursor: pointer;" onclick="togglePassword()"></i>
            </div>

            <button type="submit" class="btn-login">
                MASUK
            </button>

            <div class="form-footer">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="register-link">Belum Punya Akun?</a>
                @endif
                
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">Lupa Password?</a>
                @endif
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.querySelector('.fa-eye');
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
    </div>
    
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
</body>
</html>
