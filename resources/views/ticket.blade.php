@extends('layouts.app')

@section('title', 'E-Ticket')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-900 flex items-center justify-center p-6">

    <div class="max-w-md w-full">

        <!-- SUCCESS HEADER -->
        <div class="text-center mb-8 text-white">

            <!-- ICON CHECK -->
            <div class="w-20 h-20 bg-white/20 backdrop-blur rounded-full flex items-center justify-center mx-auto mb-4 border border-white/30">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-10 h-10"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5 13l4 4L19 7"/>
                </svg>
            </div>

            <h1 class="text-3xl font-bold">Pembayaran Berhasil</h1>
            <p class="text-indigo-100 mt-2">Ticket Anda telah terbit dan siap digunakan</p>
        </div>

        <!-- TICKET CARD -->
        <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- SINGLE CUT TOP ONLY -->
            <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-indigo-600 rounded-full"></div>

            <!-- HEADER -->
            <div class="p-6 bg-indigo-50 text-center border-b border-dashed border-indigo-200">

                <p class="text-indigo-600 text-xs font-bold tracking-widest">
                    E-TICKET RESMI
                </p>

                <h2 class="text-xl font-bold text-slate-800 mt-1">
                    Jazz Night 2024
                </h2>

            </div>

            <!-- BODY -->
            <div class="p-6 space-y-5 text-sm text-slate-700">

                <!-- NAME STYLE PREMIUM -->
                <div class="text-center mb-4">
                    <p class="text-[10px] uppercase tracking-widest text-slate-400">
                        Nama Pemegang Tiket
                    </p>

                    <h3 class="text-lg font-bold text-slate-900 tracking-wide">
                        Donni
                    </h3>
                </div>

                <!-- INFO -->
                <div class="space-y-3">

                    <div class="flex justify-between items-center">
                        <span class="text-slate-400 text-xs uppercase tracking-wider">Tanggal</span>
                        <span class="font-semibold text-slate-800">16 Nov 2024</span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-400 text-xs uppercase tracking-wider">Order ID</span>
                        <span class="font-mono font-bold text-indigo-600 tracking-widest">
                            TRX-99210
                        </span>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-slate-400 text-xs uppercase tracking-wider">Lokasi</span>
                        <span class="font-semibold text-slate-800">Blue Note</span>
                    </div>

                </div>

                <!-- PERFORATION -->
                <div class="relative my-6">
                    <div class="border-t border-dashed border-slate-300"></div>
                </div>

                <!-- QR SECTION -->
                <div class="text-center">

                    <div class="w-44 h-44 mx-auto bg-gradient-to-b from-indigo-50 to-white rounded-2xl flex flex-col items-center justify-center border border-indigo-100 shadow-sm">

                        <!-- QR ICON -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-12 h-12 text-indigo-600 mb-2"
                            fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z"/>
                        </svg>

                        <p class="text-xs font-semibold text-indigo-600">
                            Scan untuk Check-in
                        </p>

                        <p class="text-[10px] text-slate-400 mt-1">
                            Tunjukkan QR di pintu masuk
                        </p>

                        <span class="font-mono text-sm font-bold text-slate-800 mt-2 tracking-widest">
                            {{ 'TKT-' . strtoupper(Str::random(8)) }}
                        </span>

                    </div>

                    <p class="mt-3 font-mono text-xs text-slate-500">
                        ORDER ID:
                        <span class="text-indigo-600 font-semibold">
                            EVT-{{ rand(100000,999999) }}
                        </span>
                    </p>

                </div>

            </div>

            <!-- FOOTER -->
            <div class="p-6 bg-slate-50 border-t border-dashed">

                <button onclick="window.print()"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition">
                    Cetak / Simpan PDF
                </button>

                <a href="/"
                    class="block text-center mt-4 text-sm text-slate-500 hover:text-slate-700">
                    Kembali ke Home
                </a>

            </div>

        </div>

        <!-- NOTE -->
        <p class="text-center text-xs text-indigo-100 mt-6">
            Simpan tiket ini atau screenshot untuk masuk ke event
        </p>

    </div>

</div>

@endsection