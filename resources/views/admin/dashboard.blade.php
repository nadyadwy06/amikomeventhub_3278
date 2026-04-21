@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- SEARCH BAR -->
<div class="mb-6">
    <div class="relative w-full md:w-96">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
            <!-- ICON SEARCH -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-4.3-4.3m1.8-5.2a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </span>
        <input type="text" placeholder="Cari transaksi atau event..."
            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
    </div>
</div>

<!-- STATISTICS -->
<!-- STATISTICS -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <!-- TOTAL PENDAPATAN -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border flex items-center gap-4">
        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600">
            <!-- ICON MONEY -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8c-2 0-3 1-3 2s1 2 3 2 3 1 3 2-1 2-3 2m0-10v10"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-semibold uppercase">Total Pendapatan</p>
            <h3 class="text-2xl font-black text-slate-800">Rp 12.450.000</h3>
        </div>
    </div>

    <!-- TIKET -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border flex items-center gap-4">
        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-green-100 text-green-600">
            <!-- ICON TICKET -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M4 7h16v10H4zM8 7v10M16 7v10"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-semibold uppercase">Tiket Terjual</p>
            <h3 class="text-2xl font-black text-slate-800">1.284</h3>
        </div>
    </div>

    <!-- EVENT -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border flex items-center gap-4">
        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-orange-100 text-orange-600">
            <!-- ICON EVENT -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7V3m8 4V3M4 11h16M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-semibold uppercase">Event Aktif</p>
            <h3 class="text-2xl font-black text-slate-800">8 Event</h3>
        </div>
    </div>

    <!-- PENDING -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border flex items-center gap-4">
        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-rose-100 text-rose-600">
            <!-- ICON CLOCK -->
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M12 8v4l3 3M12 2a10 10 0 100 20 10 10 0 000-20z"/>
            </svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-semibold uppercase">Pesanan Pending</p>
            <h3 class="text-2xl font-black text-slate-800">12</h3>
        </div>
    </div>

</div>

<!-- TRANSAKSI -->
<div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

    <!-- HEADER -->
    <div class="flex justify-between items-center px-6 py-4 border-b">
        <h2 class="font-semibold text-slate-800 flex items-center gap-2">
            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M17 9V7a4 4 0 00-8 0v2M5 9h14l-1 10H6L5 9z"/>
            </svg>
            Transaksi Terakhir
        </h2>

        <a href="/admin/transactions"
           class="flex items-center gap-1 text-indigo-600 text-sm font-semibold hover:underline">
            Lihat Semua
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">Pembeli</th>
                    <th class="px-6 py-3 text-left">Event</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Total</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4 font-medium">Donni</td>
                    <td class="px-6 py-4 text-slate-500">Jazz Night</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            Success
                        </span>
                    </td>
                    <td class="px-6 py-4 font-semibold text-indigo-600">Rp 155.000</td>
                </tr>

                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4 font-medium">Sinta</td>
                    <td class="px-6 py-4 text-slate-500">AI Workshop</td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                            Pending
                        </span>
                    </td>
                    <td class="px-6 py-4 font-semibold text-indigo-600">Rp 50.000</td>
                </tr>

            </tbody>

        </table>
    </div>

</div>

@endsection