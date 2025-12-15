<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profil', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $data = $request->validated();

    // 2. Cek apakah ada file foto yang diupload?
    if ($request->hasFile('avatar')) {
        // Hapus foto lama jika ada (biar server gak penuh sampah)
        if ($request->user()->avatar) {
            Storage::disk('public')->delete($request->user()->avatar);
        }

        // Simpan foto baru ke folder 'avatars' di storage public
        // Hasilnya misal: 'avatars/namarandom.jpg'
        $path = $request->file('avatar')->store('avatars', 'public');
        
        // Masukkan path ke array data yang akan diupdate
        $data['avatar'] = $path;
    }

    // 3. Update User dengan data gabungan (Profile + Avatar)
    $request->user()->fill($data);

    // 4. Reset verifikasi email jika email berubah (opsional, karena field email kita hidden)
    if ($request->user()->isDirty('email')) {
        $request->user()->email_verified_at = null;
    }

    $request->user()->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function destroyAllRooms(Request $request): RedirectResponse
    {
        $request->user()->rooms()->delete();
        return back()->with('status', 'rooms-deleted');
    }

    /**
     * Hapus SEMUA Data Kos (Properti).
     */
    public function destroyAllKos(Request $request): RedirectResponse
    {
        $request->user()->properties()->delete();
        return back()->with('status', 'kos-deleted');
    }
}
