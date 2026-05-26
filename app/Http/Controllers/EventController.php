<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Menggunakan Route Model Binding
    public function show(Event $event) 
    {
        // Gunakan loadMissing agar tidak terjadi query ganda jika relasi sudah ter-load
        $event->loadMissing('category');
        
        return view('event-detail', compact('event'));
    }

    public function checkout(Event $event)
    {
        // Opsional: Cek apakah stok masih ada sebelum masuk ke checkout
        if ($event->stock <= 0) {
            return redirect()->back()->with('error', 'Maaf, tiket untuk event ini sudah habis.');
        }

        return view('checkout', compact('event'));
    }
    }