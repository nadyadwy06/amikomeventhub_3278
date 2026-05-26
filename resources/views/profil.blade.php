@extends('layouts.app')

@section('title', 'Profil Praktikan')

@section('content')
<div class="max-w-md mx-auto px-6 py-20">
    
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 text-center">
        
        <div class="w-24 h-24 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 text-3xl font-bold border-4 border-white shadow-md">
            {{ substr('Nadya Dwy Wahyuningrum', 0, 1) }}
        </div>

        <h1 class="text-2xl font-bold text-slate-900 mb-1">Profil</h1>
        <p class="text-slate-500 mb-8">Informasi data diri</p>

        <div class="space-y-4 text-left">
            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">Nama Lengkap</p>
                <p class="font-semibold text-slate-800">Nadya Dwy Wahyuningrum</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">NIM</p>
                    <p class="font-semibold text-slate-800">24.12.3278</p>
                </div>
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">Prodi</p>
                    <p class="font-semibold text-slate-800">S1 Sistem Informasi</p>
                </div>
            </div>
        </div>

        <a href="{{ route('home') }}" 
           class="block mt-8 w-full bg-slate-900 text-white py-3 rounded-xl font-bold hover:bg-indigo-600 transition shadow-lg shadow-indigo-100">
            Kembali ke Beranda
        </a>
    </div>

</div>
@endsection