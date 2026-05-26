<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
    $query = Partner::query();

    if ($request->has('search') && !empty($request->search)) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('type', 'like', '%' . $request->search . '%');
    }

    $partners = $query->get();
    return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'type' => 'required|string',
        ]);

        // Simpan file logo ke storage/app/public/partners
        $logoPath = $request->file('logo')->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'logo' => $logoPath,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambah.');
    }

    public function edit(Partner $partner) // Menggunakan Route Model Binding
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'type' => 'required|string',
        ]);

        $data = $request->only(['name', 'type']);

        if ($request->hasFile('logo')) {
            // Hapus logo lama
            Storage::disk('public')->delete($partner->logo);
            // Simpan logo baru
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diupdate.');
    }

    public function destroy(Partner $partner)
    {
        // Hapus file logo dari storage
        Storage::disk('public')->delete($partner->logo);
        // Hapus data dari database
        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}