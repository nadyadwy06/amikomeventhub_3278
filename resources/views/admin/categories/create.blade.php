@extends('layouts.admin')

@section('title', 'Tambah Transaksi')

@section('content')

<div class="max-w-3xl">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-slate-800">
            Tambah Transaksi
        </h1>

        <p class="text-slate-500 mt-1">
            Tambahkan transaksi baru
        </p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <form action="{{ route('admin.transactions.store') }}"
              method="POST"
              class="space-y-6">

            @csrf

            <!-- NAMA -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nama Customer
                </label>

                <input type="text"
                       name="customer_name"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200"
                       required>
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Email Customer
                </label>

                <input type="email"
                       name="customer_email"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200"
                       required>
            </div>

            <!-- PHONE -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Nomor HP
                </label>

                <input type="text"
                       name="customer_phone"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200"
                       required>
            </div>

            <!-- TOTAL -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Total Harga
                </label>

                <input type="number"
                       name="total_price"
                       class="w-full px-4 py-3 rounded-xl border border-slate-200"
                       required>
            </div>

            <!-- STATUS -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Status
                </label>

                <select name="status"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200">

                    <option value="Success">Success</option>
                    <option value="Pending">Pending</option>

                </select>
            </div>

            <div class="flex justify-end gap-3">

                <a href="{{ route('admin.transactions.index') }}"
                   class="px-5 py-3 rounded-xl text-slate-500 font-semibold hover:bg-slate-100 transition">

                    Batal

                </a>

                <button type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection