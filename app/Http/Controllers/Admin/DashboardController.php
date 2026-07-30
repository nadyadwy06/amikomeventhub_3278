<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil 5 transaksi terbaru
        $recentTransactions = Transaction::with('event')->latest()->take(5)->get(); 

        // 2. Total pendapatan (menghitung status 'settlement' & 'success')
        $totalRevenue = Transaction::whereIn('status', ['settlement', 'success'])->sum('total_price');

        // 3. Total tiket terjual (menghitung status 'settlement' & 'success')
        $ticketsSold = Transaction::whereIn('status', ['settlement', 'success'])->count();

        // 4. Total event aktif (mendatang)
        $activeEvents = Event::where('date', '>=', now())->count();

        // 5. Total transaksi pending
        $pendingOrders = Transaction::where('status', 'pending')->count();

    return view('admin.dashboard', compact(
        'transactions',
        'totalRevenue',
        'ticketSold',
        'eventCount',
        'pendingOrders'
    ));
}
}