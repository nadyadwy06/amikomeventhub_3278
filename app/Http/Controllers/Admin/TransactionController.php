<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Menampilkan semua transaksi
     */
    public function index(Request $request)
    {
        $query = Transaction::query();

        // SEARCH
        if ($request->search) {
            $query->where('customer_name', 'like', '%' . $request->search . '%')
                  ->orWhere('order_id', 'like', '%' . $request->search . '%');
        }

        // FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $transactions = $query->latest()->get();

        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Form tambah transaksi
     */
    public function create()
    {
        return view('admin.transactions.create');
    }

    /**
     * Simpan transaksi
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name'  => 'required',
            'customer_email' => 'required|email',
            'customer_phone' => 'required',
            'total_price'    => 'required|numeric',
            'status'         => 'required',
        ]);

        Transaction::create([

            'event_id' => 1,

            'order_id' => 'ORD-' . rand(1000,9999),

            'customer_name' => $request->customer_name,

            'customer_email' => $request->customer_email,

            'customer_phone' => $request->customer_phone,

            'total_price' => $request->total_price,

            'status' => $request->status,

            'snap_token' => '-',
        ]);

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Form edit transaksi
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('admin.transactions.edit', compact('transaction'));
    }

    /**
     * Update transaksi
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update([

            'customer_name' => $request->customer_name,

            'customer_email' => $request->customer_email,

            'customer_phone' => $request->customer_phone,

            'total_price' => $request->total_price,

            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil diupdate');
    }

    /**
     * Hapus transaksi
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->delete();

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}