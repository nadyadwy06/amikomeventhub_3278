@extends('layouts.app')

@section('title', 'Kategori Event')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 min-h-[70vh]">
    
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
            Katalog & <span class="text-indigo-600">Kategori Event</span>
        </h1>
        <p class="mt-4 text-base text-slate-500 max-w-2xl mx-auto">
            Temukan berbagai macam event menarik atau pilih berdasarkan kategori seminar teknologi, workshop kreatif, hingga konser musik seru di bawah ini.
        </p>
    </div>

    <div class="flex flex-wrap justify-center items-center gap-3 mb-12 border-b border-slate-200 pb-6">
        <button class="px-5 py-2 text-xs font-semibold bg-indigo-600 text-white rounded-full shadow-md transition">
            📂 Semua Event
        </button>
        <button class="px-5 py-2 text-xs font-semibold bg-white text-slate-600 border border-slate-200 rounded-full hover:border-indigo-200 hover:text-indigo-600 transition">
            🎤 Konser Musik
        </button>
        <button class="px-5 py-2 text-xs font-semibold bg-white text-slate-600 border border-slate-200 rounded-full hover:border-indigo-200 hover:text-indigo-600 transition">
            💻 Seminar Teknologi
        </button>
        <button class="px-5 py-2 text-xs font-semibold bg-white text-slate-600 border border-slate-200 rounded-full hover:border-indigo-200 hover:text-indigo-600 transition">
            🛠️ Workshop Kreatif
        </button>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-100 hover:shadow-xl transition flex flex-col">
            <div class="h-48 bg-indigo-50 flex items-center justify-center text-3xl">💻</div>
            <div class="p-6 flex-grow">
                <span class="text-xs font-semibold px-2.5 py-1 bg-indigo-50 text-indigo-600 rounded-full">Seminar</span>
                <h3 class="font-bold text-lg mt-3 text-slate-900">Tech Conference 2026</h3>
                <p class="text-slate-500 text-xs mt-2">Belajar tren teknologi masa depan dari para expert.</p>
            </div>
            <div class="p-6 border-t border-slate-50 flex justify-between items-center">
                <span class="font-bold text-sm text-indigo-600">Gratis</span>
                <a href="#" class="text-xs font-semibold bg-slate-900 text-white px-4 py-2 rounded-xl hover:bg-indigo-600 transition">Detail</a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-100 hover:shadow-xl transition flex flex-col">
            <div class="h-48 bg-purple-50 flex items-center justify-center text-3xl">🎤</div>
            <div class="p-6 flex-grow">
                <span class="text-xs font-semibold px-2.5 py-1 bg-purple-50 text-purple-600 rounded-full">Konser</span>
                <h3 class="font-bold text-lg mt-3 text-slate-900">Jazz Night Amikom</h3>
                <p class="text-slate-500 text-xs mt-2">Malam syahdu penuh simfoni melodi jazz.</p>
            </div>
            <div class="p-6 border-t border-slate-50 flex justify-between items-center">
                <span class="font-bold text-sm text-purple-600">Rp 50.000</span>
                <a href="#" class="text-xs font-semibold bg-slate-900 text-white px-4 py-2 rounded-xl hover:bg-purple-600 transition">Detail</a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-100 hover:shadow-xl transition flex flex-col">
            <div class="h-48 bg-emerald-50 flex items-center justify-center text-3xl">🛠️</div>
            <div class="p-6 flex-grow">
                <span class="text-xs font-semibold px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full">Workshop</span>
                <h3 class="font-bold text-lg mt-3 text-slate-900">UI/UX Masterclass</h3>
                <p class="text-slate-500 text-xs mt-2">Praktik membuat prototype aplikasi modern.</p>
            </div>
            <div class="p-6 border-t border-slate-50 flex justify-between items-center">
                <span class="font-bold text-sm text-emerald-600">Rp 25.000</span>
                <a href="#" class="text-xs font-semibold bg-slate-900 text-white px-4 py-2 rounded-xl hover:bg-emerald-600 transition">Detail</a>
            </div>
        </div>
    </div>
</div>
@endsection