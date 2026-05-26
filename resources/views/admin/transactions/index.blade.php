    @extends('layouts.admin')

    @section('title', 'Laporan Transaksi')

    @section('content')

    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <p class="text-sm text-slate-500">Kelola semua transaksi event</p>
        </div>

        <div class="flex w-full md:w-auto gap-3">
            
            <form action="{{ route('admin.transactions.index') }}" method="GET" class="flex flex-1 gap-2">
                <input type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Cari transaksi..." 
                    class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
                
                <button type="submit" 
                        class="px-5 py-2.5 bg-slate-600 text-white rounded-xl hover:bg-slate-700 transition text-sm font-semibold whitespace-nowrap">
                    Cari
                </button>
            </form>

            <a href="{{ route('admin.transactions.create') }}"
            class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition whitespace-nowrap">
                Tambah Transaksi
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 text-slate-500 uppercase text-xs font-semibold">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Pembeli</th>
                        <th class="px-6 py-3 text-left">Event</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Total</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>

                        <td class="px-6 py-4">
                            <p class="font-semibold">{{ $transaction->customer_name }}</p>
                            <p class="text-xs text-slate-400">{{ $transaction->customer_email }}</p>
                        </td>

                        <td class="px-6 py-4">
                            {{ $transaction->event->title ?? 'Tidak ada event' }}
                        </td>

                        <td class="px-6 py-4">
                            @if(strtolower($transaction->status) == 'success')
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">Success</span>
                            @elseif(strtolower($transaction->status) == 'pending')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">Pending</span>
                            @else
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold">{{ $transaction->status }}</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('admin.transactions.edit', $transaction->id) }}" 
                                class="p-2 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>

                                <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 bg-rose-50 text-rose-600 rounded-lg hover:bg-rose-600 hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-slate-400">Belum ada transaksi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-3 text-sm text-slate-500 bg-slate-50">
            Menampilkan {{ $transactions->count() }} data transaksi
        </div>
    </div>

    @endsection