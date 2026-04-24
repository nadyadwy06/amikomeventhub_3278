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

        <div class="flex gap-4">
            <a href="#events" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold">
                Mulai Jelajah
            </a>
        </div>
    </div>

    <div class="flex-1">
        <img src="{{ asset('assets/concert.png') }}" class="rounded-2xl shadow-xl">
    </div>
</section>

<!-- Event Grid -->
<section id="events" class="max-w-7xl mx-auto px-6 py-20">

    <h2 class="text-3xl font-bold mb-8">Event Terdekat</h2>

    <div class="grid md:grid-cols-3 gap-8">

        <!-- Card -->
        <div class="bg-white p-4 rounded-xl shadow">
            <img src="{{ asset('assets/concert.png') }}" class="rounded-lg mb-4">
            <h3 class="font-bold">Jazz Night 2024</h3>
            <p class="text-sm text-gray-500">16 November 2024</p>
            <p class="text-indigo-600 font-bold mt-2">Rp 150rb</p>

            <a href="/event-detail" class="block mt-3 text-indigo-600 font-bold">
                Lihat Detail
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white p-4 rounded-xl shadow">
            <img src="{{ asset('assets/workshop.png') }}" class="rounded-lg mb-4">
            <h3 class="font-bold">AI & Future</h3>
            <p class="text-sm text-gray-500">26 October 2024</p>
            <p class="text-indigo-600 font-bold mt-2">Rp 50rb</p>

            <a href="/event-detail" class="block mt-3 text-indigo-600 font-bold">
                Lihat Detail
            </a>
        </div>

        <!-- Card -->
        <div class="bg-white p-4 rounded-xl shadow">
            <img src="{{ asset('assets/hackathon.png') }}" class="rounded-lg mb-4">
            <h3 class="font-bold">Hackathon 2024</h3>
            <p class="text-sm text-gray-500">18-20 October</p>
            <p class="text-indigo-600 font-bold mt-2">Gratis</p>

            <a href="/event-detail" class="block mt-3 text-indigo-600 font-bold">
                Lihat Detail
            </a>
        </div>

    </div>

</section>

@endsection