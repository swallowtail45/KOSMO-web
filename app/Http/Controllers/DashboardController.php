<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        // 1. Hitung Total Kos (Dari tabel properties)
        $totalKos = $user->properties()->count();

        // 2. Hitung Total Kamar
        $totalKamar = $user->rooms()->count();

        // 3. Hitung Total Penyewa (Kamar yang tenant_name-nya tidak kosong)
        $totalPenyewa = $user->rooms()->whereNotNull('tenant_name')->where('tenant_name', '!=', '')->count();

        // 4. Data Dummy untuk Grafik (Nanti bisa diganti dengan query transaksi real)
        $chartData = [500000, 1500000, 1000000, 3500000, 4500000, 800000, 1200000, 7000000, 9500000, 200000, 900000, 7500000];

        return view('dashboard', [
            'totalKos' => $totalKos,
            'totalKamar' => $totalKamar,
            'totalPenyewa' => $totalPenyewa,
            'chartData' => json_encode($chartData) // Kirim sebagai JSON untuk JS
        ]);
    }
}