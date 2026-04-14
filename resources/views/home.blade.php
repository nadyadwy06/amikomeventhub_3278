@extends('layouts.app')

@section('content')
<div class="bg-gray-100 p-10 w-full text-center">
    <div class="bg-white p-8 rounded-xl shadow max-w-md mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Selamat Datang</h2>

        <p class="text-gray-600 mb-6">
            Jelajahi berbagai event menarik di AmikomEventHub 🚀
        </p>

        <div class="grid grid-cols-2 gap-3">
            <a href="{{ route('profil') }}" class="bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600">Profil</a>
            <a href="{{ route('katalog') }}" class="bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600">Katalog</a>
            <a href="{{ route('bantuan') }}" class="bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600">Bantuan</a>
            <a href="{{ route('kontak') }}" class="bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600">Kontak</a>
        </div>
    </div>
</div>
@endsection