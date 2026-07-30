@extends('layouts.app')

@section('title', $event->title)

@section('content')

    <main class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-12">

            {{-- Kiri: Poster & Profil Penyelenggara --}}
            <div class="lg:col-span-1">
                <div class="sticky top-32">
                    <img src="{{ asset('storage/' . $event->poster_path) }}" 
                        alt="{{ $event->title }}"
                        class="w-full rounded-[2.5rem] shadow-2xl border-8 border-white object-cover">

                    <div class="mt-8 p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                        <h4 class="font-bold mb-4 text-slate-800">Penyelenggara</h4>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold text-lg">
                                {{ substr($event->organizer->name ?? $event->title, 0, 2) }}
                            </div>
                            <div>
                                <p class="font-bold text-slate-800">
                                    {{ $event->organizer->name ?? 'Admin Event' }}
                                </p>
                                <p class="text-xs text-slate-500">Verified Organizer</p>
                            </div>
                        </div>

                        {{-- Ringkasan Rating Organizer --}}
                        @if(isset($event->organizer->reviews) && $event->organizer->reviews->count() > 0)
                            <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between text-sm">
                                <span class="text-slate-500 font-medium">Rating Penyelenggara</span>
                                <span class="font-extrabold text-amber-500 flex items-center gap-1">
                                    ★ {{ number_format($event->organizer->reviews->avg('rating'), 1) }}
                                    <span class="text-xs text-slate-400 font-normal">({{ $event->organizer->reviews->count() }})</span>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>


            {{-- Kanan: Detail Event, Harga, Kebijakan & Ulasan --}}
            <div class="lg:col-span-2 space-y-12">

                {{-- Info Event --}}
                <div class="space-y-4">
                    <span class="px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
                        {{ $event->category->name ?? 'Tanpa Kategori' }}
                    </span>

                    <h1 class="text-4xl md:text-5xl font-black leading-tight text-slate-900">
                        {{ $event->title }}
                    </h1>

                    <div class="flex flex-wrap gap-6 text-slate-500 font-medium">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($event->date)->format('l, d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>
                </div>

                {{-- Deskripsi --}}
                <div class="prose prose-slate max-w-none">
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">Deskripsi Event</h3>
                    <p class="text-lg text-slate-600 leading-relaxed whitespace-pre-line">
                        {{ $event->description }}
                    </p>
                </div>

                {{-- Box Beli Tiket --}}
                <div class="bg-indigo-600 rounded-[2.5rem] p-8 text-white shadow-2xl">    
                    <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                        <div>
                            <p class="text-indigo-200 font-semibold text-sm mb-2 uppercase tracking-wide">Harga Tiket</p>
                            <h2 class="text-5xl font-black flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5l7 7-5 5-7-7V3z"/>
                                </svg>
                                @if($event->price == 0)
                                    Gratis
                                @else
                                    Rp {{ number_format($event->price, 0, ',', '.') }}
                                @endif
                            </h2>

                            <div class="mt-4 flex items-center gap-2 text-indigo-100">
                                <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></span>
                                <p>Tersedia <span class="font-bold">{{ $event->stock }} tiket</span> saat ini</p>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('checkout.create', $event->id) }}"
                                class="px-10 py-5 bg-white text-indigo-600 rounded-2xl font-bold text-lg shadow-lg hover:shadow-xl hover:scale-105 transition inline-block text-center">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Kebijakan Tiket --}}
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-slate-800">Kebijakan Tiket</h3>
                    
                    <ul class="space-y-3 text-slate-600">
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            E-ticket akan dikirim otomatis setelah pembayaran berhasil
                        </li>
                        
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            Tiket dapat digunakan dengan sistem scan QR saat masuk lokasi
                        </li>

                        <li class="flex items-start gap-3 text-rose-600 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <span>Tiket yang sudah dibeli tidak dapat direfund atau dikembalikan</span>
                        </li>
                    </ul>
                </div>

                {{-- SECTION ULASAN & RATING (SOAL 1 POIN 2) --}}
                <div class="pt-8 border-t border-slate-200 space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-slate-800">Ulasan & Rating</h3>
                            <p class="text-slate-500 text-sm">Testimoni dari pengunjung acara</p>
                        </div>

                        {{-- Rata-rata Rating Event --}}
                        @if(isset($event->reviews) && $event->reviews->count() > 0)
                            <div class="flex items-center gap-2 bg-amber-50 px-4 py-2 rounded-2xl border border-amber-200">
                                <span class="text-2xl font-black text-amber-500">★ {{ number_format($event->reviews->avg('rating'), 1) }}</span>
                                <span class="text-xs text-amber-700 font-bold">/ 5.0</span>
                            </div>
                        @endif
                    </div>

                    {{-- List Ulasan --}}
                    <div class="space-y-4">
                        @forelse($event->reviews ?? [] as $review)
                            <div class="p-6 bg-white rounded-3xl border border-slate-100 shadow-sm space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center font-bold text-slate-600 text-sm">
                                            {{ substr($review->user->name ?? 'U', 0, 1) }}
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-slate-800 text-sm">{{ $review->user->name ?? 'Pengunjung' }}</h5>
                                            <span class="text-xs text-slate-400">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>

                                    {{-- Bintang Rating --}}
                                    <div class="text-amber-400 font-bold text-lg">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                ★
                                            @else
                                                <span class="text-slate-200">★</span>
                                            @endif
                                        @endfor
                                    </div>
                                </div>

                                <p class="text-slate-600 text-sm leading-relaxed">
                                    "{{ $review->comment }}"
                                </p>
                            </div>
                        @empty
                            <div class="p-8 bg-slate-50 rounded-3xl border border-dashed border-slate-200 text-center">
                                <p class="text-slate-400 text-sm">Belum ada ulasan untuk event ini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>

        </main>

@endsection