<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RoomController extends Controller
{
    // Tampilkan Daftar Kamar
    public function index(Request $request): View
    {
        $rooms = $request->user()->rooms()->latest()->get();
        $properties = $request->user()->properties()->latest()->get();
        return view('kelola-kos', ['rooms' => $rooms, 'properties' => $properties]);
    }

    // Simpan Kamar Baru
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'property_type' => 'required|string',
            'price' => 'required|numeric',
            // Field penyewa opsional saat buat kamar baru
            'tenant_name' => 'nullable|string', 
            'tenant_phone' => 'nullable|string',
            'start_date' => 'nullable|date',
            'status' => 'required|string',
        ]);

        $request->user()->rooms()->create($validated);

        return back()->with('status', 'room-added');
    }

    // Hapus Kamar
    public function destroy(Request $request, Room $room): RedirectResponse
    {
        if ($request->user()->id !== $room->user_id) {
            abort(403);
        }
        $room->delete();
        return back()->with('status', 'room-deleted');
    }
}