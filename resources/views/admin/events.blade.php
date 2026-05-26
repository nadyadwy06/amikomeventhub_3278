@extends('layouts.admin')

@section('title', 'Kelola Event')

@section('content')


<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-slate-500">Berikut adalah daftar event yang telah Anda buat.</p>

    <a href="{{ route('admin.events.create') }}" 
       class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition flex items-center gap-2 shadow-lg shadow-indigo-200">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Event
    </a>
</div>


<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
<div class="overflow-x-auto">
        
            <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-4 text-center">No</th>
                    <th class="px-6 py-4 text-left">Event</th>
                    <th class="px-6 py-4 text-left">Kategori</th>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-left">Harga</th>
                    <th class="px-6 py-4 text-center">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($events as $index => $event)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 text-center text-slate-400 font-medium">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-semibold text-slate-800">{{ $event->title }}</td>
                    <td class="px-6 py-4 text-slate-600">{{ $event->category->name }}</td>
                    <td class="px-6 py-4 text-slate-500">{{ $event->date->format('d M Y') }}</td>
                    <td class="px-6 py-4 font-semibold text-indigo-600">Rp {{ number_format($event->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $event->status == 'Active' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $event->status }}
                        </span>
                    </td>
                    
                    <td class="px-6 py-4">
                        <div class="flex justify-center items-center gap-2">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="px-3 py-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-slate-400">Belum ada data event.</td>
                </tr>
                @endforelse
            </tbody>
        
        </table>
    </div>

    </div>

@endsection