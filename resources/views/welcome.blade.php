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

        @forelse($events as $event)
        <div class="bg-white p-5 rounded-2xl shadow hover:shadow-lg transition flex flex-col h-full">
    
    <div class="w-full aspect-square bg-slate-100 rounded-2xl mb-4 overflow-hidden flex items-center justify-center">
    <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
</div>

    <div class="flex flex-col flex-grow">
        <h3 class="font-bold text-lg text-slate-800 mb-2">{{ $event->title }}</h3>
        </div>

        <div class="flex items-center gap-2 text-sm text-slate-500 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                </svg>
                {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
            </div>

        <div class="flex items-center gap-2 text-indigo-600 font-bold mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $event->price > 0 ? 'Rp ' . number_format($event->price, 0, ',', '.') : 'Gratis' }}
            </div>

            <a href="{{ route('events.show', $event->id) }}"
               class="mt-4 inline-flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        @empty
            <div class="col-span-3 text-center py-10">
                <p class="text-slate-500">Belum ada event yang tersedia saat ini. Silakan kembali lagi nanti.</p>
            </div>
        @endforelse

    </div>

</section>

@endsection