@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
    <div class="flex-1 space-y-8">
        <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase">
            #1 Event Platform
        </span>

        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
            Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
        </h1>

        <p class="text-lg text-slate-500 max-w-lg">
            Dari konser musik hingga workshop teknologi, semua ada di genggamanmu.
        </p>

        <!-- BUTTON -->
        <div class="flex gap-4 flex-wrap">

            <!-- MULAI JELAJAH -->
            <a href="#events"
               class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">
                Mulai Jelajah
            </a>

            <!-- CARA PESAN -->
            <button onclick="openModal()"
                class="px-8 py-4 border border-indigo-600 text-indigo-600 rounded-2xl font-bold hover:bg-indigo-50 transition">
                Cara Pesan
            </button>

        </div>
    </div>

    <div class="flex-1">
        <img src="{{ asset('assets/concert.png') }}" class="rounded-2xl shadow-xl">
    </div>
</section>

<!-- MODAL CARA PESAN -->
<div id="modal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-8 max-w-md w-full shadow-xl relative">

        <!-- CLOSE -->
        <button onclick="closeModal()"
            class="absolute top-3 right-3 text-slate-400 hover:text-slate-700 text-xl">
            ✕
        </button>

        <h3 class="text-xl font-bold mb-4 text-slate-800">Cara Pesan Tiket</h3>

        <ul class="space-y-3 text-sm text-slate-600">
            <li>1. Pilih event yang ingin kamu ikuti</li>
            <li>2. Klik tombol "Lihat Detail"</li>
            <li>3. Tekan "Pesan Tiket"</li>
            <li>4. Isi data diri</li>
            <li>5. Lakukan pembayaran</li>
            <li>6. Tiket akan muncul di menu "Tiket Saya"</li>
        </ul>

    </div>
</div>

<!-- SCRIPT -->
<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('modal').classList.add('flex');
}

function closeModal() {
    document.getElementById('modal').classList.remove('flex');
    document.getElementById('modal').classList.add('hidden');
}
</script>

<!-- Event Grid -->
<section id="events" class="max-w-7xl mx-auto px-6 py-20">

    <h2 class="text-3xl font-bold mb-8">Event Terdekat</h2>

    <div class="grid md:grid-cols-3 gap-8">

        <!-- Card -->
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <img src="{{ asset('assets/concert.png') }}" class="rounded-xl mb-4">

            <h3 class="font-bold text-lg text-slate-800">Jazz Night 2024</h3>

            <!-- TANGGAL -->
            <div class="flex items-center gap-2 text-sm text-slate-500 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3M4 11h16M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                </svg>
                16 November 2024
            </div>

            <!-- HARGA (PRICE TAG) -->
            <div class="flex items-center gap-2 text-indigo-600 font-bold mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M7 7h.01M7 3h5l7 7-5 5-7-7V3z"/>
                </svg>
                Rp 150.000
            </div>

            <a href="/event-detail"
               class="mt-4 inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <img src="{{ asset('assets/workshop.png') }}" class="rounded-xl mb-4">

            <h3 class="font-bold text-lg text-slate-800">AI & Future</h3>

            <!-- TANGGAL -->
            <div class="flex items-center gap-2 text-sm text-slate-500 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3M4 11h16M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                </svg>
                26 October 2024
            </div>

            <!-- HARGA -->
            <div class="flex items-center gap-2 text-indigo-600 font-bold mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M7 7h.01M7 3h5l7 7-5 5-7-7V3z"/>
                </svg>
                Rp 50.000
            </div>

            <a href="/event-detail"
               class="mt-4 inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition">
            <img src="{{ asset('assets/hackathon.png') }}" class="rounded-xl mb-4">

            <h3 class="font-bold text-lg text-slate-800">Hackathon 2024</h3>

            <!-- TANGGAL (SUDAH DISAMAKAN) -->
            <div class="flex items-center gap-2 text-sm text-slate-500 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3M4 11h16M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                </svg>
                18 - 20 October
            </div>

            <!-- GRATIS -->
            <div class="flex items-center gap-2 text-green-600 font-bold mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M4 8a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 010 4v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2a2 2 0 010-4V8z"/>
                </svg>
                Gratis
            </div>

            <a href="/event-detail"
               class="mt-4 inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

    </div>

</section>

@endsection