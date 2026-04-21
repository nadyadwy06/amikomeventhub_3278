<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

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
</head>

<body class="bg-slate-50 text-slate-900 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="glass sticky top-8 z-40 mx-4 mt-4 px-6 py-4 rounded-2xl border border-white/20 shadow-lg flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                AH
            </div>
            <span class="text-xl font-bold tracking-tight">AmikomEventHub</span>
        </div>
        <div class="hidden md:flex gap-8 font-medium">
            <a href="/" class="text-indigo-600">Jelajahi</a>
            <a href="#" class="hover:text-indigo-600 transition">Kategori</a>
            <a href="#" class="hover:text-indigo-600 transition">Tentang Kami</a>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
        <footer class="bg-indigo-900 text-indigo-100 py-16 px-6 mt-20">
            <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-10">

                <!-- BRAND -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                            AH
                        </div>
                        <span class="text-xl font-bold text-white">AmikomEventHub</span>
                    </div>
                    <p class="text-sm text-indigo-200">
                        Platform pemesanan tiket event terbaik untuk konser, seminar, dan workshop.
                    </p>
                </div>

                <!-- NAVIGASI -->
                <div>
                    <h3 class="font-semibold text-white mb-4">Navigasi</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="/" class="hover:text-white transition">Home</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-white transition">Cara Bayar</a>
                        </li>
                        <li>
                            <a href="#events" class="hover:text-white transition">Event</a>
                        </li>
                    </ul>
                </div>

                <!-- KONTAK -->
                <div>
                    <h3 class="font-semibold text-white mb-4">Hubungi Kami</h3>
                    <ul class="space-y-3 text-sm">

                        <!-- EMAIL -->
                        <li class="flex items-center gap-3">
                            <!-- ICON EMAIL -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l9 6 9-6M5 6h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2z" />
                            </svg>
                            <span>admin@amikomeventhub.com</span>
                        </li>

                        <!-- TELEPON / WHATSAPP -->
                        <li class="flex items-center gap-3">
                            <!-- ICON PHONE -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h2.28a2 2 0 011.94 1.515l.516 2.064a2 2 0 01-.45 1.82l-1.27 1.27a16 16 0 006.586 6.586l1.27-1.27a2 2 0 011.82-.45l2.064.516A2 2 0 0119 16.72V19a2 2 0 01-2 2h-1C8.82 21 3 15.18 3 8V5z" />
                            </svg>
                            <span>+62 812-3456-7890</span>
                        </li>

                    </ul>
                </div>

            </div>

            <!-- COPYRIGHT -->
            <div class="text-center text-sm text-indigo-300 mt-12 border-t border-indigo-800 pt-6">
                &copy; 2024 AmikomEventHub. Built with Laravel & Tailwind CSS.
            </div>
        </footer>

</body>

</html>