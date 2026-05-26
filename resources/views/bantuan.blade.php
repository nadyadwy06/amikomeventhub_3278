@extends('layouts.app')

@section('title', 'Bantuan')

@section('content')
<div class="w-full bg-slate-50/50 py-16 px-4 md:px-8 flex justify-center items-center min-h-[60vh]">

    <div class="w-full max-w-4xl">
        <div class="text-center mb-12">
            <span class="text-xs font-bold text-indigo-600 tracking-widest uppercase bg-indigo-50 px-3 py-1.5 rounded-full">
                Pusat Bantuan
            </span>
            <h1 class="text-3xl md:text-4xl font-extrabold mt-3 tracking-tight text-slate-900">
                Ada yang Bisa Kami Bantu?
            </h1>
            <p class="text-slate-500 mt-2 text-sm md:text-base">
                Temukan jawaban cepat seputar pertanyaan yang sering diajukan di AmikomEventHub.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 items-start">
            
            <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 p-6 rounded-2xl text-white shadow-xl shadow-indigo-100 md:col-span-1">
                <h3 class="font-bold text-lg mb-2">Butuh Bantuan Lain?</h3>
                <p class="text-xs text-indigo-100/90 leading-relaxed mb-6">
                    Jika pertanyaan Anda tidak ada di daftar FAQ, tim support kami siap melayani Anda.
                </p>
                <div class="space-y-3">
                    <a href="{{ route('kontak') }}" class="flex items-center justify-center gap-2 bg-white text-indigo-700 font-semibold text-xs py-2.5 px-4 rounded-xl hover:bg-indigo-50 transition w-full shadow-sm">
                        💬 Hubungi Kontak
                    </a>
                </div>
            </div>

            <div class="space-y-4 md:col-span-2">
                
                <details class="group bg-white border border-slate-200 p-5 rounded-2xl shadow-sm transition [&_summary::-webkit-details-marker]:hidden" open>
                    <summary class="flex items-center justify-between cursor-pointer focus:outline-none">
                        <div class="flex items-center gap-3">
                            <span class="flex-shrink-0 w-7 h-7 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center font-bold text-xs">Q</span>
                            <h2 class="text-sm font-semibold text-slate-800 tracking-tight group-open:text-indigo-600 transition">
                                Apa itu AmikomEventHub?
                            </h2>
                        </div>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-slate-100 p-1.5 text-slate-500 transition group-open:-rotate-180">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="mt-4 leading-relaxed text-xs text-slate-500 border-t border-slate-100 pt-4 flex gap-3">
                        <span class="flex-shrink-0 w-7 h-7 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center font-bold text-xs">A</span>
                        <p class="pt-1">
                            AmikomEventHub adalah platform pusat informasi dan manajemen event khusus kampus yang mewadahi berbagai kegiatan seperti konser, seminar, workshop, hingga kompetisi teknologi.
                        </p>
                    </div>
                </details>

                <details class="group bg-white border border-slate-200 p-5 rounded-2xl shadow-sm transition [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer focus:outline-none">
                        <div class="flex items-center gap-3">
                            <span class="flex-shrink-0 w-7 h-7 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center font-bold text-xs">Q</span>
                            <h2 class="text-sm font-semibold text-slate-800 tracking-tight group-open:text-indigo-600 transition">
                                Bagaimana cara mendaftar event?
                            </h2>
                        </div>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-slate-100 p-1.5 text-slate-500 transition group-open:-rotate-180">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="mt-4 leading-relaxed text-xs text-slate-500 border-t border-slate-100 pt-4 flex gap-3">
                        <span class="flex-shrink-0 w-7 h-7 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center font-bold text-xs">A</span>
                        <div class="pt-1 flex-grow">
                            <p class="mb-2 font-medium text-slate-700">Berikut adalah langkah-langkah untuk mendaftar atau mengikuti event yang ada di AmikomEventHub:</p>
                            <ol class="list-decimal pl-4 space-y-1.5 text-slate-500">
                                <li>Masuk ke menu Katalog atau Jelajahi pada navigasi bagian atas untuk melihat seluruh daftar kegiatan yang tersedia.</li>
                                <li>Klik pada salah satu poster atau judul kegiatan yang ingin kamu ikuti.</li>
                                <li>Klik tombol pendaftaran atau tombol beli tiket yang tertera pada kegiatan tersebut.</li>
                                <li>Isi formulir data peserta yang diminta (seperti nama lengkap, email, dan NIM) dengan benar.</li>
                                <li>Lakukan proses konfirmasi atau selesaikan pembayaran apabila event tersebut berbayar, kemudian tunggu hingga tiket digital atau bukti pendaftaran kamu diterbitkan oleh sistem.</li>
                            </ol>
                        </div>
                    </div>
                </details>

                <details class="group bg-white border border-slate-200 p-5 rounded-2xl shadow-sm transition [&_summary::-webkit-details-marker]:hidden">
                    <summary class="flex items-center justify-between cursor-pointer focus:outline-none">
                        <div class="flex items-center gap-3">
                            <span class="flex-shrink-0 w-7 h-7 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center font-bold text-xs">Q</span>
                            <h2 class="text-sm font-semibold text-slate-800 tracking-tight group-open:text-indigo-600 transition">
                                Apakah semua event di platform ini berbayar?
                            </h2>
                        </div>
                        <span class="ml-1.5 flex-shrink-0 rounded-full bg-slate-100 p-1.5 text-slate-500 transition group-open:-rotate-180">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </summary>
                    <div class="mt-4 leading-relaxed text-xs text-slate-500 border-t border-slate-100 pt-4 flex gap-3">
                        <span class="flex-shrink-0 w-7 h-7 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center font-bold text-xs">A</span>
                        <p class="pt-1">
                            Tidak. Platform kami menyediakan variasi jenis event. Beberapa event kampus dapat diikuti secara gratis tanpa dipungut biaya, sedangkan untuk event eksternal berskala besar biasanya dikenakan tiket masuk berbayar.
                        </p>
                    </div>
                </details>

            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('home') }}" 
               class="inline-flex items-center gap-2 text-xs font-semibold text-slate-500 hover:text-indigo-600 bg-white border border-slate-200 hover:border-indigo-100 py-3 px-6 rounded-xl shadow-sm transition duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda Utama
            </a>
        </div>

    </div>

</div>
@endsection