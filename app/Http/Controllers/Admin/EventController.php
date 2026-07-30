<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // INDEX (PERBAIKAN QUERY SEARCH)
    public function index(Request $request)
    {
        $query = Event::with('category');

        // Gunakan filled() untuk memastikan input search benar-benar berisi teks
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            
            // Pengelompokan query (where/orWhere) dalam closure
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('category', function($catQuery) use ($searchTerm) {
                      $catQuery->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        // Ambil data terbaru
        $events = $query->latest()->get();

        return view('admin.events.index', compact('events'));
    }

    // CREATE
    public function create()
    {
        $categories = Category::all();

        return view('admin.events.create', compact('categories'));
    }

    // SHOW
    public function show($id)
    {
        $event = Event::with(['category', 'organizer.reviews', 'reviews.user'])->findOrFail($id);

        return view('event-detail', compact('event'));
    }   

    // EDIT
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();

        return view('admin.events.edit', compact('event', 'categories'));
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'date'        => 'required|date',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'location'    => 'required|string',
            'poster'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if (auth()->check() && auth()->user()->organizer_id) {
            $data['organizer_id'] = auth()->user()->organizer_id;
        }

        if ($request->hasFile('poster')) {
            $data['poster_path'] = $request->file('poster')->store('events', 'public');
        }

        unset($data['poster']);

        Event::create($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'date'        => 'required|date',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'location'    => 'required|string',
            'poster'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('poster')) {

            if ($event->poster_path) {
                Storage::disk('public')->delete($event->poster_path);
            }
            $data['poster_path'] = $request->file('poster')->store('events', 'public');
        }

        unset($data['poster']);

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->poster_path) {
            Storage::disk('public')->delete($event->poster_path);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus');
    }
}