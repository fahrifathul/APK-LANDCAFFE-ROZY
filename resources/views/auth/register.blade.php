<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LandCaffe - Register</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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
            max-width: 420px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            position: relative;
            z-index: 2;
            margin: 1rem auto;
            box-sizing: border-box;
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
            max-width: 100%;
            padding: 12px 15px 12px 45px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            font-size: 0.95rem;
            color: #333;
            transition: all 0.3s ease;
            box-sizing: border-box;
            display: block;
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
        
        .login-link,
        .forgot-password {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .login-link:hover,
        .forgot-password:hover {
            color: #FF9F43;
            text-decoration: none;
        }
        
        .error-message {
            color: #ff6b6b;
            font-size: 0.8rem;
            margin-top: 0.25rem;
            padding-left: 15px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-container {
                margin: 1.5rem;
                padding: 2rem 1.5rem;
                max-width: 100%;
                border-radius: 10px;
            }
            
            .brand {
                margin-bottom: 2rem;
            }
            
            .brand-name {
                font-size: 2rem;
            }
            
            .brand-tagline {
                font-size: 0.85rem;
            }
            
            .form-group {
                margin-bottom: 1.25rem;
            }
            
            .form-control {
                padding: 10px 15px 10px 40px;
                font-size: 0.9rem;
            }
            
            .input-icon {
                left: 12px;
                font-size: 0.9em;
            }
            
            .btn-login {
                padding: 10px;
                font-size: 0.95rem;
            }
            
            .form-footer {
                flex-direction: column;
                gap: 0.75rem;
                text-align: center;
                margin-top: 1.25rem;
            }
            
            .login-link {
                font-size: 0.8rem;
            }
        }
        
        @media (max-width: 480px) {
            .login-container {
                margin: 0.75rem auto;
                padding: 1.75rem 1.5rem;
                border-radius: 10px;
                max-width: 95%;
            }
            
            .brand {
                margin-bottom: 1.5rem;
            }
            
            .brand-name {
                font-size: 1.75rem;
            }
            
            .brand-tagline {
                font-size: 0.8rem;
                margin-top: 0.25rem;
            }
            
            .form-group {
                margin-bottom: 1rem;
            }
            
            .form-control {
                padding: 10px 12px 10px 38px;
                font-size: 0.85rem;
            }
            
            .input-icon {
                left: 10px;
                font-size: 0.85em;
            }
            
            .btn-login {
                padding: 9px;
                font-size: 0.9rem;
            }
            
            .form-footer {
                gap: 0.5rem;
                margin-top: 1rem;
            }
            
            .error-message {
                font-size: 0.75rem;
                padding-left: 10px;
            }
        }
        
        @media (max-width: 360px) {
            .login-container {
                padding: 1.25rem 1rem;
            }
            
            .brand-name {
                font-size: 1.5rem;
            }
            
            .form-control {
                padding: 8px 10px 8px 35px;
            }
            
            .input-icon {
                left: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="brand">
            <h1 class="brand-name">LandCaffe</h1>
            <p class="brand-tagline">CREATE YOUR ACCOUNT</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <i class="fas fa-user input-icon"></i>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" placeholder="Full Name" required autofocus>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <i class="fas fa-envelope input-icon"></i>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Email Address" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <i class="fas fa-lock input-icon"></i>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                REGISTER
            </button>

            <div class="form-footer">
                <a href="{{ route('login') }}" class="login-link">Already have an account? Login</a>
            </div>
        </form>
    </div>
</body>
</html>
