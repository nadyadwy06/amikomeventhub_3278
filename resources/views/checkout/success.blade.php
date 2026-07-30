@extends('layouts.app')

@section('title', 'Pembayaran Berhasil')

@section('content')
<main class="max-w-3xl mx-auto px-4 sm:px-6 py-10 md:py-16">

    {{-- Alert Flash Message --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-medium flex items-center gap-3 shadow-sm">
            <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl text-sm font-medium flex items-center gap-3 shadow-sm">
            <div class="w-8 h-8 rounded-xl bg-rose-500 text-white flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- Status Pembayaran Card --}}
    <div class="bg-white rounded-3xl border border-slate-100 p-8 md:p-12 shadow-xl shadow-slate-100 text-center relative overflow-hidden">
        
        {{-- Background Glow Aesthetic --}}
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

        {{-- Hero Logo Status --}}
        <div class="relative z-10">
            <div class="w-20 h-20 bg-gradient-to-tr from-emerald-500 to-teal-400 text-white rounded-2xl shadow-lg shadow-emerald-500/30 flex items-center justify-center mx-auto mb-6 transform hover:scale-105 transition duration-300">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight mb-2">Terima Kasih!</h2>
            <p class="text-slate-500 mb-8 leading-relaxed text-sm md:text-base max-w-lg mx-auto">
                Pesanan <span class="inline-block px-2.5 py-0.5 bg-slate-100 text-slate-800 font-mono text-xs rounded-md font-semibold border border-slate-200">#{{ $transaction->order_id }}</span> telah berhasil terverifikasi. Detail e-ticket telah didaftarkan atas nama <strong class="text-slate-700">{{ $transaction->customer_name }}</strong>.
            </p>

            {{-- Ringkasan Acara (Tampilan E-Ticket) --}}
            @if($transaction->event)
                <div class="bg-gradient-to-br from-slate-50 to-slate-100/70 rounded-2xl p-5 text-left border border-slate-200/80 mb-8 relative">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-xl bg-slate-200 overflow-hidden flex-shrink-0 shadow-inner border border-white">
                            @if($transaction->event->poster_path)
                                <img src="{{ asset('storage/' . $transaction->event->poster_path) }}" alt="{{ $transaction->event->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center font-black text-slate-400 text-xs bg-slate-200">EVENT</div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="inline-block px-2 py-0.5 bg-indigo-100 text-indigo-700 font-bold text-[10px] rounded uppercase tracking-wider mb-1">Tiket Terkonfirmasi</span>
                            <h4 class="font-bold text-slate-900 text-base md:text-lg truncate">{{ $transaction->event->title }}</h4>
                            <div class="flex flex-wrap items-center gap-y-1 gap-x-4 text-xs text-slate-500 mt-1">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ \Carbon\Carbon::parse($transaction->event->date)->format('d M Y') }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    {{ $transaction->event->location }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-600/25 active:scale-95 transition-all duration-200">
                <span>Kembali ke Beranda</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>

    {{-- SECTION FORM ULASAN & RATING (SOAL 1 POIN 2) --}}
    @if($transaction->event)
        @php
            $eventDate = \Carbon\Carbon::parse($transaction->event->date);
            $canReview = now()->greaterThanOrEqualTo($eventDate->addDay());
        @endphp

        <div class="mt-8 bg-white rounded-3xl border border-slate-100 p-8 shadow-xl shadow-slate-100">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-2 h-6 bg-indigo-600 rounded-full"></div>
                <h3 class="text-xl font-extrabold text-slate-900">Ulasan & Penilaian Acara</h3>
            </div>
            
            @if($canReview)
                <p class="text-slate-500 text-sm mb-6 pl-5">Bagikan ulasan Anda selama mengikuti acara ini untuk membantu calon pengunjung lainnya.</p>

                <form action="{{ route('reviews.store', $transaction->event->id) }}" method="POST" class="space-y-6 text-left">
                    @csrf

                    {{-- Pilihan Bintang --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Rating Acara</label>
                        <select name="rating" class="w-full p-4 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 font-semibold text-slate-700 bg-slate-50/50 hover:bg-white transition">
                            <option value="5">★★★★★ (5/5) — Sangat Memuaskan</option>
                            <option value="4">★★★★☆ (4/5) — Bagus</option>
                            <option value="3">★★★☆☆ (3/5) — Cukup</option>
                            <option value="2">★★☆☆☆ (2/5) — Kurang</option>
                            <option value="1">★☆☆☆☆ (1/5) — Sangat Buruk</option>
                        </select>
                    </div>

                    {{-- Textarea Komentar --}}
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Ulasan Anda</label>
                        <textarea name="review" rows="4" 
                            class="w-full p-4 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm text-slate-700 bg-slate-50/50 hover:bg-white transition placeholder:text-slate-400" 
                            placeholder="Tuliskan impresi, suasana acara, hingga saran pengembangan untuk penyelenggara..." required></textarea>
                    </div>

                    <button type="submit" class="w-full md:w-auto px-8 py-3.5 bg-slate-900 text-white font-bold rounded-xl hover:bg-slate-800 shadow-md active:scale-95 transition">
                        Kirim Ulasan Resmi
                    </button>
                </form>
            @else
                <div class="mt-4 p-4 bg-amber-50/80 border border-amber-200 text-amber-900 rounded-2xl text-sm flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span>Form ulasan terbuka otomatis <strong>1 hari setelah acara selesai</strong> (Mulai {{ $eventDate->addDay()->format('d M Y') }}).</span>
                </div>
            @endif
        </div>
    @endif

</main>
@endsection
