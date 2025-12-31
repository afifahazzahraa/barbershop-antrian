<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gentleman's Dashboard</title>

        <script src="https://cdn.tailwindcss.com"></script>
        
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <script>
            // Daftarkan warna kustom agar class "bg-card" dan "text-gold" berfungsi
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            gold: '#fbbf24',
                            dark: '#050505',
                            card: '#111111',
                        },
                        fontFamily: {
                            sans: ['Plus Jakarta Sans', 'sans-serif'],
                        }
                    }
                }
            }
        </script>

        <style>
            /* Paksa background Body tetap hitam */
            body { background-color: #000000 !important; color: white; }
            .min-h-screen { background-color: #000000 !important; }
        </style>
    </head>
    <body class="antialiased font-sans">
        <div class="min-h-screen">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-card border-b border-white/5 shadow-xl">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 uppercase tracking-tighter">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>