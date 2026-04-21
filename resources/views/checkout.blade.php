@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<main class="max-w-3xl mx-auto px-6 py-20">

    <!-- Header -->
    <div class="mb-12">
        <a href="/event-detail" class="text-indigo-600 font-semibold flex items-center gap-2 mb-6 hover:underline">
            ← Kembali ke Event
        </a>

        <h1 class="text-4xl font-extrabold">Checkout</h1>
        <p class="text-slate-500 mt-2">Lengkapi data Anda untuk mendapatkan tiket.</p>
    </div>

    <div class="grid grid-cols-1 gap-8">

        <!-- SUMMARY -->
        <div class="bg-white rounded-3xl border p-8 shadow-sm">

            <h3 class="text-xl font-bold mb-6 border-b pb-4 flex items-center gap-2">

                <!-- ICON SUMMARY (upgrade) -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-indigo-600"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 7l-7 7-7-7m14 6l-7 7-7-7"/>
                </svg>

                Pesanan Anda
            </h3>

            <div class="flex gap-6 items-center">
                <img src="{{ asset('assets/concert.png') }}"
                    class="w-24 h-24 rounded-2xl object-cover shadow">

                <div>
                    <h4 class="font-bold text-lg text-slate-800">Jazz Night 2024</h4>

                    <p class="flex items-center gap-2 text-sm text-slate-500 mt-1">

                        <!-- CALENDAR ICON -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10m-12 8h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>

                        16 Nov 2024
                    </p>

                    <p class="text-indigo-600 font-bold mt-2">
                        1 x Rp 150.000
                    </p>
                </div>
            </div>

            <!-- PRICE DETAIL -->
            <div class="mt-8 border-t pt-5 space-y-2">

                <div class="flex justify-between text-slate-500">
                    <span>Harga Tiket</span>
                    <span>Rp 150.000</span>
                </div>

                <div class="flex justify-between text-slate-500">
                    <span>Biaya Layanan</span>
                    <span>Rp 5.000</span>
                </div>

                <div class="flex justify-between text-2xl font-extrabold mt-4">
                    <span>Total</span>
                    <span class="text-indigo-600">Rp 155.000</span>
                </div>

            </div>

        </div>

        <!-- FORM -->
        <div class="bg-white rounded-3xl border p-8 shadow-sm">

            <h3 class="text-xl font-bold mb-6 text-indigo-600 flex items-center gap-2">

                <!-- USER ICON -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20 21a8 8 0 10-16 0m16 0H4m8-9a4 4 0 100-8 4 4 0 000 8z"/>
                </svg>

                Data Pemesan
            </h3>

            <form class="space-y-5">

                <input type="text" placeholder="Nama Lengkap"
                    class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none" required>

                <input type="email" placeholder="Email"
                    class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none" required>

                <input type="tel" placeholder="No WhatsApp"
                    class="w-full px-4 py-3 border rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none" required>

                <!-- SECURITY INFO -->
                <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 text-sm text-indigo-700 flex gap-3">

                    <!-- LOCK ICON -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 mt-1"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 11V7a4 4 0 00-8 0v4M5 11h14v8H5v-8z"/>
                    </svg>

                    <span>
                        Data Anda aman dan hanya digunakan untuk keperluan pemesanan tiket.
                    </span>
                </div>

                <button type="button" onclick="showMidtrans()"
                    class="w-full py-4 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition">
                    Bayar Sekarang
                </button>

            </form>

        </div>

    </div>

</main>

<!-- MIDTRANS MODAL -->
<div id="midtrans-overlay"
    class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="bg-white p-8 rounded-2xl shadow-xl w-[380px]">

        <h2 class="text-2xl font-bold mb-4 text-center">Pilih Metode Pembayaran</h2>

        <!-- TOTAL -->
        <div class="text-center mb-6">
            <p class="text-slate-500 text-sm">Total Pembayaran</p>
            <p class="text-3xl font-extrabold text-indigo-600">Rp 155.000</p>
        </div>

        <!-- PAYMENT OPTIONS -->
        <div class="space-y-3">

            <!-- BANK -->
            <label class="flex items-center gap-3 border rounded-xl p-3 cursor-pointer hover:border-indigo-500">
                <input type="radio" name="payment" class="accent-indigo-600" checked>

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-indigo-600"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 9l9-6 9 6M4 10h16M6 10v10m4-10v10m4-10v10m4-10v10M4 20h16"/>
                </svg>

                <span class="font-medium">Transfer Bank</span>
            </label>

            <!-- E-WALLET -->
            <label class="flex items-center gap-3 border rounded-xl p-3 cursor-pointer hover:border-indigo-500">
                <input type="radio" name="payment" class="accent-indigo-600">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-indigo-600"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20 12H4m16 0a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2h12a2 2 0 002-2v-6z"/>
                </svg>

                <span class="font-medium">E-Wallet (OVO / Dana / GoPay)</span>
            </label>

            <!-- QRIS -->
            <label class="flex items-center gap-3 border rounded-xl p-3 cursor-pointer hover:border-indigo-500">
                <input type="radio" name="payment" class="accent-indigo-600">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 text-indigo-600"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z"/>
                </svg>

                <span class="font-medium">QRIS</span>
            </label>

        </div>

        <button onclick="window.location.href='/ticket'"
            class="mt-6 w-full py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">
            Bayar Sekarang
        </button>

        <button onclick="hideMidtrans()"
            class="block mt-3 text-sm text-slate-400 hover:text-slate-600 w-full text-center">
            Batal
        </button>

    </div>

</div>

<!-- SCRIPT -->
<script>
function showMidtrans() {
    document.getElementById('midtrans-overlay').classList.remove('hidden');
    document.getElementById('midtrans-overlay').classList.add('flex');
}

function hideMidtrans() {
    document.getElementById('midtrans-overlay').classList.add('hidden');
    document.getElementById('midtrans-overlay').classList.remove('flex');
}
</script>

@endsection