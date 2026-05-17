<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin') - AmikomEventHub</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-slate-50 text-slate-900 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="hidden md:flex w-64 bg-indigo-900 text-indigo-100 flex-col p-6 space-y-8 sticky top-0 h-screen shadow-2xl">

        <!-- LOGO -->
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl shadow">
                AH
            </div>

            <div>
                <h1 class="text-lg font-bold text-white tracking-tight">
                    AmikomEventHub
                </h1>

                <p class="text-xs text-indigo-300">
                    Admin Panel
                </p>
            </div>

        </div>

        <!-- MENU -->
        <nav class="flex-1 space-y-2">

            <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">
                Main Menu
            </p>

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
               {{ request()->routeIs('admin.dashboard')
                    ? 'bg-indigo-800 text-white shadow'
                    : 'hover:bg-indigo-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0 0H5a2 2 0 01-2-2v-6m16 6a2 2 0 01-2 2h-4"/>
                </svg>

                Dashboard
            </a>

            <!-- Events -->
            <a href="{{ route('admin.events.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
               {{ request()->routeIs('admin.events.*')
                    ? 'bg-indigo-800 text-white shadow'
                    : 'hover:bg-indigo-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v11a2 2 0 002 2z"/>
                </svg>

                Kelola Event
            </a>

            <!-- Transactions -->
            <a href="{{ route('admin.transactions.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
               {{ request()->routeIs('admin.transactions.*')
                    ? 'bg-indigo-800 text-white shadow'
                    : 'hover:bg-indigo-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 8c-1.657 0-3 .672-3 1.5S10.343 11 12 11s3-.672 3-1.5S13.657 8 12 8zm0 0V6m0 12v-2m8-4h-2M6 12H4"/>
                </svg>

                Laporan Transaksi
            </a>

            <!-- Categories -->
            <a href="{{ route('admin.categories.index') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
               {{ request()->routeIs('admin.categories.*')
                    ? 'bg-indigo-800 text-white shadow'
                    : 'hover:bg-indigo-800 hover:text-white' }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M7 7h.01M7 3h5l7 7-5 5-7-7V3z"/>
                </svg>

                Kategori
            </a>

        </nav>

        <!-- FOOTER -->
        <div class="pt-6 border-t border-indigo-800">

            <a href="/"
               class="w-full flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white hover:bg-indigo-800 rounded-xl transition-all duration-200 font-medium">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V7m0 0a4 4 0 10-4 4"/>
                </svg>

                Keluar
            </a>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-6 md:p-10 overflow-y-auto">

        <!-- HEADER -->
        <header class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    @yield('title', 'Dashboard')
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Selamat datang kembali 👋
                </p>
            </div>

            <!-- USER -->
            <div class="flex items-center gap-4">

                <div class="text-right hidden sm:block">

                    <p class="font-semibold text-slate-800">
                        {{ Auth::check() ? Auth::user()->name : 'Admin' }}
                    </p>

                    <p class="text-xs text-slate-400">
                        Penyelenggara
                    </p>

                </div>

                <div class="w-11 h-11 bg-white rounded-xl shadow border overflow-hidden">

                    <img
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::check() ? Auth::user()->name : 'Admin') }}&background=6366f1&color=fff"
                        alt="Avatar"
                        class="w-full h-full object-cover">

                </div>

            </div>

        </header>

        <!-- CONTENT -->
        <section class="bg-white rounded-2xl shadow-sm p-6 min-h-[300px]">

            @yield('content')

        </section>

    </main>

    @stack('scripts')

</body>
</html>