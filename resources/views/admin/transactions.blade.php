@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('content')

<!-- ACTION BAR -->
<div class="flex justify-between items-center mb-6">
    <div>
        
        <p class="text-sm text-slate-500">Kelola semua transaksi event</p>
    </div>

    <button class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition flex items-center gap-2">
        <!-- ICON EXPORT -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M12 4v12m0 0l-3-3m3 3l3-3M4 20h16"/>
        </svg>
        Export
    </button>
</div>

<!-- FILTER -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 mb-6">
    <div class="flex flex-col md:flex-row gap-3">

        <!-- SEARCH -->
        <input type="text"
            placeholder="Cari transaksi..."
            class="flex-1 px-4 py-2.5 rounded-lg border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none">

        <!-- FILTER STATUS -->
        <select class="px-4 py-2.5 rounded-lg border border-slate-200">
            <option>Semua Status</option>
            <option>Success</option>
            <option>Pending</option>
        </select>

    </div>
</div>

<!-- TABLE -->
<!-- TABLE -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <!-- HEADER -->
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">
                <tr class="text-left">

                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Pembeli</th>
                    <th class="px-6 py-3">Event</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Total</th>
                    <th class="px-6 py-3 text-center">Aksi</th>

                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

                <tr class="hover:bg-slate-50 transition align-middle">

                    <!-- NO -->
                    <td class="px-6 py-4 text-slate-400 font-semibold align-middle">
                        1
                    </td>

                    <!-- PEMBELI -->
                    <td class="px-6 py-4 align-middle">
                        <div class="flex flex-col">
                            <span class="font-semibold text-slate-800 leading-tight">
                                Donni
                            </span>
                            <span class="text-xs text-slate-400">
                                donni@email.com
                            </span>
                        </div>
                    </td>

                    <!-- EVENT -->
                    <td class="px-6 py-4 text-slate-700 align-middle">
                        Jazz Night
                    </td>

                    <!-- STATUS -->
                    <td class="px-6 py-4 align-middle">
                        <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                            Success
                        </span>
                    </td>

                    <!-- TOTAL -->
                    <td class="px-6 py-4 align-middle">
                        <span class="font-semibold text-indigo-600">
                            Rp 155.000
                        </span>
                    </td>

                    <!-- AKSI -->
                    <td class="px-6 py-4 text-center align-middle">

                        <div class="flex justify-center gap-2">

                            <!-- DETAIL -->
                            <button class="p-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M15 12H9m12 0A9 9 0 119 3a9 9 0 0112 9z"/>
                                </svg>
                            </button>

                            <!-- DELETE -->
                            <button class="p-2 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-4 h-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-width="2"
                                          stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7M4 7h16"/>
                                </svg>
                            </button>

                        </div>

                    </td>

                </tr>

            </tbody>

        </table>
    </div>

    <!-- FOOTER -->
    <div class="px-6 py-3 text-sm text-slate-500 bg-slate-50">
        Menampilkan 1 data transaksi
    </div>

</div>

@endsection