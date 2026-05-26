@extends('layouts.admin')

@section('title', 'Tambah Partner')

@section('content')
<div class="max-w-2xl">

    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
            <div>
                <label class="block font-bold text-slate-700">Nama Partner</label>
                <input type="text" name="name" class="w-full p-3 border rounded-xl" required>
            </div>
            
            <div>
                <label class="block font-bold text-slate-700">Logo</label>
                <input type="file" name="logo" class="w-full p-3 border rounded-xl" required>
            </div>

            <div>
                <label class="block font-bold text-slate-700">Jenis (Type)</label>
                <select name="type" class="w-full p-3 border rounded-xl">
                    <option value="Sponsor">Sponsor</option>
                    <option value="Media Partner">Media Partner</option>
                </select>
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-bold">Simpan Partner</button>
        </div>
    </form>
</div>
@endsection