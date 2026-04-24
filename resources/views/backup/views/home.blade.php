@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="bg-gradient-to-br from-indigo-50 to-white py-20">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <h1 class="text-5xl md:text-6xl font-extrabold text-slate-800 leading-tight mb-6">
            Temukan Tiket Event Terbaik 🎉
        </h1>

        <p class="text-lg text-slate-500 max-w-2xl mx-auto mb-10">
            Booking event sekarang jadi lebih mudah, cepat, dan aman.
        </p>

        <div class="flex justify-center gap-4">
            <a href="#events"
               class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition">
                Jelajahi Event
            </a>

            <a href="#"
               class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold hover:border-indigo-600 hover:text-indigo-600 transition">
                Cara Pesan
            </a>
        </div>
    </div>
</section>

<!-- MENU CEPAT -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-6">

        <div class="bg-white rounded-3xl shadow-xl p-10 border border-slate-100">
            <h2 class="text-2xl font-bold text-center mb-8 text-slate-800">
                Menu Cepat
            </h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                <a href="{{ route('profil') }}"
                   class="flex flex-col items-center justify-center bg-indigo-50 hover:bg-indigo-600 hover:text-white p-6 rounded-2xl transition group">
                    <span class="font-bold">Profil</span>
                </a>

                <a href="{{ route('katalog') }}"
                   class="flex flex-col items-center justify-center bg-indigo-50 hover:bg-indigo-600 hover:text-white p-6 rounded-2xl transition">
                    <span class="font-bold">Katalog</span>
                </a>

                <a href="{{ route('bantuan') }}"
                   class="flex flex-col items-center justify-center bg-indigo-50 hover:bg-indigo-600 hover:text-white p-6 rounded-2xl transition">
                    <span class="font-bold">Bantuan</span>
                </a>

                <a href="{{ route('kontak') }}"
                   class="flex flex-col items-center justify-center bg-indigo-50 hover:bg-indigo-600 hover:text-white p-6 rounded-2xl transition">
                    <span class="font-bold">Kontak</span>
                </a>

            </div>
        </div>

    </div>
</section>

<!-- EVENT GRID -->
<section id="events" class="py-20 bg-slate-50">
    <div class="max-w-6xl mx-auto px-6">

        <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl font-extrabold text-slate-800">
                Event Terdekat
            </h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- CARD -->
            <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl transition">
                <h3 class="text-xl font-bold mb-2">Jazz Night 2024</h3>
                <p class="text-slate-500 text-sm mb-4">16 November 2024</p>

                <a href="{{ route('events.show') }}"
                   class="inline-block mt-2 text-indigo-600 font-bold hover:underline">
                    Lihat Detail →
                </a>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl transition">
                <h3 class="text-xl font-bold mb-2">AI Workshop</h3>
                <p class="text-slate-500 text-sm mb-4">26 Oktober 2024</p>

                <a href="{{ route('events.show') }}"
                   class="text-indigo-600 font-bold hover:underline">
                    Lihat Detail →
                </a>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl transition">
                <h3 class="text-xl font-bold mb-2">Hackathon 2024</h3>
                <p class="text-slate-500 text-sm mb-4">18 Oktober 2024</p>

                <a href="{{ route('events.show') }}"
                   class="text-indigo-600 font-bold hover:underline">
                    Lihat Detail →
                </a>
            </div>

        </div>

    </div>
</section>

@endsection