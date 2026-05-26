        @extends('layouts.admin')

        @section('title', 'Manajemen Kategori')

        @section('content')

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">

            <div>
                <p class="text-sm text-slate-500">
                    Kelola semua kategori event
                </p>
            </div>

            <div class="flex w-full md:w-auto gap-3">
                
                <form action="{{ route('admin.categories.index') }}" method="GET" class="flex flex-1 gap-2">
                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari kategori..."
                        class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
                    
                    <button type="submit"
                            class="px-5 py-2.5 bg-slate-600 text-white rounded-xl hover:bg-slate-700 transition text-sm font-semibold whitespace-nowrap">
                        Cari
                    </button>
                </form>

                <a href="{{ route('admin.categories.create') }}"
                class="flex items-center gap-2 px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Kategori
                </a>
            </div>

        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-6 py-3 text-center w-16">No</th>
                            <th class="px-6 py-3 text-left">Nama Kategori</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($categories as $category)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-center text-slate-400 font-semibold">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-semibold text-slate-700">{{ $category->name }}</td>
                            
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="w-10 h-10 flex items-center justify-center bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-10 h-10 flex items-center justify-center bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="3" class="text-center py-8 text-slate-400">Belum ada kategori</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-3 text-sm text-slate-500 bg-slate-50">
                Menampilkan {{ $categories->count() }} data kategori
            </div>
        </div>

        @endsection