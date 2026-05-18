@extends('layouts.admin')

@section('title', 'Laporan Transaksi')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>
        <p class="text-sm text-slate-500">
            Kelola semua transaksi event
        </p>
    </div>

    <a href="{{ route('admin.transactions.create') }}"
       class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">

        Tambah Transaksi

    </a>

</div>

<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">

                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Pembeli</th>
                    <th class="px-6 py-3">Event</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Total</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($transactions as $transaction)

                <tr>

                    <!-- NO -->
                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>

                    <!-- CUSTOMER -->
                    <td class="px-6 py-4">
                        <div>
                            <p class="font-semibold">
                                {{ $transaction->customer_name }}
                            </p>

                            <p class="text-xs text-slate-400">
                                {{ $transaction->customer_email }}
                            </p>
                        </div>
                    </td>

                    <!-- EVENT (RELASI) -->
                    <td class="px-6 py-4">
                        {{ $transaction->event->title ?? 'Tidak ada event' }}
                    </td>

                    <!-- STATUS -->
                    <td class="px-6 py-4">
                        {{ $transaction->status }}
                    </td>

                    <!-- TOTAL -->
                    <td class="px-6 py-4">
                        Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                    </td>

                    <!-- ACTION -->
                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('admin.transactions.edit', $transaction->id) }}"
                               class="px-3 py-1 bg-indigo-500 text-white rounded">

                                Edit

                            </a>

                            <form action="{{ route('admin.transactions.destroy', $transaction->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-6 text-slate-400">

                        Belum ada transaksi

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection