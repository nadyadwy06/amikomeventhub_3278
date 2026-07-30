<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data transaksi terbaru (Menggunakan variabel $recentTransactions)
        $recentTransactions = Transaction::with('event')->latest()->take(5)->get();

        // 2. Hitung statistik dashboard
        $totalRevenue  = Transaction::where('status', 'success')->sum('total_price');
        $ticketSold    = Transaction::where('status', 'success')->count();
        $eventCount    = Event::count();
        $activeEvents  = Event::count();
        $pendingOrders = Transaction::where('status', 'pending')->count();

        // 3. Data grafik pendaftaran pengguna bulanan
        $monthlyUsers = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $userChartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $userChartData[] = $monthlyUsers[$i] ?? 0;
        }

        // 4. Data grafik pendapatan bulanan
        $monthlyRevenue = Transaction::where('status', 'success')
            ->selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $revenueChartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $revenueChartData[] = $monthlyRevenue[$i] ?? 0;
        }

        // 5. Kirim semua variabel ke view admin.dashboard
        return view('admin.dashboard', compact(
            'recentTransactions', // <-- Menggunakan nama variabel ini
            'totalRevenue',
            'ticketSold',
            'eventCount',
            'activeEvents',
            'pendingOrders',
            'userChartData',
            'revenueChartData'
        ));
    }
}