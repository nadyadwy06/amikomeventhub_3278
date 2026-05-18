<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;

class TransactionController extends Controller
{
    /**
     * Menampilkan semua transaksi
     */
    public function index(Request $request)
    {
        $query = Transaction::with('event');

        // SEARCH
        if ($request->filled('search')) {
            $query->where('customer_name', 'like', '%' . $request->search . '%')
                  ->orWhere('order_id', 'like', '%' . $request->search . '%');
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $transactions = Transaction::with('event')->latest()->get();

        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Form tambah transaksi
     */
    public function create()
    {
        $events = Event::all();

        return view('admin.transactions.create', compact('events'));
    }

    /**
     * Simpan transaksi
     */
   public function store(Request $request)
{
    $request->validate([
        'event_id'       => 'required|exists:events,id',
        'customer_name'  => 'required',
        'customer_email' => 'required|email',
        'customer_phone' => 'required',
        'total_price'    => 'required|numeric',
        'status'         => 'required',
        
    ]);

    $event = Event::findOrFail($request->event_id);
    // tabel events sudah ada data dengan ID = 1
   Transaction::create([
        'event_id' => $request->event_id,
        'order_id' => uniqid(),
        'customer_name' => $request->customer_name,
        'customer_email' => $request->customer_email,
        'customer_phone' => $request->customer_phone,
        'total_price' => $request->total_price,
        'status' => $request->status ?? 'Pending',
        'snap_token' => null,
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

         $events = Event::all();

        return view('admin.transactions.edit', compact('transaction', 'events'));
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