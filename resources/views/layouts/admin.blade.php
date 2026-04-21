<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin') - AmikomEventHub</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 min-h-screen">

        <!-- LOGO -->
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                AH
            </div>
            <span class="text-lg font-bold text-white">AmikomEventHub</span>
        </div>

        <!-- MENU -->
        <nav class="flex-1 space-y-2">
            <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">
                Main Menu
            </p>

            <!-- Dashboard -->
            <a href="/admin"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition
               {{ request()->is('admin') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">
                
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0 0H5a2 2 0 01-2-2v-6m16 6a2 2 0 01-2 2h-4"/>
                </svg>

                Dashboard
            </a>

            <!-- Event -->
            <a href="/admin/events"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition
               {{ request()->is('admin/events*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v11a2 2 0 002 2z"/>
                </svg>

                Kelola Event
            </a>

            <!-- Transaksi -->
            <a href="/admin/transactions"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition
               {{ request()->is('admin/transactions*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8c-1.657 0-3 .672-3 1.5S10.343 11 12 11s3-.672 3-1.5S13.657 8 12 8zm0 0V6m0 12v-2m8-4h-2M6 12H4"/>
                </svg>

                Laporan Transaksi
            </a>

            <!-- Categories -->
            <a href="/admin/categories"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition
               {{ request()->is('admin/categories*') ? 'bg-indigo-800 text-white' : 'hover:bg-indigo-800' }}">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M7 7h.01M7 3h5l7 7-5 5-7-7V3z"/>
                </svg>

                Kategori
            </a>

        </nav>

        <!-- FOOTER -->
        <div class="pt-6 border-t border-indigo-800">
            <a href="/"
               class="flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white hover:bg-indigo-800 rounded-xl transition font-medium">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V7m0 0a4 4 0 10-4 4"/>
                </svg>

                Keluar
            </a>
        </div>

    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8 overflow-y-auto">

        <!-- HEADER -->
        <header class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    @yield('title', 'Dashboard')
                </h1>
                <p class="text-sm text-slate-500">
                    Selamat datang kembali, Admin!
                </p>
            </div>

            <!-- USER -->
            <div class="flex items-center gap-4">
                <div class="text-right hidden md:block">
                    <p class="font-semibold">Admin</p>
                    <p class="text-xs text-slate-400">Penyelenggara</p>
                </div>

                <div class="w-10 h-10 bg-white rounded-xl shadow border flex items-center justify-center overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff"
                         alt="avatar"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <div>
            @yield('content')
        </div>

    </main>

</body>
</html>