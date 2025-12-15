<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PropertyController extends Controller
{
    // Simpan Kos Baru
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'owner_name' => 'required|string',
            'owner_phone' => 'nullable|string',
            'room_total' => 'required|integer',
            'status' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $request->user()->properties()->create($validated);

        return back()->with('status', 'property-added')->with('active_tab', 'property');
    }

    // Hapus Kos
    public function destroy(Request $request, Property $property): RedirectResponse
    {
        if ($request->user()->id !== $property->user_id) abort(403);
        
        $property->delete();
        return back()->with('status', 'property-deleted')->with('active_tab', 'property');
    }
}