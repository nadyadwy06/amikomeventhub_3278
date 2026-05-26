@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-20">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Hubungi Kami</h1>
        <p class="mt-4 text-lg text-slate-500">Punya pertanyaan atau butuh bantuan? Kami siap membantu Anda.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-10">
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <h2 class="text-xl font-bold text-slate-900 mb-2">Email Support</h2>
            <p class="text-slate-500 mb-6">Kirimkan email untuk pertanyaan seputar tiket atau event.</p>
            <a href="mailto:nadyadwy@students.amikom.ac.id" class="text-indigo-600 font-semibold hover:underline">nadyadwy@students.amikom.ac.id</a>
        </div>

        <div class="bg-indigo-600 p-8 rounded-3xl shadow-xl shadow-indigo-200 flex flex-col justify-center items-center text-center text-white">
            <h2 class="text-2xl font-bold mb-4">Kembali Menjelajah</h2>
            <p class="text-indigo-100 mb-8 px-4">Temukan event seru lainnya yang sedang berlangsung di AmikomEventHub.</p>
            <a href="{{ route('home') }}" class="bg-white text-indigo-600 px-8 py-3 rounded-xl font-bold hover:bg-indigo-50 transition shadow-lg">
                Jelajahi Event
            </a>
        </div>
    </div>
</div>
@endsection