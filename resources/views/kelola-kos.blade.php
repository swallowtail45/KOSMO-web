<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kamar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body class="bg-white">

    <div class="p-10 ml-20" x-data="{ tab: 'kamar' }">

        <!-- desc -->
        <div x-show="tab ==='kamar'" x-clock>
            <h1 class="text-3xl font-bold text-gray-900" x-show="tab ==='kamar'" x-clock>Kelola Kamar</h1>
            <p class="text-gray-600 mt-1">Kelola Kamar yang Anda Miliki Sekarang !</p>
        </div>
        <div x-show="tab ==='kos'" x-clock>
            <h1 class="text-3xl font-bold text-gray-900" x-show="tab ==='kos'" x-clock>Kelola Kos</h1>
            <p class="text-gray-600 mt-1">Kelola Kos yang Anda Miliki Sekarang !</p>
        </div>
        <!-- button -->
        <div class="flex justify-end mt-6" x-show="tab ==='kamar'" x-clock>
            <x-card-add-kamar>
                <button class="px-5 border py-2 bg-teal-200 hover:bg-teal-300 transition rounded-md text-sm">
                    Kelola Kamar
                </button>
            </x-card-add-kamar>
        </div>

        <div class="flex justify-end mt-6" x-show="tab ==='kos'" x-clock>
            <x-card-add-kos>
                <button class="px-5 border py-2 bg-teal-200 hover:bg-teal-300 transition rounded-md text-sm">
                    Kelola Kos
                </button>
            </x-card-add-kos>
        </div>

        <!-- tabs -->
        <div class="flex mt-6 border rounded-lg overflow-hidden max-w-10x0">
            <button class="w-1/2 py-3 font-semibold transition"
                :class="tab === 'kamar' ? 'bg-gradient-to-r from-slate-700 to-slate-900 text-white' :
                    'bg-white text-gray-700'"
                @click="tab = 'kamar'">
                Kamar
            </button>
            <button class="w-1/2 py-3 font-semibold transition"
                :class="tab === 'kos' ? 'bg-gradient-to-r from-slate-700 to-slate-900 text-white' :
                    'bg-white text-gray-700'"
                @click="tab = 'kos'">
                Kos
            </button>
        </div>

        <!-- table kamar -->
        <div class="mt-6 max-w-10x0" x-show="tab ==='kamar'" x-clock>
            <table class="w-full text-left border-separate border-spacing-y-4">

                <thead>
                    <tr class="text-gray-700 font-semibold border-b">
                        <th class="pb-2">Nama</th>
                        <th class="pb-2">Properti</th>
                        <th class="pb-2">Penyewa</th>
                        <th class="pb-2">Telepon</th>
                        <th class="pb-2">Tanggal Mulai</th>
                        <th class="pb-2">Status Sewa</th>
                        <th class="pb-2">Harga</th>
                    </tr>
                </thead>

                <tbody class="text-gray-800">

                    <tr class="border-b cursor-pointer hover:bg-red-50">
                        <td class="py-3">Kamar 1</td>
                        <td>Kost Putra</td>
                        <td>Asep</td>
                        <td>0812345</td>
                        <td>01/01/2025</td>
                        <td>Sudah disewa</td>
                        <td>Rp. 500.000</td>
                    </tr>
                    <x-app-layout>
                    </x-app-layout>
                </tbody>
            </table>
        </div>

        <!-- table kos -->
        <div class="mt-6 max-w-10x0" x-show="tab === 'kos'" x-clock>
            <table class="w-full text-left border-separate border-spacing-y-4">

                <thead>
                    <tr class="text-gray-700 font-semibold border-b">
                        <th class="pb-2">Nama</th>
                        <th class="pb-2">Alamat</th>
                        <th class="pb-2">Pemilik</th>
                        <th class="pb-2">Telepon</th>
                        <th class="pb-2">Jumlah Kamar</th>
                        <th class="pb-2">Status Kos</th>
                        <th class="pb-2">Harga</th>
                    </tr>
                </thead>

                <tbody class="text-gray-800">

                    <tr class="border-b cursor-pointer hover:bg-red-50">
                        <td class="py-3">Kamar 1</td>
                        <td>Kost Putra</td>
                        <td>Asep</td>
                        <td>0812345</td>
                        <td>01/01/2025</td>
                        <td>Sudah disewa</td>
                        <td>Rp. 500.000</td>
                    </tr>

                    <tr class="border-b cursor-pointer hover:bg-red-50">
                        <td class="py-3">Kamar 1</td>
                        <td>Kost Putra</td>
                        <td>Asep</td>
                        <td>0812345</td>
                        <td>01/01/2025</td>
                        <td>Tersedia</td>
                        <td>Rp. 500.000</td>
                    </tr>

                    <x-app-layout>
                    </x-app-layout>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
