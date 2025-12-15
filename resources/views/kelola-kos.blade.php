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

<body class="bg-white" x-data="{ 
          tab: 'kamar', 
          showAddModal: false,
          showPropertyModal: false,
          showEditModal: false,
          showEditPropertyModal: false,
          selectedRoom: null,
          selectedProperty: null
      }">

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
                    @forelse($rooms as $room)
                    <tr @click="selectedRoom = {{ json_encode($room) }}; showEditModal = true" class="border-b cursor-pointer hover:bg-red-50" >
                        <td class="py-3">{{ $room->name }}</td>
                        <td>{{ $room->property_type }}</td>
                        <td>{{ $room->tenant_name }}</td>
                        <td>{{ $room->tenant_phone }}</td>
                        <td>{{ $room->start_date }}</td>
                        <td><span class="{{ $room->status == 'Sudah disewa' ? 'text-green-600' : 'text-yellow-600' }} font-medium">
                                        {{ $room->status }}
                                    </span></td>
                        <td>Rp. {{ number_format($room->price, 0, ',', '.') }}</td>
                    </tr>
                    
                    @empty
                            <tr>
                                <td colspan="8" class="py-8 text-center text-gray-400 border-b">
                                    Belum ada data kamar. Klik tombol hijau di atas untuk menambah.
                                </td>
                            </tr>
                            @endforelse
                </tbody>
            </table>
        </div>
        <div x-show="showEditModal" style="display: none;" 
         class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-75 backdrop-blur-sm p-4"
         x-transition.opacity>
        
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl overflow-hidden transform transition-all"
             @click.away="showEditModal = false">
            
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-kosmo-darkblue">
                <h3 class="text-lg font-bold text-white">Detail Kamar</h3>
                <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>

            <div class="p-6 space-y-4" x-if="selectedRoom">
                
                <div class="grid grid-cols-2 gap-6 text-sm">
                    <div>
                        <p class="text-gray-400 font-bold uppercase text-xs mb-1">Nama Kamar</p>
                        <p class="font-semibold text-gray-800 text-lg" x-text="selectedRoom.name"></p>
                    </div>
                    <div>
                        <p class="text-gray-400 font-bold uppercase text-xs mb-1">Status</p>
                        <span class="px-2 py-1 rounded font-bold text-xs" 
                              :class="selectedRoom.status == 'Sudah disewa' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700'"
                              x-text="selectedRoom.status"></span>
                    </div>
                    <div>
                        <p class="text-gray-400 font-bold uppercase text-xs mb-1">Penyewa</p>
                        <p class="text-gray-700" x-text="selectedRoom.tenant_name || '-'"></p>
                    </div>
                    <div>
                        <p class="text-gray-400 font-bold uppercase text-xs mb-1">Telepon</p>
                        <p class="text-gray-700" x-text="selectedRoom.tenant_phone || '-'"></p>
                    </div>
                    <div>
                        <p class="text-gray-400 font-bold uppercase text-xs mb-1">Harga</p>
                        <p class="text-gray-700">Rp. <span x-text="new Intl.NumberFormat('id-ID').format(selectedRoom.price)"></span></p>
                    </div>
                    <div>
                        <p class="text-gray-400 font-bold uppercase text-xs mb-1">Tipe Properti</p>
                        <p class="text-gray-700" x-text="selectedRoom.property_type"></p>
                    </div>
                </div>

                <div class="pt-6 border-t mt-6 flex justify-between items-center">
                    
                    <form :action="'/kelola-kos/' + selectedRoom.id" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kamar ini secara permanen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center gap-2 text-red-500 hover:text-red-700 font-bold px-4 py-2 border border-red-200 rounded-lg hover:bg-red-50 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Hapus Kamar
                        </button>
                    </form>

                    <button @click="showEditModal = false" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-6 rounded-lg transition">
                        Tutup
                    </button>
                </div>

            </div>
        </div>
    </div>
        <x-app-layout>
        </x-app-layout>
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
                    @forelse($properties as $property)
                    <tr @click="selectedProperty = {{ json_encode($property) }}; showEditPropertyModal = true" class="border-b cursor-pointer hover:bg-red-50" >
                        <td class="py-3">{{ $property->name }}</td>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->owner_name }}</td>
                        <td>{{ $property->owner_phone }}</td>
                        <td>{{ $property->room_total }}</td>
                        <td><span class="{{ $property->status == 'Aktif' ? 'text-green-600' : 'text-yellow-600' }} font-medium">
                                        {{ $property->status }}
                                    </span></td>
                        <td>Rp. {{ number_format($property->price, 0, ',', '.') }}</td>
                    </tr>
                    
                    @empty
                            <tr>
                                <td colspan="8" class="py-8 text-center text-gray-400 border-b">
                                    Belum ada data kos. Klik tombol hijau di atas untuk menambah.
                                </td>
                            </tr>
                            @endforelse
                    
                </tbody>
            </table>
        </div>
        <div x-show="showEditPropertyModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-75 backdrop-blur-sm p-4" x-transition.opacity>
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all" @click.away="showEditPropertyModal = false">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-teal-50"><h3 class="text-lg font-bold text-teal-800">Detail Kos</h3><button @click="showEditPropertyModal = false" class="text-gray-400 hover:text-gray-600">&times;</button></div>
            <div class="p-6 space-y-4" x-if="selectedProperty">
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div><p class="text-gray-400 font-bold uppercase text-xs">Nama Kos</p><p class="font-bold text-lg" x-text="selectedProperty.name"></p></div>
                    <div><p class="text-gray-400 font-bold uppercase text-xs">Status</p><p class="font-bold" x-text="selectedProperty.status"></p></div>
                    <div class="col-span-2"><p class="text-gray-400 font-bold uppercase text-xs">Alamat</p><p x-text="selectedProperty.address"></p></div>
                    <div><p class="text-gray-400 font-bold uppercase text-xs">Pemilik</p><p x-text="selectedProperty.owner_name"></p></div>
                    <div><p class="text-gray-400 font-bold uppercase text-xs">Harga</p><p>Rp <span x-text="selectedProperty.price"></span></p></div>
                </div>
                <div class="pt-4 border-t flex justify-between">
                    <form :action="'/kelola-kos/data/' + selectedProperty.id" method="POST" onsubmit="return confirm('Hapus Data Kos Ini?');">@csrf @method('DELETE')<button class="text-red-500 font-bold hover:text-red-700">Hapus</button></form>
                    <button @click="showEditPropertyModal = false" class="bg-gray-100 px-4 py-2 rounded">Tutup</button>
                </div>
            </div>
        </div>
    </div>
        <x-app-layout>
        </x-app-layout>
    </div>

</body>

</html>
