<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. Logika Pencarian
        // Kita gunakan query builder untuk transaksi
        $transactionsQuery = Transaction::with('event');

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            
            $transactionsQuery->where('customer_name', 'like', '%' . $searchTerm . '%')
                ->orWhereHas('event', function($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%');
                });
        }

        // Ambil data transaksi yang sudah difilter
        $transactions = $transactionsQuery->latest()->take(10)->get(); 

        // 2. Statistik (tetap gunakan total keseluruhan tanpa filter pencarian)
        $totalRevenue = Transaction::where('status', 'success')->sum('total_price');
        $ticketSold = Transaction::where('status', 'success')->count();
        $eventCount = Event::count();
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