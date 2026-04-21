@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')

<!-- ACTION BAR -->
<div class="flex justify-between items-center mb-6">
    <div>
        
    </div>

    <button class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                d="M12 4v16m8-8H4" />
        </svg>
        Tambah Kategori
    </button>
</div>

<!-- FILTER -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 mb-6">
    <div class="flex flex-col md:flex-row gap-3">

        <input type="text"
            placeholder="Cari kategori..."
            class="flex-1 px-4 py-2.5 rounded-lg border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">

    </div>
</div>

<!-- TABLE -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">
        <table class="w-full text-sm">

            <!-- HEADER -->
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3 text-center w-16">No</th>
                    <th class="px-6 py-3 text-left">Nama Kategori</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

                <!-- ROW 1 -->
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-center text-slate-400 font-semibold">1</td>
                    <td class="px-6 py-4 font-semibold text-slate-700">Seminar</td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center items-center gap-2">

                            <button title="Edit"
                                class="p-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>

                            <button title="Hapus"
                                class="p-2 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M4 7h16"/>
                                </svg>
                            </button>

                        </div>
                    </td>
                </tr>

                <!-- ROW 2 -->
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-center text-slate-400 font-semibold">2</td>
                    <td class="px-6 py-4 font-semibold text-slate-700">Konser</td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center items-center gap-2">

                            <button class="p-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>

                            <button class="p-2 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M4 7h16"/>
                                </svg>
                            </button>

                        </div>
                    </td>
                </tr>

                <!-- ROW 3 -->
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-6 py-4 text-center text-slate-400 font-semibold">3</td>
                    <td class="px-6 py-4 font-semibold text-slate-700">Workshop</td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center items-center gap-2">

                            <button class="p-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>

                            <button class="p-2 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M4 7h16"/>
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
        Menampilkan 3 data kategori
    </div>

</div>

@endsection