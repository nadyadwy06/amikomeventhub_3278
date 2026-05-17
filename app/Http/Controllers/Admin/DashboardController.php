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
        // Ambil transaksi terbaru
        $transactions = Transaction::latest()->take(5)->get();

        // Total pendapatan
        $totalRevenue = Transaction::sum('total_price');

        // Total tiket
        $ticketSold = Transaction::count();

        // Total event
        $eventCount = Event::count();

        // Total pending
        $pendingOrders = Transaction::where('status', 'Pending')->count();

        return view('admin.dashboard', compact(
            'transactions',
            'totalRevenue',
            'ticketSold',
            'eventCount',
            'pendingOrders'
        ));
    }
}