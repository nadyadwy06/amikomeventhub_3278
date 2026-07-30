<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerApprovalController extends Controller
{
    public function index()
    {
        $organizers = Organizer::with('user')->latest()->get();
        return view('admin.organizers.index', compact('organizers'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:approved,rejected,pending']);

        $organizer = Organizer::findOrFail($id);
        $organizer->update(['status' => $request->status]);

        return back()->with('success', 'Status kelayakan penyelenggara berhasil diperbarui!');
    }
}
