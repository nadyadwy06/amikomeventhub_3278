<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;

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
    }

    // =========================
    // CREATE (INI YANG KAMU BILANG ERROR)
    // =========================
    public function create()
    {
        // 🔥 WAJIB ADA INI
        $events = Event::all();

        // 🔥 WAJIB KIRIM KE VIEW
        return view('admin.transactions.create', compact('events'));
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'event_id'       => 'required|exists:events,id',
            'customer_name'  => 'required',
            'customer_email' => 'required|email',
            'customer_phone' => 'required',
            'status'         => 'required',
        ]);

        $event = Event::findOrFail($request->event_id);

        Transaction::create([
            'event_id'        => $event->id,
            'order_id'        => uniqid(),
            'customer_name'   => $request->customer_name,
            'customer_email'  => $request->customer_email,
            'customer_phone'  => $request->customer_phone,

            // 🔥 AUTO TOTAL PRICE DARI EVENT
            'total_price'     => $event->price,

            'status'          => $request->status ?? 'Pending',
            'snap_token'      => null,
        ]);

        return redirect()->route('admin.transactions.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
    }
}