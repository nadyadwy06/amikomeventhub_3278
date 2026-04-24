@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
<div class="w-full bg-gray-100 p-10 flex justify-center">

    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md text-center">

        <h1 class="text-2xl font-bold mb-4 text-gray-800">
            Hubungi Kami
        </h1>

        <p class="text-gray-600 mb-6">
            Email: nadyadwy@students.amikom.ac.id
        </p>

        <a href="{{ route('home') }}" 
           class="inline-block bg-indigo-500 text-white px-5 py-2 rounded hover:bg-indigo-600 transition">
            Kembali ke Home
        </a>

    </div>

</div>
@endsection