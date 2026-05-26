<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index(Request $request)
    {
        $transactions = Transaction::with('event')
            ->when($request->search, function ($q) use ($request) {
                $q->where('customer_name', 'like', '%' . $request->search . '%')
                  ->orWhere('order_id', 'like', '%' . $request->search . '%');
            })
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->latest()
            ->get();

        return view('admin.transactions.index', compact('transactions'));

        {
        // Menghitung statistik
        $totalRevenue = Transaction::where('status', 'success')->sum('total_price');
        $ticketSold = Transaction::where('status', 'success')->count();
        $eventCount = Event::count();
        $pendingOrders = Transaction::where('status', 'pending')->count();

        // Mengambil 5 transaksi terakhir
        $transactions = Transaction::with('event')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalRevenue', 
            'ticketSold', 
            'eventCount', 
            'pendingOrders', 
            'transactions'
        ));
    }
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {

        $events = Event::all();

            return view('admin.transactions.create', compact('events'));

    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        // 1. Validasi
        $validated = $request->validate([
            'event_id'       => 'required|exists:events,id',
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'status'         => 'required',
        ]);

        // 2. Ambil data event untuk harga
        $event = Event::findOrFail($request->event_id);

        // 3. Gabungkan data untuk disimpan
        $data = $validated;
        $data['order_id']    = 'TRX-' . strtoupper(Str::random(8));
        $data['total_price'] = $event->price + 5000; // Contoh harga + admin

        // 4. Simpan ke database
        $transaction = Transaction::create($data);

        // 5. Redirect ke halaman tiket dengan ID yang baru dibuat
        return redirect()->route('ticket.show', ['id' => $transaction->id]);
    }

    // =========================
    // SHOW (Menampilkan Tiket)
    // =========================
    public function show($id)
    {
        $transaction = Transaction::with('event')->findOrFail($id);
        return view('ticket', compact('transaction'));
    }

    // =========================
    // EDIT
    // =========================
    public function edit(Transaction $transaction)
    {
        $events = Event::all();
        return view('admin.transactions.edit', compact('transaction', 'events'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:20',
            'status'         => 'required',
            'total_price'    => 'required|numeric',
        ]);

        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil diupdate');
    }

    // =========================
    // DESTROY
    // =========================
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}