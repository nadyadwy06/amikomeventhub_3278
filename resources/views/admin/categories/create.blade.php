@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

<div class="max-w-3xl">

    <!-- Header -->
    <div class="mb-6">

        <p class="text-slate-500 mt-1">
            Tambahkan kategori baru
        </p>
    </div>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan semua error validasi -->
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-xl">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Card Form -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <form action="{{ route('admin.categories.store') }}"
              method="POST"
              class="space-y-6">

            @csrf

            <!-- Nama Kategori -->
            <div>
                <label for="name"
                       class="block text-sm font-semibold text-slate-700 mb-2">
                    Nama Kategori
                </label>

                <input id="name"
                       type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none"
                       placeholder="Masukkan nama kategori"
                       required>

                @error('name')
                    <p class="text-red-500 text-sm mt-2">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Tombol -->
            <div class="flex justify-end gap-3">

                <!-- Batal -->
                <a href="{{ route('admin.categories.index') }}"
                   class="px-5 py-3 rounded-xl text-slate-500 font-semibold hover:bg-slate-100 transition">Batal
                </a>

                <!-- Simpan -->
                <button type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection