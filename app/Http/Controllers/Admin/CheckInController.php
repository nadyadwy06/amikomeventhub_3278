<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    // Halaman Scanner Kamera HTML5
    public function index()
    {
        return view('admin.checkin.scan');
    }

    // API Validasi Kode QR
    public function validateQr(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
        ]);

        $trx = Transaction::with('event')->where('order_id', $request->order_id)->first();

        // 1. Cek Apakah Tiket Ditemukan
        if (!$trx) {
            return response()->json([
                'status'  => 'error',
                'message' => '❌ TIKET TIDAK DITEMUKAN / PALSU!'
            ], 404);
        }

        // 2. Cek Status Pembayaran
        if (!in_array($trx->status, ['settlement', 'success'])) {
            return response()->json([
                'status'  => 'error',
                'message' => '⚠️ TIKET BELUM LUNAS! Status: ' . strtoupper($trx->status)
            ], 400);
        }

        // 3. Cek Apakah Tiket Sudah Pernah Dipakai (Double Entry)
        if ($trx->is_used) {
            return response()->json([
                'status'  => 'warning',
                'message' => '⛔ TIKET SUDAH DIPAKAI pada ' . $trx->used_at->format('H:i:s d M Y')
            ], 400);
        }

        // 4. Validasi Berhasil -> Ubah Status Jadi Used
        $trx->update([
            'is_used' => true,
            'used_at' => now(),
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => '✅ CHECK-IN BERHASIL!',
            'data'    => [
                'customer_name'  => $trx->customer_name,
                'customer_email' => $trx->customer_email,
                'event_title'    => $trx->event->title ?? '-',
                'checkin_time'   => $trx->used_at->format('H:i:s')
            ]
        ]);
    }
}
