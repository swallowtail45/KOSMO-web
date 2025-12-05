<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-white">

    <div class="p-10 ml-20" x-data="{ tab: 'akun' }">

        <!-- judul -->
        <div x-show="tab === 'akun'" x-cloak>
            <h1 class="text-3xl font-bold text-gray-900" x-show="tab === 'akun'" x-cloak>Profil</h1>
            <p class="text-gray-600 mt-1">Kelola Informasi Pribadi Anda</p>
        </div>
        <div x-show="tab === 'bayar'" x-cloak>
            <h1 class="text-3xl font-bold text-gray-900" x-show="tab === 'bayar'" x-cloak>Preferensi Pembayaran</h1>
            <p class="text-gray-600 mt-1">Kelola PReferensi Pembayaran Anda</p>
        </div>

        <!-- tabs -->
        <div class="flex mt-6 border rounded-lg overflow-hidden max-w-10x0">

            <!-- tab 1 -->
            <button @click="tab = 'akun'"
                :class="tab === 'akun'
                    ?
                    'bg-gradient-to-r from-slate-700 to-slate-900 text-white' :
                    'bg-white text-gray-700'"
                class="w-1/2 py-3 font-semibold transition">
                Informasi Akun
            </button>

            <!-- tab 2 -->
            <button @click="tab = 'bayar'"
                :class="tab === 'bayar'
                    ?
                    'bg-gradient-to-r from-slate-700 to-slate-900 text-white' :
                    'bg-white text-gray-700'"
                class="w-1/2 py-3 font-semibold transition">
                Preferensi Pembayaran
            </button>
        </div>

        <div x-show="tab === 'akun'" x-cloak class="mt-6">

            <form class="grid grid-cols-1 gap-6 max-w-10x0">
                <!-- foto profil -->
                <div class="relative w-32 h-32 flex justify-center items-center mx-auto">

                    <div class="w-full h-full rounded-full bg-gray-300">
                        <img src="images/login1.png" alt="Foto Profil" class="w-full h-full rounded-full object-cover">
                    </div>

                    <!-- edit -->
                    <button
                        class="absolute bottom-2 right-2 w-8 h-8 rounded-full bg-white shadow flex items-center justify-center">
                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_220_814)">
                                <path
                                    d="M2.5 15.0937V18.375H5.625L14.8417 8.69749L11.7167 5.41624L2.5 15.0937ZM17.2583 6.15999C17.5833 5.81874 17.5833 5.26749 17.2583 4.92624L15.3083 2.87874C14.9833 2.53749 14.4583 2.53749 14.1333 2.87874L12.6083 4.47999L15.7333 7.76124L17.2583 6.15999Z"
                                    fill="#323232" />
                            </g>
                            <defs>
                                <clipPath id="clip0_220_814">
                                    <rect width="20" height="21" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                    </button>
                </div>

                <!-- nama -->
                <div>
                    <label class="block text-gray-700 mb-1">Nama</label>
                    <input type="text" value="Sadewa Mukti Brawijaya"
                        class="w-full bg-gray-100 rounded-md px-4 py-2">
                </div>

                <!-- no hp -->
                <div>
                    <label class="block text-gray-700 mb-1">No tlp</label>
                    <input type="text" value="088234572812" class="w-full bg-gray-100 rounded-md px-4 py-2">
                </div>

                <!-- alamat + kode pos -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-1">Alamat</label>
                        <input type="text" value="Jl. Jl Gusti Nakula"
                            class="w-full bg-gray-100 rounded-md px-4 py-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Kode Pos</label>
                        <input type="text" value="52531" class="w-full bg-gray-100 rounded-md px-4 py-2">
                    </div>
                </div>

                <!-- provinsi + kota -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-1">Provinsi</label>
                        <input type="text" value="Jawa Timur" class="w-full bg-gray-100 rounded-md px-4 py-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Kota/Kab</label>
                        <input type="text" value="Kota Malang" class="w-full bg-gray-100 rounded-md px-4 py-2">
                    </div>
                </div>

                <!-- Kecamatan + Kelurahan -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 mb-1">Kecamatan</label>
                        <input type="text" value="Tembalang" class="w-full bg-gray-100 rounded-md px-4 py-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-1">Kelurahan</label>
                        <input type="text" value="Ketawanggede" class="w-full bg-gray-100 rounded-md px-4 py-2">
                    </div>
                </div>

            </form>

            <!-- simpan -->
            <button class="mt-8 bg-teal-500 text-white px-6 py-2 rounded-md hover:bg-teal-600 transition">
                Simpan
            </button>

            <!-- secktion -->
            <div class="mt-12 max-w-10x0">
                <h2 class="text-gray-700 mb-4 font-bold border-b pb-5">Hapus Data</h2>

                <div class="grid grid-cols-2 gap-6">

                    <!-- hapus data penyewa -->
                    <div class="flex items-center justify-between pb-4">
                        <p>Hapus Semua Data Penyewa</p>
                        <button class="bg-teal-500 text-white px-4 py-1 rounded hover:bg-teal-600">Hapus</button>
                    </div>

                    <!-- button hapaus semua data -->
                    <div class="flex items-center justify-between pb-4">
                        <p>Hapus Semua Data Penyewa, Kamar, dan Kos</p>
                        <button class="bg-teal-500 text-white px-4 py-1 rounded hover:bg-teal-600">Hapus</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- isi preferensi bayar -->
        <div x-show="tab === 'bayar'" x-cloak x-data class="mt-8 text-gray-800">

            <!-- Card Pembayaran -->
            <div class="mt-6 space-y-4">

                <!-- CARD AKTIF -->
                <div class="flex items-stretch bg-white shadow-md rounded-xl overflow-hidden">

                    <!-- KONTEN KIRI -->
                    <div class="flex-1 p-4">
                        <div class="flex items-center gap-3 mb-1">
                            <span class="font-semibold text-gray-900">Qris</span>

                            <span class="h-5 border-l"></span>

                            <span class="font-medium text-gray-900">Kos Berkah Jaya 1</span>

                            <span class="text-xs bg-gray-200 text-gray-700 px-2 py-1 rounded-md">
                                Utama
                            </span>
                        </div>

                        <p class="text-xs text-gray-500">
                            ID : 248f7ee5-b3d4-4d92-af86-77a9914c3075
                        </p>
                    </div>

                    <!-- TOMBOL KANAN -->
                    <div class="flex items-stretch h-full">

                        <!-- INFO -->
                        <button class="w-14 flex items-center justify-center bg-teal-300 hover:bg-teal-400 transition">
                            <svg width="38" height="85" viewBox="0 0 54 54" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_120_1212)">
                                    <path
                                        d="M24.75 15.75H29.25V20.25H24.75V15.75ZM24.75 24.75H29.25V38.25H24.75V24.75ZM27 4.5C14.58 4.5 4.5 14.58 4.5 27C4.5 39.42 14.58 49.5 27 49.5C39.42 49.5 49.5 39.42 49.5 27C49.5 14.58 39.42 4.5 27 4.5ZM27 45C17.0775 45 9 36.9225 9 27C9 17.0775 17.0775 9 27 9C36.9225 9 45 17.0775 45 27C45 36.9225 36.9225 45 27 45Z"
                                        fill="#323232" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_120_1212">
                                        <rect width="85" height="85" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </button>

                        <!-- DELETE -->
                        <button class="w-14 flex items-center justify-center bg-red-400 hover:bg-red-500 transition">
                            <svg width="35" height="35" viewBox="0 0 54 54" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_120_1211)">
                                    <path
                                        d="M12.75 40.375C12.75 42.7125 14.6625 44.625 17 44.625H34C36.3375 44.625 38.25 42.7125 38.25 40.375V14.875H12.75V40.375ZM40.375 8.5H32.9375L30.8125 6.375H20.1875L18.0625 8.5H10.625V12.75H40.375V8.5Z"
                                        fill="#3A3A3A" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_120_1211">
                                        <rect width="51" height="51" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>

                    </div>
                </div>

                <!-- CARD TAMBAH -->'
                <div>
                <x-card-add-payment>
                <button
                    class="w-full bg-white shadow-md rounded-xl py-10 flex items-center justify-center hover:bg-gray-50 text-4xl text-gray-700">
                    +
                </button>
                </x-card-add-payment>
                </div>
            </div>
        </div>

        <x-app-layout>
        </x-app-layout>
    </div>

</body>

</html>
