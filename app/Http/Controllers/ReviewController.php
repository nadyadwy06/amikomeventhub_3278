<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        // Aturan: Sehari setelah acara tuntas (H+1)
        $eventDate = Carbon::parse($event->date);
        if (now()->lessThan($event->date->addDay())) {
            return back()->with('error', 'Ulasan hanya dapat diberikan 1 hari setelah acara tuntas.');
        }

        // Aturan: Pengguna wajib membeli tiket acara tersebut
        $hasTicket = Transaction::where('user_id', Auth::id())
            ->where('event_id', $eventId)
            ->whereIn('status', ['settlement', 'success'])
            ->exists();

        if (!$hasTicket) {
            return back()->with('error', 'Anda hanya dapat memberikan ulasan untuk acara yang tiketnya telah Anda beli.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:5|max:1000',
        ]);

        Review::updateOrCreate(
            ['user_id' => Auth::id(), 'event_id' => $eventId],
            ['rating' => $request->rating, 'review' => $request->review]
        );

        return back()->with('success', 'Ulasan dan penilaian berhasil dikirim!');
    }
}
