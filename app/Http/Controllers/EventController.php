<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Menggunakan Route Model Binding
    public function show(Event $event) 
    {
        // Gunakan loadMissing agar tidak terjadi query ganda
        $event->loadMissing('category');
        
        return view('event-detail', compact('event'));
    }

    public function checkout(Event $event)
    {
        // Opsional: Cek apakah stok masih ada
        if ($event->stock <= 0) {
            return redirect()->back()->with('error', 'Maaf, tiket untuk event ini sudah habis.');
        }

        return view('checkout', compact('event'));
    }

    public function edit(Event $event) 
    {
        // Tambahkan pengecekan jika event tidak ditemukan (sebagai cadangan)
        if (!$event) {
            return redirect()->route('admin.events.index')->with('error', 'Event tidak ditemukan.');
        }
        
        return view('admin.events.edit', compact('event'));
    }

    // PENTING: Jangan lupa tambahkan method update agar halaman edit bisa bekerja
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            // tambahkan validasi lain sesuai kolom Anda
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diupdate.');
    }
}