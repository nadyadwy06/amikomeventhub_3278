<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // INDEX
    public function index(Request $request)
    {
    // Memulai query dengan relasi category
    $query = Event::with('category');

    // Jika ada input 'search', tambahkan kondisi pencarian
    if ($request->has('search') && !empty($request->search)) {
        $searchTerm = $request->search;
        
        $query->where('title', 'like', '%' . $searchTerm . '%')
              ->orWhereHas('category', function($q) use ($searchTerm) {
                  $q->where('name', 'like', '%' . $searchTerm . '%');
              });
    }

    // Eksekusi query (gunakan get() atau paginate() jika data sudah banyak)
    $events = $query->get();

    return view('admin.events.index', compact('events'));
}

    // CREATE
    public function create()
    {
        $categories = Category::all();

        return view('admin.events.create', compact('categories'));
    }

    public function show($id)
    {
        $event = Event::with('category')->findOrFail($id);

        return view('event-detail', compact('event'));
    }   
    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'location' => 'required|string',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file, lalu masukkan path-nya ke $data
        if ($request->hasFile('poster')) {
            $data['poster_path'] = $request->file('poster')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan');
        }

        
    // UPDATE
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'location' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Jadi nullable saat edit
        ]);

        if ($request->hasFile('poster')) {
            // Hapus file lama jika ada
            if ($event->poster_path) {
                Storage::disk('public')->delete($event->poster_path);
            }
            $data['poster_path'] = $request->file('poster')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Hapus file gambar dari storage
        if ($event->poster_path) {
            Storage::disk('public')->delete($event->poster_path);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus');
    }
}