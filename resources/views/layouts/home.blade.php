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
                   class="flex flex-col items-center justify-center bg-indigo-50 hover:bg-indigo-600 hover:text-white p-6 rounded-2xl transition">

                    <span class="font-bold">
                        Profil
                    </span>

                </a>

                <a href="{{ route('katalog') }}"
                   class="flex flex-col items-center justify-center bg-indigo-50 hover:bg-indigo-600 hover:text-white p-6 rounded-2xl transition">

                    <span class="font-bold">
                        Katalog
                    </span>

                </a>

                <a href="{{ route('bantuan') }}"
                   class="flex flex-col items-center justify-center bg-indigo-50 hover:bg-indigo-600 hover:text-white p-6 rounded-2xl transition">

                    <span class="font-bold">
                        Bantuan
                    </span>

                </a>

                <a href="{{ route('kontak') }}"
                   class="flex flex-col items-center justify-center bg-indigo-50 hover:bg-indigo-600 hover:text-white p-6 rounded-2xl transition">

                    <span class="font-bold">
                        Kontak
                    </span>

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

        <!-- GRID -->
        <div class="grid md:grid-cols-3 gap-8">

            @forelse($events as $event)

            <!-- CARD -->
            <div class="bg-white rounded-3xl overflow-hidden shadow hover:shadow-2xl transition duration-300">

                <!-- POSTER -->
                <img src="{{ asset('storage/' . $event->poster_path) }}"
                     alt="{{ $event->title }}"
                     class="w-full h-60 object-cover">

                <!-- CONTENT -->
                <div class="p-6">

                    <!-- CATEGORY -->
                    <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 text-xs font-bold rounded-full mb-4">

                        {{ $event->category->name }}

                    </span>

                    <!-- TITLE -->
                    <h3 class="text-xl font-bold text-slate-800 mb-2">

                        {{ $event->title }}

                    </h3>

                    <!-- DATE -->
                    <p class="text-slate-500 text-sm mb-2">

                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y H:i') }}

                    </p>

                    <!-- LOCATION -->
                    <p class="text-slate-400 text-sm mb-4">

                        {{ $event->location }}

                    </p>

                    <!-- PRICE -->
                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-xs text-slate-400">
                                Harga Mulai
                            </p>

                            <p class="text-indigo-600 font-extrabold text-lg">

                                Rp {{ number_format($event->price, 0, ',', '.') }}

                            </p>

                        </div>

                        <!-- BUTTON -->
                        <a href="{{ route('events.show', $event->id) }}"
                           class="px-5 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">

                            Detail

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-span-3 text-center py-20">

                <p class="text-slate-400 text-lg">
                    Belum ada event tersedia
                </p>

            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection