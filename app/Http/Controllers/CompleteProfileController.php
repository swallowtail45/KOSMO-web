<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse; 
use Illuminate\View\View;             

class CompleteProfileController extends Controller
{
    /**
     * Tampilkan form langkah 2
     */
    public function create(): View
    {
        return view('auth.complete-profile');
    }

    /**
     * Simpan data profil
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:500'],
            'postal_code' => ['required', 'string', 'max:10'],
            'province' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:100'],
            'district' => ['required', 'string', 'max:100'],
            'village' => ['required', 'string', 'max:100'],
        ]);

        // 2. Update user yang sedang login
        $request->user()->update($validated);

        // 3. Redirect ke dashboard
        return redirect()->intended(route('dashboard'));
    }
}