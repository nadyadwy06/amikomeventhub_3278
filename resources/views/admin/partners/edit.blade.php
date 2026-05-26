@extends('layouts.admin')

@section('title', 'Edit Partner')

@section('content')
<div class="max-w-2xl">
    <h2 class="text-2xl font-black text-slate-800 mb-6">Edit Partner</h2>

    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="space-y-4">
            <div>
                <label class="block font-bold text-slate-700">Nama Partner</label>
                <input type="text" name="name" value="{{ $partner->name }}" class="w-full p-3 border rounded-xl" required>
            </div>

            <div>
                <label class="block font-bold text-slate-700">Logo Baru (Opsional)</label>
                <img src="{{ asset('storage/'.$partner->logo) }}" class="w-20 h-20 mb-2 rounded-lg">
                <input type="file" name="logo" class="w-full p-3 border rounded-xl">
            </div>

            <div>
                <label class="block font-bold text-slate-700">Jenis</label>
                <select name="type" class="w-full p-3 border rounded-xl">
                    <option value="Sponsor" {{ $partner->type == 'Sponsor' ? 'selected' : '' }}>Sponsor</option>
                    <option value="Media Partner" {{ $partner->type == 'Media Partner' ? 'selected' : '' }}>Media Partner</option>
                </select>
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold">Update Partner</button>
        </div>
    </form>
</div>
@endsection