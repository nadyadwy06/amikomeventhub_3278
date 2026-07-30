<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Meta Konfigurasi PWA (Progressive Web App) -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#4f46e5">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
    </style>

    <!-- Script Pendaftaran Service Worker PWA -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    console.log('PWA ServiceWorker registered successfully:', registration.scope);
                }, function(err) {
                    console.log('PWA ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
</head>

<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen">

    <nav class="glass sticky top-8 z-40 mx-4 mt-4 px-6 py-4 rounded-2xl border border-white/20 shadow-lg flex justify-between items-center flex-wrap md:flex-nowrap">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                AH
            </div>
            <span class="text-xl font-bold tracking-tight">AmikomEventHub</span>
        </div>

        <button id="menu-toggle" class="block md:hidden p-2 text-slate-600 hover:text-indigo-600 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <div id="nav-links" class="hidden md:flex flex-col md:flex-row w-full md:w-auto items-start md:items-center gap-4 md:gap-8 font-medium mt-4 md:mt-0 border-t border-slate-200/50 md:border-none pt-4 md:pt-0">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }} transition w-full md:w-auto">Jelajahi</a>
            <a href="{{ route('kategori') }}" class="{{ request()->routeIs('kategori') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }} transition w-full md:w-auto">Kategori</a>
            <a href="{{ route('bantuan') }}" class="{{ request()->routeIs('bantuan') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }} transition w-full md:w-auto">Bantuan</a>
            <a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }} transition w-full md:w-auto">Kontak</a>
            <a href="{{ route('tentang') }}" class="{{ request()->routeIs('tentang') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }} transition w-full md:w-auto">Tentang Kami</a>
            
            <a href="{{ route('profil') }}" class="flex items-center gap-1.5 {{ request()->routeIs('profil') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }} transition border-t border-slate-200/50 md:border-none pt-3 md:pt-0 w-full md:w-auto">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7 0 3.75 3.75 0 017 0zM4.5 20.118a7.5 7.5 0 0115 0v.382H4.5v-.382z"></path>
                </svg>
                Profil
            </a>
        </div>
    </nav>

    
    <main class="flex-grow">
        @yield('content')
    </main>


    <div class="bg-slate-100/90 border-t border-slate-200 py-14 px-6 mt-24">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-xl md:text-2xl font-bold tracking-widest text-slate-400 uppercase">
                Partner & Sponsor
            </h2>
            <p class="text-xs text-slate-400/80 mt-1">
                Supported by excellent institutions and corporations
            </p>
            
            <div class="mt-10 flex flex-wrap justify-center items-start gap-12 md:gap-24">
                @forelse($partners as $partner)
                    <div class="flex flex-col items-center gap-3">
                        <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-16 w-auto object-contain">
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ $partner->name }}</span>
                    </div>
                @empty
                    <p class="text-sm text-slate-400">Belum ada partner atau sponsor terdaftar.</p>
                @endforelse
            </div>
        </div>
    </div>


    <footer class="bg-indigo-900 text-indigo-100 py-16 px-6 border-t border-indigo-950">
        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                        AH
                    </div>
                    <span class="text-xl font-bold text-white">AmikomEventHub</span>
                </div>
                <p class="text-sm text-indigo-200 leading-relaxed">
                    Platform pemesanan tiket event terbaik untuk konser, seminar, dan workshop.
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-white mb-4 tracking-wide">Navigasi</h3>
                <ul class="space-y-2 text-sm text-indigo-200/90">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="#" class="hover:text-white transition">Cara Bayar</a></li>
                    <li><a href="{{ route('kategori') }}" class="hover:text-white transition">Event</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-white mb-4 tracking-wide">Hubungi Kami</h3>
                <ul class="space-y-3 text-sm text-indigo-200/90">
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>admin@amikomeventhub.com</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>+62 812-3456-7890</span>
                    </li>
                </ul>
            </div>
        </div>
    </footer>


    <div class="bg-indigo-950 text-indigo-300/60 py-5 px-6 text-center text-xs border-t border-indigo-900/50 mt-auto">
        <div class="max-w-7xl mx-auto flex justify-center items-center">
            <div>
                &copy; 2026 <span class="font-semibold text-indigo-200">AmikomEventHub</span>. All Rights Reserved.
            </div>
        </div>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            var navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('hidden');
            navLinks.classList.toggle('flex');
        });
    </script>
</body>

</html>