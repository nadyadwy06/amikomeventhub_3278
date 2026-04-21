@extends('layouts.app')

@section('title', 'Detail Event')

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-12">

    <!-- Left: Poster -->
    <div class="lg:col-span-1">
        <div class="sticky top-32">
            <img src="{{ asset('assets/concert.png') }}" alt="Concert Poster"
                class="w-full rounded-[2.5rem] shadow-2xl border-8 border-white">

            <div class="mt-8 p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <h4 class="font-bold mb-4">Penyelenggara</h4>
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold">
                        AB
                    </div>
                    <div>
                        <p class="font-bold text-slate-800">ABP Productions</p>
                        <p class="text-xs text-slate-500">Verified Organizer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Details -->
    <div class="lg:col-span-2 space-y-12">

        <!-- Title -->
        <div class="space-y-4">
            <span
                class="px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
                Music Festival
            </span>

            <h1 class="text-4xl md:text-5xl font-black leading-tight">
                Jazz Night 2024: A Celebration of Rhythm & Melody
            </h1>

            <div class="flex flex-wrap gap-6 text-slate-500 font-medium">
                <div class="flex items-center gap-2">
                    <span>Saturday, 16 Nov 2024</span>
                </div>
                <div class="flex items-center gap-2">
                    <span>The Blue Note Lounge, Metropolis</span>
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="prose prose-slate max-w-none">
            <h3 class="text-2xl font-bold mb-4">Deskripsi Event</h3>

            <p class="text-lg text-slate-600 leading-relaxed">
                Nikmati malam yang tak terlupakan dengan alunan jazz dari musisi internasional.
            </p>

            <p class="text-lg text-slate-600 mt-4">
                Tahun ini kami menghadirkan <strong>The Jazz Collective</strong>, 
                <strong>Luna Vance</strong>, dan artis lainnya.
            </p>
        </div>

        <!-- Harga -->
        <div class="bg-indigo-600 rounded-[2.5rem] p-8 text-white shadow-2xl">

            <div class="flex flex-col md:flex-row justify-between items-center gap-8">

                <!-- INFO HARGA -->
                <div>
                    <p class="text-indigo-200 font-semibold text-sm mb-2 uppercase tracking-wide">
                        Harga Tiket
                    </p>

                    <h2 class="text-5xl font-black flex items-center gap-3">
                        <!-- ICON PRICE TAG -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                d="M7 7h.01M7 3h5l7 7-5 5-7-7V3z"/>
                        </svg>
                        Rp 150.000
                    </h2>

                    <!-- STOK -->
                    <div class="mt-4 flex items-center gap-2 text-indigo-100">
                        <!-- DOT STATUS -->
                        <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></span>

                        <p>
                            Tersedia <span class="font-bold">42 tiket</span> saat ini
                        </p>
                    </div>
                </div>

                <!-- BUTTON -->
                <div>
                    <a href="/checkout"
                        class="px-10 py-5 bg-white text-indigo-600 rounded-2xl font-bold text-lg shadow-lg hover:shadow-xl hover:scale-105 transition">
                        Pesan Sekarang
                    </a>
                </div>

            </div>

        </div>

        <!-- Kebijakan -->
        <div class="space-y-4">
            <h3 class="text-xl font-bold text-slate-800">Kebijakan Tiket</h3>

            <ul class="space-y-3 text-slate-600">

                <!-- VALID -->
                <li class="flex items-center gap-3">
                    <!-- CHECK ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M5 13l4 4L19 7"/>
                    </svg>
                    E-ticket akan dikirim otomatis setelah pembayaran berhasil
                </li>

                <li class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M5 13l4 4L19 7"/>
                    </svg>
                    Tiket dapat digunakan dengan sistem scan QR saat masuk lokasi
                </li>

                <!-- WARNING -->
                <li class="flex items-center gap-3 text-rose-500">
                    <!-- WARNING ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01M10.29 3.86l-7.5 13A1 1 0 003.66 18h16.68a1 1 0 00.87-1.5l-7.5-13a1 1 0 00-1.74 0z"/>
                    </svg>
                    Tiket yang sudah dibeli tidak dapat dibatalkan atau direfund
                </li>

            </ul>
        </div>

    </div>

</main>

@endsection