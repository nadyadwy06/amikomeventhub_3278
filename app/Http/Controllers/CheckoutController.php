<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;        
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function create(Event $event)
    {
        $categories = \App\Models\Category::all();
        return view('checkout.create', compact('event','categories'));
    }

    public function payment($order_id)
    {
        $categories = \App\Models\Category::all();
        $transaction = Transaction::with('event')->where('order_id', $order_id)->firstOrFail();

        return view('checkout.payment', compact('transaction', 'categories'));
    }

    public function store(Request $request, Event $event)
    {
        // 1. Validasi Input Kredensial Pelanggan
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        // 2. Cegah Check-out Jika Tiket Habis
        if ($event->stock <= 0) {
            return back()->with('error', 'Mohon maaf, tiket untuk acara ini sudah habis.');
        }

        // 3. Generate Kode TRX (Unik)
        $orderId = 'TRX-' . time() . '-' . Str::random(5);
        
        // --- LOGIKA BYPASS ACARA GRATIS (FREE EVENTS / Rp 0) ---
        if ($event->price == 0) {
            $transaction = Transaction::create([
                'user_id'        => auth()->id(), // Ditambahkan agar terbaca di sistem Review
                'event_id'       => $event->id,
                'order_id'       => $orderId,
                'customer_name'  => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'total_price'    => 0,
                'status'         => 'success', 
            ]);

            // Kurangi stok tiket secara real-time
            $event->decrement('stock');

            return redirect()->route('checkout.success', $transaction->order_id)
                             ->with('success', 'Pendaftaran Berhasil! Tiket Anda telah diterbitkan.');
        }

        // 4. Jika Event Berbayar (> Rp 0)
        $totalPrice = (int) ($event->price + 5000); 

        $transaction = Transaction::create([
            'user_id'        => auth()->id(), // Ditambahkan agar terbaca di sistem Review
            'event_id'       => $event->id,
            'order_id'       => $orderId,
            'customer_name'  => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price'    => $totalPrice,
            'status'         => 'pending',
        ]);

        // 5. Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized', true);
        Config::$is3ds = config('midtrans.is_3ds', true);


        $params = [
            'transaction_details' => [
                'order_id'     => $transaction->order_id,
                'gross_amount' => (int) $transaction->total_price,
            ],
            'customer_details' => [
                'first_name' => $transaction->customer_name,
                'email'      => $transaction->customer_email,
                'phone'      => $transaction->customer_phone,
            ],
        ];

        try {
            
        $snapToken = Snap::getSnapToken($params);
            
            $transaction->update(['snap_token' => $snapToken]);

            
            return redirect()->route('checkout.payment', $transaction->order_id);

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memproses pembayaran jaringan: ' . $e->getMessage());
        }
    }

    public function success($order_id)
    {
        $categories = \App\Models\Category::all();
        $transaction = Transaction::with('event')->where('order_id', $order_id)->firstOrFail();

        // Jika transaksi dari event berbayar, verifikasi status Midtrans
        if ($transaction->total_price > 0 && $transaction->status !== 'success') {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');

            try {
                $midtransStatus = \Midtrans\Transaction::status($order_id);

                if (in_array($midtransStatus->transaction_status, ['capture', 'settlement'])) {
                    $transaction->update(['status' => 'success']);
                    
                    // Kurangi stok tiket setelah pembayaran berbayar terkonfirmasi
                    if ($transaction->event) {
                        $transaction->event->decrement('stock');
                    }
                }
            } catch (\Exception $e) {
                return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan atau gagal diproses.');
            }
        }

        return view('checkout.success', compact('transaction', 'categories'));
    }

}