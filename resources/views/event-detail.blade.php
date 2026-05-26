@extends('layouts.app')

@section('title', $event->title)

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-12">

<div class="lg:col-span-1">
        <div class="sticky top-32">
            <img src="{{ asset('storage/' . $event->poster_path) }}" 
                 alt="{{ $event->title }}"
                 class="w-full rounded-[2.5rem] shadow-2xl border-8 border-white">

            <div class="mt-8 p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <h4 class="font-bold mb-4">Penyelenggara</h4>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold">
                        {{ substr($event->title, 0, 2) }}
                    </div>
                    <div>
                        <p class="font-bold text-slate-800">Admin Event</p>
                        <p class="text-xs text-slate-500">Verified Organizer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="lg:col-span-2 space-y-12">

    
    <div class="space-y-4">
            <span class="px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
    {{ $event->category->name ?? 'Tanpa Kategori' }}
</span>

            <h1 class="text-4xl md:text-5xl font-black leading-tight">
                {{ $event->title }}
            </h1>

            <div class="flex flex-wrap gap-6 text-slate-500 font-medium">
                <div class="flex items-center gap-2">
                    <span>{{ \Carbon\Carbon::parse($event->date)->format('l, d M Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span>{{ $event->location }}</span>
                </div>
            </div>
        </div>

        
    <div class="prose prose-slate max-w-none">
        <h3 class="text-2xl font-bold mb-4">Deskripsi Event</h3>
            <p class="text-lg text-slate-600 leading-relaxed">
                {{ $event->description }}
            </p>
        </div>

        <div class="bg-indigo-600 rounded-[2.5rem] p-8 text-white shadow-2xl">    
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div>
                    <p class="text-indigo-200 font-semibold text-sm mb-2 uppercase tracking-wide">Harga Tiket</p>
                    <h2 class="text-5xl font-black flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5l7 7-5 5-7-7V3z"/>
                        </svg>
                        Rp {{ number_format($event->price, 0, ',', '.') }}
                    </h2>

                    
                    <div class="mt-4 flex items-center gap-2 text-indigo-100">
                    
                    <span class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></span>
                        <p>Tersedia <span class="font-bold">{{ $event->stock }} tiket</span> saat ini</p>
                    </div>
                </div>

               
                <div>
                    <a href="{{ route('checkout', $event->id) }}"
                        class="px-10 py-5 bg-white text-indigo-600 rounded-2xl font-bold text-lg shadow-lg hover:shadow-xl hover:scale-105 transition">
                        Pesan Sekarang
                    </a>
                </div>
        
            </div>
        
        </div>

        
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

    </div>

</main>

@endsection