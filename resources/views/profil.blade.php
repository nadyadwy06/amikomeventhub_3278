@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="w-full flex justify-center items-center bg-gray-100 p-10">

    <div class="bg-white p-8 rounded-2xl shadow-lg text-center w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">
            Profil Praktikan
        </h1>
        
        <div class="space-y-2 text-gray-600">
            <p><span class="font-semibold">Nama:</span> Nadya Dwy Wahyuningrum</p>
            <p><span class="font-semibold">NIM:</span> 24.12.3278</p>
            <p><span class="font-semibold">Prodi:</span> S1 Sistem Informasi</p>
        </div>

        <a href="{{ route('home') }}" 
           class="inline-block mt-6 bg-indigo-500 text-white px-5 py-2 rounded-lg hover:bg-indigo-600 transition">
            Kembali ke Home
        </a>
    </div>

</div>
@endsection