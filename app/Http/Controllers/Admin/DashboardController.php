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
    // Ambil transaksi terbaru dengan relasi event
    $transactions = Transaction::with('event')->latest()->take(5)->get(); 

    // Total pendapatan (sum)
    $totalRevenue = Transaction::where('status', 'success')->sum('total_price');

    // Total tiket (count)
    $ticketSold = Transaction::where('status', 'success')->count();

    // Total event
    $eventCount = Event::count();

    // Total pending (menggunakan case-insensitive)
    $pendingOrders = Transaction::whereRaw('LOWER(status) = ?', ['pending'])->count();

    return view('admin.dashboard', compact(
        'transactions',
        'totalRevenue',
        'ticketSold',
        'eventCount',
        'pendingOrders'
    ));
}
}