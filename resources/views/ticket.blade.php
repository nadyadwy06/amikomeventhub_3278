    @extends('layouts.app')

    @section('title', 'E-Ticket')

    @section('content')

    <div class="min-h-screen bg-gradient-to-br from-indigo-600 via-indigo-700 to-indigo-900 flex items-center justify-center p-6">
        <div class="max-w-md w-full">

            <div class="text-center mb-8 text-white">
                <div class="w-20 h-20 bg-white/20 backdrop-blur rounded-full flex items-center justify-center mx-auto mb-4 border border-white/30">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold">Pembayaran Berhasil</h1>
                <p class="text-indigo-100 mt-2">Ticket Anda telah terbit dan siap digunakan</p>
            </div>

            <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-indigo-600 rounded-full"></div>

                <div class="p-6 bg-indigo-50 text-center border-b border-dashed border-indigo-200">
                    <p class="text-indigo-600 text-xs font-bold tracking-widest">E-TICKET RESMI</p>
                    <h2 class="text-xl font-bold text-slate-800 mt-1">
                        {{ $transaction->event->title ?? 'Event' }}
                    </h2>
                </div>

                <div class="p-6 space-y-5 text-sm text-slate-700">
                    <div class="text-center mb-4">
                        <p class="text-[10px] uppercase tracking-widest text-slate-400">Nama Pemegang Tiket</p>
                        <h3 class="text-lg font-bold text-slate-900 tracking-wide">
                            {{ $transaction->customer_name ?? 'Guest' }}
                        </h3>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-slate-400 text-xs uppercase tracking-wider">Tanggal</span>
                            <span class="font-semibold text-slate-800">
                                {{ isset($transaction->event->date) ? \Carbon\Carbon::parse($transaction->event->date)->format('d M Y') : '-' }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-slate-400 text-xs uppercase tracking-wider">Order ID</span>
                            <span class="font-mono font-bold text-indigo-600 tracking-widest">
                                {{ $transaction->order_id ?? '-' }}
                            </span>
                        </div>
                    </div>

                    <div class="relative my-6">
                        <div class="border-t border-dashed border-slate-300"></div>
                    </div>

                    <div class="text-center">
                        <div class="w-44 h-44 mx-auto bg-gradient-to-b from-indigo-50 to-white rounded-2xl flex flex-col items-center justify-center border border-indigo-100 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-indigo-600 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z"/>
                            </svg>
                            <span class="font-mono text-sm font-bold text-slate-800 mt-2 tracking-widest">
                                {{ $transaction->order_id ?? 'TKT-00000000' }}
                            </span>
                        </div>
                    </div>

                </div>

                <div class="p-6 bg-slate-50 border-t border-dashed">
                    <button onclick="window.print()" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition">
                        Cetak / Simpan PDF
                    </button>
                    <a href="/" class="block text-center mt-4 text-sm text-slate-500 hover:text-slate-700">Kembali ke Home</a>
                </div>
            </div>
        </div>
        
    </div>

    @endsection