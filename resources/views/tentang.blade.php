@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-20 text-center">
    <h1 class="text-4xl font-extrabold text-slate-900 mb-6">Tentang AmikomEventHub</h1>
    <p class="text-lg text-slate-600 leading-relaxed">
        Selamat datang di AmikomEventHub! Kami adalah platform yang dirancang khusus untuk mempermudah 
        mahasiswa dan civitas akademika dalam mencari, mengelola, dan memesan tiket untuk berbagai 
        event kampus seperti seminar, workshop, konser, dan kompetisi teknologi.
    </p>
    <div class="mt-10">
        <a href="{{ route('home') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection