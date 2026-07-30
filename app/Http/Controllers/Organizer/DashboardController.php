<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Organizer;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $organizer = Organizer::where('user_id', Auth::id())->first();

        // 1. CEK DULU
        if (!$organizer) {
            return redirect()->route('home')->with('error', 'Akun Anda belum terdaftar sebagai penyelenggara.');
        }

        // 2. CEK STATUS: Jika terdaftar tapi belum disetujui Superadmin
        if ($organizer->status !== 'approved') {
            return view('organizer.pending', compact('organizer'));
        }

        // 3. JIKA SUDAH APPROVED 
        $eventIds = $organizer->events()->pluck('id');

        $totalRevenue = Transaction::whereIn('event_id', $eventIds)
            ->whereIn('status', ['settlement', 'success'])
            ->sum('total_price');

        $ticketsSold = Transaction::whereIn('event_id', $eventIds)
            ->whereIn('status', ['settlement', 'success'])
            ->count();

        $activeEvents = $organizer->events()->where('date', '>=', now())->count();

        $recentTransactions = Transaction::with('event')
            ->whereIn('event_id', $eventIds)
            ->latest()
            ->take(5)
            ->get();

        return view('organizer.dashboard', compact(
            'organizer',
            'totalRevenue',
            'ticketsSold',
            'activeEvents',
            'recentTransactions'
        ));
    }
}