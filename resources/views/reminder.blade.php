<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white">

    <div class="p-10 ml-20">

        <!-- judul -->
        <h1 class="text-3xl font-bold text-gray-900">Pengingat</h1>
        <p class="text-gray-600 mt-1">Atur Pengingat Untuk Para Penghuni</p>

        <div class="mt-12">
            <h1 class="text-3xl font-bold text-gray-900">Daftar Pengingat</h1>
        </div>

        <!-- isi preferensi bayar -->
        <div class="mt-0 text-gray-800">

            <!-- Card Pembayaran -->
            <div class="mt-6 space-y-4">

                <!-- CARD AKTIF -->
                <div class="flex items-stretch bg-white shadow-md rounded-xl overflow-hidden">

                    <!-- KONTEN KIRI -->
                    <div class="flex-1 p-4">
                        <div class="flex items-center gap-3 mb-1">
                            <span class="font-semibold text-gray-900">Pengingat 1</span>

                            <span class="h-5 border-l"></span>

                            <span class="font-medium text-gray-900">Pembayaran Bulanan</span>

                        </div>

                        <p class="text-xs text-gray-500">
                            Status Reminder : Aktif
                        </p>
                        <p class="text-xs text-gray-500">
                            Media Reminder : Whatsapp
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
                            <svg width="35" height="95" viewBox="0 0 54 54" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_120_1211)">
                                    <path
                                        d="M12.75 40.375C12.75 42.7125 14.6625 44.625 17 44.625H34C36.3375 44.625 38.25 42.7125 38.25 40.375V14.875H12.75V40.375ZM40.375 8.5H32.9375L30.8125 6.375H20.1875L18.0625 8.5H10.625V12.75H40.375V8.5Z"
                                        fill="#3A3A3A" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_120_1211">
                                        <rect width="85" height="85" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>

                    </div>
                </div>

                <!-- CARD TAMBAH -->
                <div>
                    <x-card-add-reminder>

                        <button
                            class="w-full bg-white shadow-md rounded-xl py-10 flex items-center justify-center hover:bg-gray-50 text-4xl text-gray-700">
                            +
                        </button>
                    </x-card-add-reminder>
                </div>
            </div>
        </div>

        <x-app-layout>
        </x-app-layout>
    </div>

</body>

</html>
