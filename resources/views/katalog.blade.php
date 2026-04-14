@extends('layouts.app')

@section('title', 'Katalog Event')

@section('content')
<div class="w-full bg-gray-100 p-10">

    <h1 class="text-3xl font-bold text-center mb-8 text-gray-800">
        Katalog Event AmikomEventHub
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">

        <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg border transition">
            <h2 class="font-semibold text-indigo-600">Workshop Web</h2>
            <p class="text-gray-500">Belajar Laravel Dasar</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg border transition">
            <h2 class="font-semibold text-indigo-600">Seminar IT</h2>
            <p class="text-gray-500">AI dan Masa Depan</p>
        </div>

        <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg border transition">
            <h2 class="font-semibold text-indigo-600">Lomba Coding</h2>
            <p class="text-gray-500">Hackathon Mahasiswa</p>
        </div>

    </div>

    <div class="text-center mt-10">
        <a href="{{ route('home') }}" 
           class="inline-block bg-indigo-500 text-white px-6 py-2 rounded hover:bg-indigo-600 transition">
            Kembali ke Home
        </a>
    </div>

</div>
@endsection