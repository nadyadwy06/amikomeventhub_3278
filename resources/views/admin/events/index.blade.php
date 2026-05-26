@extends('layouts.admin')

@section('title', 'Kelola Event')

@section('content')

<div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    
    <div>
        <p class="text-sm text-slate-500">Kelola semua event yang tersedia di sistem</p>
    </div>
    
    <div class="flex w-full md:w-auto gap-3">
        
        <form action="{{ route('admin.events.index') }}" method="GET" class="flex flex-1 gap-2">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="Cari event..." 
                   class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
            
            <button type="submit" 
                    class="px-5 py-2.5 bg-slate-600 text-white rounded-xl hover:bg-slate-700 transition text-sm font-semibold whitespace-nowrap">
                Cari
            </button>
        </form>

        <a href="{{ route('admin.events.create') }}" 
           class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition whitespace-nowrap">
            + Tambah Event Baru
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Poster</th>
                    <th class="px-6 py-3">Event</th>
                    <th class="px-6 py-3">Harga / Stok</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($events as $index => $event)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/'.$event->poster_path) }}" 
                             class="w-16 h-20 rounded-lg object-cover border border-slate-200" 
                             alt="{{ $event->title }}">
                    </td>
                    
                    <td class="px-6 py-4">
                        <p class="font-bold text-slate-800">{{ $event->title }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">
                            {{ $event->category->name }} • {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                        </p>
                    </td>
                    
                    <td class="px-6 py-4">
                        <p class="font-semibold text-indigo-600">Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                        <p class="text-xs text-slate-400">Stok: {{ $event->stock }}</p>
                    </td>
                    
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('admin.events.edit', $event->id) }}" 
                               class="p-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            
                            <form action="{{ route('admin.events.destroy', $event->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Hapus event ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" 
                                        class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-slate-400">Belum ada data event</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="px-6 py-3 text-sm text-slate-500 bg-slate-50">
        Menampilkan {{ $events->count() }} data events
    </div>
</div>

@endsection