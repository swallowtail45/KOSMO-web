<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-white-100">

    <div class="min-h-screen w-full bg-cover bg-center bg-no-repeat flex flex-col"
    style="background-image: url('images/bg_Dashboard.png');">

    <div class="relative z-10 p-10 ml-20">

        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600 mt-1">
            Ringkasan Aktivitas Anda selama 12 bulan terakhir
        </p>

        <!-- Statistic Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 max-w-5xl">

            <!-- Card 1 -->
            <div class="bg-gradient-to-br from-slate-700 to-slate-900 p-6 rounded-xl shadow text-white">
                <p class="text-lg">Total Penyewa</p>
                <h2 class="text-3xl font-semibold mt-2">12 Orang</h2>
            </div>

            <!-- Card 2 -->
            <div class="bg-gradient-to-br from-slate-700 to-slate-900 p-6 rounded-xl shadow text-white">
                <p class="text-lg">Total Kos</p>
                <h2 class="text-3xl font-semibold mt-2">1 Kos</h2>
            </div>

            <!-- Card 3 -->
            <div class="bg-gradient-to-br from-slate-700 to-slate-900 p-6 rounded-xl shadow text-white">
                <p class="text-lg">Total Kamar</p>
                <h2 class="text-3xl font-semibold mt-2">12 Kamar</h2>
            </div>
<x-app-layout>
</x-app-layout>
        </div>

        <!-- Section Title + Button -->
        <div class="flex justify-between items-center mt-12 max-w-5xl">
            <h2 class="text-2xl font-bold text-gray-800">
                Pendapatan dalam 12 bulan terakhir
            </h2>

            <button class="px-5 py-2 border border-gray-400 rounded-lg hover:bg-gray-200 transition">
                Unduh Laporan Keuangan
            </button>
        </div>

        <!-- Chart Placeholder -->
        <div class="bg-white mt-6 p-6 rounded-xl shadow max-w-5xl">
            <div class="w-full h-64 flex items-center justify-center text-gray-500">
                <p>grafik</p>
            </div>
        </div>

    </div>

</body>
</html>

