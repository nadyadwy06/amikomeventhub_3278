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

        <a href="{{ route('admin.dashboard') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
        {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800 text-white shadow' : 'hover:bg-indigo-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            Dashboard
        </a>

        <a href="{{ route('admin.categories.index') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
        {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-800 text-white shadow' : 'hover:bg-indigo-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            Kategori
        </a>

        <a href="{{ route('admin.events.index') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
        {{ request()->routeIs('admin.events.*') ? 'bg-indigo-800 text-white shadow' : 'hover:bg-indigo-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Kelola Event
        </a>
        
        <a href="{{ route('admin.partners.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
            {{ request()->routeIs('admin.partners.*') ? 'bg-indigo-800 text-white shadow' : 'hover:bg-indigo-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            Kelola Partner
        </a>

        <a href="{{ route('admin.transactions.index') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200
        {{ request()->routeIs('admin.transactions.*') ? 'bg-indigo-800 text-white shadow' : 'hover:bg-indigo-800 hover:text-white' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            Laporan Transaksi
        </a>
    </nav>

    <div class="pt-6 border-t border-indigo-800"> 
    <form action="{{ route('admin.logout') }}" method="POST"> 
        @csrf 
        <button type="submit" 
            class="w-full flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white transition font-medium text-left"> 
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"> 
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"> 
                </path> 
            </svg> 
            Keluar 
        </button> 
    </form> 
    </div>

    </aside>

    <!-- MAIN CONTENT -->
   <main class="flex-1 p-6 md:p-10 overflow-y-auto">

        <header class="flex items-center justify-between gap-4 mb-8">
            
            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    @yield('title') 
                </h1>
                
                <p class="text-sm text-slate-500 mt-1">
                    Selamat datang kembali 👋
                </p>
            </div>
    
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
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::check() ? Auth::user()->name : 'Admin') }}&background=6366f1&color=fff"
                         alt="Avatar" class="w-full h-full object-cover">
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