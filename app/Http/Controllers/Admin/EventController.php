<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Category;

class EventController extends Controller
{
    // INDEX
    public function index()
    {
        $events = Event::with('category')->get();

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
            'title' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'location' => 'required',
            'poster' => 'required|image',
        ]);

        if ($request->hasFile('poster')) {
            $data['poster_path'] = $request->file('poster')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')
        ->with('success', 'Event berhasil ditambahkan');
    }

    // EDIT
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        $categories = Category::all();

        return view('admin.events.edit', compact('event', 'categories'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'location' => 'required',
        ]);

        if ($request->hasFile('poster')) {
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

        $event->delete();

        return redirect()->route('admin.events.index')
        ->with('success', 'Event berhasil dihapus');
    }
}