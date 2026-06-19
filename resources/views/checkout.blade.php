@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
        <main class="max-w-3xl mx-auto px-6 py-20">
        <div class="mb-12">
            <a href="{{ route('events.show', $event->id) }}" class="text-indigo-600 font-semibold flex items-center gap-2 mb-6 hover:underline">
                ← Kembali ke Event
            </a>
            <h1 class="text-4xl font-extrabold">Checkout</h1>
        </div>

        <div class="space-y-6">
            
            <div class="bg-white rounded-3xl border p-8 shadow-sm">
                <h3 class="text-xl font-bold mb-6 border-b pb-4">Pesanan Anda</h3>
                
                <div class="flex gap-6 items-center">
                    <img src="{{ asset('storage/' . $event->poster_path) }}" class="w-24 h-24 rounded-2xl object-cover shadow">
                    <div>
                        <h4 class="font-bold text-lg">{{ $event->title }}</h4>
                        <p class="text-slate-500 text-sm">{{ $event->date }} • {{ $event->location }}</p> 
                        <p class="text-indigo-600 font-bold mt-2">1 x Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="mt-8 pt-5 border-t space-y-2">
                    <div class="flex justify-between text-slate-600">
                        <span>Harga Tiket</span>
                        <span>Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span>Biaya Layanan</span>
                        <span>Rp 5.000</span>
                    </div>
                </div>

                <div class="mt-4 pt-5 border-t">
                    <div class="flex justify-between text-2xl font-extrabold">
                        <span>Total Bayar</span>
                        <span id="checkout-total" class="text-indigo-600">Rp {{ number_format($event->price + 5000, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border p-8 shadow-sm">
                <h3 class="text-xl font-bold mb-6 text-indigo-600">Data Pemesan</h3>
                
                <form action="{{ route('admin.transactions.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="status" value="pending">

                    <input type="text" name="customer_name" placeholder="Nama Lengkap" class="w-full px-4 py-3 border rounded-xl" required>
                    <input type="email" name="customer_email" placeholder="Email" class="w-full px-4 py-3 border rounded-xl" required>
                    <input type="tel" name="customer_phone" placeholder="No WhatsApp" class="w-full px-4 py-3 border rounded-xl" required>
                    
                    <button type="submit" class="w-full py-4 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
                        Bayar Sekarang
                    </button>
                </form>
            </div>
        </div>
    </main>

    <div id="midtrans-overlay" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
        <div class="bg-white p-8 rounded-2xl shadow-xl w-[380px]">
            <h2 class="text-2xl font-bold mb-4 text-center">Pilih Metode Pembayaran</h2>

            <div class="text-center mb-6">
                <p class="text-slate-500 text-sm">Total Pembayaran</p>
                <p id="modal-total" class="text-3xl font-extrabold text-indigo-600">Rp 0</p>
            </div>

            <button onclick="window.location.href='/ticket'" class="mt-6 w-full py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
                Bayar Sekarang
            </button>
            <button onclick="hideMidtrans()" class="block mt-3 text-sm text-slate-400 hover:text-slate-600 w-full text-center">
                Batal
            </button>
        </div>
    </div>

    <script>
    function showMidtrans() {
        const totalElement = document.getElementById('checkout-total');
        if (totalElement) {
            document.getElementById('modal-total').innerText = totalElement.innerText.trim();
        }
        const overlay = document.getElementById('midtrans-overlay');
        overlay.classList.remove('hidden');
        overlay.classList.add('flex');
    }

    function hideMidtrans() {
        const overlay = document.getElementById('midtrans-overlay');
        overlay.classList.add('hidden');
        overlay.classList.remove('flex');
    }
    </script>

    @endsection