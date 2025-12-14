<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PaymentMethodController extends Controller
{
    /**
     * Simpan metode pembayaran baru.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi (tambah validasi gambar)
    $validated = $request->validate([
        'account_name' => 'required|string|max:100',
        'qr_code' => 'nullable|image|max:2048', // Maksimal 2MB
        'is_primary' => 'nullable|boolean',
    ]);

    // 2. Cek apakah ada file QR Code diupload?
    if ($request->hasFile('qr_code')) {
        // Simpan ke folder 'payment_qr' di storage public
        $path = $request->file('qr_code')->store('payment_qr', 'public');
        $validated['qr_code'] = $path;
    }

    $isPrimary = $request->boolean('is_primary'); 

    // Jika user memilih Utama, reset yang lain
    if ($isPrimary) {
        $request->user()->paymentMethods()->update(['is_primary' => false]);
    }

    // Masukkan status is_primary ke array data
    $validated['is_primary'] = $isPrimary;

        $request->user()->paymentMethods()->create($validated);

        // 3. Kembali ke halaman profil dengan pesan sukses
        // Kita kirim session 'active_tab' agar pas reload langsung nuka tab pembayaran
        return back()->with('status', 'payment-added')->with('active_tab', 'payment');
    }

    public function destroy(Request $request, PaymentMethod $paymentMethod): RedirectResponse
    {
        // 1. Security Check: Pastikan yang dihapus adalah milik user yang login
        if ($request->user()->id !== $paymentMethod->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // 2. Hapus file QR Code jika ada (biar server bersih)
        if ($paymentMethod->qr_code) {
            Storage::disk('public')->delete($paymentMethod->qr_code);
        }

        // 3. Hapus data dari database
        $paymentMethod->delete();

        return back()->with('status', 'payment-deleted')->with('active_tab', 'payment');
    }
}