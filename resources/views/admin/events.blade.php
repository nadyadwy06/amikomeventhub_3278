@extends('layouts.admin')

@section('title', 'Kelola Event')

@section('content')

<!-- ACTION BAR -->
<div class="flex justify-between items-center mb-6">
    <div>
        
        <p class="text-sm text-slate-500">Kelola semua event yang tersedia</p>
    </div>

    <button class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
        + Tambah Event
    </button>
</div>

<!-- FILTER -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 mb-6">
    <div class="flex flex-col md:flex-row gap-3">

        <input type="text"
            placeholder="Cari event..."
            class="flex-1 px-4 py-2.5 rounded-lg border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">

        <select class="px-4 py-2.5 rounded-lg border border-slate-200 text-sm">
            <option>Semua Kategori</option>
            <option>Seminar</option>
            <option>Konser</option>
            <option>Workshop</option>
        </select>

        <select class="px-4 py-2.5 rounded-lg border border-slate-200 text-sm">
            <option>Status</option>
            <option>Aktif</option>
            <option>Draft</option>
        </select>

    </div>
</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <!-- HEADER -->
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3 text-center">No</th>
                    <th class="px-6 py-3 text-left">Event</th>
                    <th class="px-6 py-3 text-left">Kategori</th>
                    <th class="px-6 py-3 text-left">Tanggal</th>
                    <th class="px-6 py-3 text-left">Harga</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

                <!-- ROW 1 -->
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-center text-slate-400 font-semibold">1</td>

                    <td class="px-6 py-4">
                        <p class="font-semibold text-slate-800">Jazz Night 2024</p>
                        <p class="text-xs text-slate-400">Event musik live</p>
                    </td>

                    <td class="px-6 py-4 text-slate-600">Konser</td>

                    <td class="px-6 py-4 text-slate-500">16 Nov 2024</td>

                    <td class="px-6 py-4 font-semibold text-indigo-600">
                        Rp 150.000
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                            Aktif
                        </span>
                    </td>

                    <!-- AKSI -->
                    <td class="px-6 py-4">
                        <div class="flex justify-center items-center gap-2">

                            <!-- EDIT -->
                            <button title="Edit"
                                class="p-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="w-4 h-4" 
                                     fill="none" 
                                     viewBox="0 0 24 24" 
                                     stroke="currentColor">
                                    <path stroke-linecap="round" 
                                          stroke-linejoin="round" 
                                          stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>

                            <!-- DELETE -->
                            <button title="Hapus"
                                class="p-2 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                     class="w-4 h-4" 
                                     fill="none" 
                                     viewBox="0 0 24 24" 
                                     stroke="currentColor">
                                    <path stroke-linecap="round" 
                                          stroke-linejoin="round" 
                                          stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>

                        </div>
                    </td>
                </tr>

                <!-- ROW 2 -->
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-center text-slate-400 font-semibold">2</td>

                    <td class="px-6 py-4">
                        <p class="font-semibold text-slate-800">AI Workshop</p>
                        <p class="text-xs text-slate-400">Belajar AI dasar</p>
                    </td>

                    <td class="px-6 py-4 text-slate-600">Workshop</td>

                    <td class="px-6 py-4 text-slate-500">26 Okt 2024</td>

                    <td class="px-6 py-4 font-semibold text-indigo-600">
                        Rp 50.000
                    </td>

                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">
                            Draft
                        </span>
                    </td>

                    <!-- AKSI -->
                    <td class="px-6 py-4">
                        <div class="flex justify-center items-center gap-2">

                            <button title="Edit"
                                class="p-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>

                            <button title="Hapus"
                                class="p-2 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
        Menampilkan 2 data event
    </div>

</div>

@endsection