<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

        <style>
            :root{ --brown:#8b5e3c; --black:#0b0b0b; --latte:#e7d5c7; --latte-50:#f7efe9; }
            .admin-bg{ background: radial-gradient(900px 200px at -10% -20%, rgba(255,255,255,.55), rgba(255,255,255,0)), linear-gradient(135deg, var(--brown), var(--black) 55%, #ffffff); min-height:100vh; }
            .admin-shell{ background:#ffffff; border:1px solid var(--latte); box-shadow: 0 10px 26px rgba(0,0,0,.10), 0 8px 18px rgba(0,0,0,.06); border-radius: 14px; }
            .brand-script-admin{ font-family:'Great Vibes', cursive; color: var(--brown); font-size: 1.35rem; line-height: 1; }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen admin-bg">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/80 backdrop-blur border-b" style="border-color: var(--latte);">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 admin-shell">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="admin-shell p-6">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
