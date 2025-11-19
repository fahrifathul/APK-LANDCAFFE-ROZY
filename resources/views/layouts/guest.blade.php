<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Use same base font as public pages (Bootstrap-like system stack) -->
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
        <style>
            :root{
                --base-font: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, "Noto Sans", "Liberation Sans", "Apple Color Emoji", "Segoe UI Emoji";
                --brown:#8b5e3c; --black:#0b0b0b; --latte:#f4ece6; --latte-2:#faf5f1;
            }
            html, body, input, button, select, textarea { font-family: var(--base-font); }
            /* Soft neutral background for the whole page */
            .page-bg{ background: linear-gradient(135deg, #ffffff 0%, #8b5e3c 45%, #0b0b0b 100%); }

            /* Two-panel login shell like the mockup */
            .login-shell{ width: 100%; max-width: 820px; min-height: 440px; border-radius:18px; overflow:hidden; background:#ffffff; box-shadow: 0 20px 40px rgba(16,24,40,.15); display:flex; }
            .login-left{ position: relative; flex: 1 1 48%; background: linear-gradient(135deg, #8b5e3c, #0b0b0b); color:#fff; display:flex; align-items:center; }
            .login-left-inner{ padding: 40px; max-width: 380px; margin-left: 40px; }
            .login-left h2{ font-size: 26px; font-weight: 800; letter-spacing:.4px; margin-bottom: 8px; }
            .login-left p{ opacity:.95; line-height:1.6; }
            .login-left::after{ content:""; position:absolute; right:-40px; top:0; bottom:0; width:120px; background:#ffffff; filter: drop-shadow(-6px 0 12px rgba(0,0,0,.06)); clip-path: path('M0,0 C80,120 80,400 0,520 L120,520 L120,0 Z'); }

            .login-right{ flex: 1 1 52%; display:flex; align-items:center; justify-content:center; padding: 32px 40px; }
            .login-content{ width:100%; max-width: 300px; }
            .form-heading{ text-align:center; margin-bottom: 18px; }
            .form-heading h1{ color:#0b0b0b; font-size:28px; font-weight:800; margin:0; }
            .form-heading small{ color:#6b7280; font-weight:600; letter-spacing:.3px; }

            /* Inputs with icons in pills */
            .input-group{ position: relative; margin-bottom: 12px; }
            .input-group .icon{ position:absolute; left:18px; top:50%; transform: translateY(-50%); color: var(--brown); pointer-events: none; width:28px; text-align:center; }
            .input-group .icon img{ display:block; width:20px; height:20px; object-fit:contain; margin:0 auto; filter: invert(31%) sepia(14%) saturate(1012%) hue-rotate(349deg) brightness(95%) contrast(88%); }
            .input-rounded{ border-radius: 9999px !important; height: 46px !important; padding-left: 20px; width:100%; border:2px solid transparent; -webkit-appearance: none; appearance: none;
                background:
                  linear-gradient(#ffffff, #fbfbfb) padding-box,
                  linear-gradient(90deg, #8b5e3c, #0b0b0b) border-box;
                box-shadow: 0 4px 10px rgba(0,0,0,.05);
            }
            .input-rounded::placeholder{ color:#94a3b8; }
            .input-rounded:focus{ outline:none; box-shadow: 0 0 0 3px rgba(139,94,60,.18), 0 4px 10px rgba(0,0,0,.06); }

            /* Primary button in brown->black gradient */
            .primary-btn{ background: linear-gradient(90deg, #8b5e3c, #0b0b0b); border:0; color:#fff; padding-inline: 18px; border-radius: 999px; height:44px; }
            .primary-btn:hover{ filter: brightness(1.05); }
            .brand-script{ font-family:'Great Vibes', cursive; font-size: 1.8rem; color:#ffffff; text-shadow: 0 2px 10px rgba(0,0,0,.35); }
            .brand-script-dark{ font-family:'Great Vibes', cursive; font-size: 1.8rem; color:#8b5e3c; text-shadow: 0 1px 0 rgba(255,255,255,.6); }
            .copyright{ text-align:center; color:#6b7280; font-size: 12px; margin-top: 18px; }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-gray-900 antialiased page-bg">
        <div class="min-h-screen w-full flex items-center justify-center p-4">
            <div class="login-shell">
                <div class="login-left">
                    <div class="login-left-inner">
                        <div class="brand-script" style="margin-bottom: 28px;">LandCaffe</div>
                        <h2>WELCOME BACK !</h2>
                        <p>Enter your ID and Password to continue</p>
                    </div>
                </div>
                <div class="login-right">
                    <div class="login-content">
                        {{ $slot }}
                        <div class="copyright">Copyright © {{ date('Y') }} CaffeCoffe. All rights reserved.</div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
