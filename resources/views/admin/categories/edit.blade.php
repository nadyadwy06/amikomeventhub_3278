@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')

<div class="max-w-2xl">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">
            Edit Kategori
        </h1>

        <p class="text-slate-500 mt-1">
            Perbarui kategori
        </p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <form action="{{ route('admin.categories.update', $category->id) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>

                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nama Kategori
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $category->name) }}"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none"
                       required>

            </div>

            <div class="flex justify-end gap-3">

                <a href="{{ route('admin.categories.index') }}"
                   class="px-5 py-3 rounded-xl text-slate-500 font-semibold hover:bg-slate-100 transition">

                    Batal

                </a>

                <button type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

@endsection