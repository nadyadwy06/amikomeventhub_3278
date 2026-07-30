@extends('layouts.admin')

@section('title', 'Tambah Event')

@section('content')
<header class="mb-10">
    <h1 class="text-2xl font-bold text-slate-800">Tambah Event</h1>
    <p class="text-slate-500 font-medium">Isi detail event baru dengan lengkap.</p>

</header>


<div class="bg-white rounded-[2.5rem] border border-slate-100 p-10 shadow-sm max-w-4xl">
    
    {{-- ALERT ERROR JIKA VALIDASI GAGAL --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl">
            <p class="font-bold mb-1">Gagal menyimpan event:</p>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-2 gap-6">
            {{-- Judul Event --}}
            <div class="col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Judul Event</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full px-5 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>

            {{-- Kategori --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                <select name="category_id" class="w-full px-5 py-3 rounded-xl border border-slate-200 outline-none" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal & Waktu --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal & Waktu</label>
                <input type="datetime-local" name="date" value="{{ old('date') }}" class="w-full px-5 py-3 rounded-xl border border-slate-200 outline-none" required>
            </div>

            {{-- Deskripsi --}}
            <div class="col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full px-5 py-3 rounded-xl border border-slate-200 outline-none" required>{{ old('description') }}</textarea>
            </div>

            {{-- Harga --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price') }}" class="w-full px-5 py-3 rounded-xl border border-slate-200 outline-none" required>
            </div>

            {{-- Stok Tiket --}}
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Stok Tiket</label>
                <input type="number" name="stock" value="{{ old('stock') }}" class="w-full px-5 py-3 rounded-xl border border-slate-200 outline-none" required>
            </div>

            {{-- Lokasi --}}
            <div class="col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Lokasi</label>
                <input type="text" name="location" value="{{ old('location') }}" class="w-full px-5 py-3 rounded-xl border border-slate-200 outline-none" required>
            </div>

            {{-- Upload Poster --}}
            <div class="col-span-2">
                <label class="block text-sm font-bold text-slate-700 mb-2">Upload Poster</label>
                <input type="file" name="poster" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, GIF (Maks. 2MB)</p>
            </div>
        </div>

        <div class="flex justify-end gap-4 mt-8">
            <a href="{{ route('admin.events.index') }}" class="px-6 py-3 font-bold text-slate-400">Batal</a>
            <button type="submit" class="px-8 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">Simpan Event</button>
        </div>
    </form>
</div>

@endsection
