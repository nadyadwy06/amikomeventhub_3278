@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')
<div class="w-full bg-gray-100 p-10 flex justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">

        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">
            FAQ (Bantuan)
        </h1>

        <div class="space-y-4 text-sm">

            <div>
                <p class="font-semibold text-indigo-600">
                    Apa itu AmikomEventHub?
                </p>
                <p class="text-gray-500">
                    Platform informasi event kampus.
                </p>
            </div>

            <div>
                <p class="font-semibold text-indigo-600">
                    Bagaimana cara daftar?
                </p>
                <p class="text-gray-500">
                    Klik event lalu daftar.
                </p>
            </div>

            <div>
                <p class="font-semibold text-indigo-600">
                    Apakah gratis?
                </p>
                <p class="text-gray-500">
                    Beberapa gratis, beberapa berbayar.
                </p>
            </div>

        </div>

        <a href="{{ route('home') }}" 
           class="block mt-6 text-center bg-indigo-500 text-white py-2 rounded hover:bg-indigo-600 transition">
            Kembali ke Home
        </a>

    </div>

</div>
@endsection