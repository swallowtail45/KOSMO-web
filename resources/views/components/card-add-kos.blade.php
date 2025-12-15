<style>
    [x-cloak] {
        display: none !important;
    }
</style>
<div x-data="{ open: false }">

    {{-- button open --}}
    <button 
        @click="open = true"
        class="px-4 py-2 bg-teal-600 text-white rounded-md shadow hover:bg-teal-700 transition">
        {{ $buttonText ?? 'Kelola Kos' }}
    </button>

    {{-- overlay --}}
    <div 
        x-show="open" 
        x-transition.opacity
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40"x-cloak>
    </div>

    {{-- card --}}
    <div 
        x-show="open" x-cloak
        x-transition
        class="fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
               w-[430px] rounded-2xl shadow-2xl
               bg-gradient-to-br from-[#0f172a] to-[#1e3a8a] 
               text-white p-6">

        {{-- header --}}
        <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
            <h2 class="text-xl font-semibold">Kelola Kos</h2>
            <button @click="open = false" class="text-white text-2xl hover:text-gray-300">&times;</button>
        </div>

        {{-- form --}}
        <form method="POST" action="{{ route('property.store') }}" class="p-6 space-y-4">
                @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
            <!-- nama -->
                <div>
                    <label class="block mb-1">Nama Kos</label>
                    <input type="text" name="name" class="w-full p-2 rounded bg-white text-black" required/>
                </div>
            <!-- pemilik -->
                <div>
                    <label class="block mb-1">Pemilik</label>
                    <input type="text" name="owner_name" class="w-full p-2 rounded bg-white text-black" required/>
                </div>
            </div>
            <!-- alamat -->
            <div class="mb-4">
                <label class="block mb-1">Alamat</label>
                <input type="text" name="address" class="w-full p-2 rounded bg-white text-black" required/>
            </div>
            <!-- no telp -->
            <div class="mb-4">
                <label class="block mb-1">No. Telepon</label>
                <input type="text" name="owner_phone" class="w-full p-2 rounded bg-white text-black" required/>
            </div>
            <!-- harga -->
            <div class="mb-4">
                <label class="block mb-1">Harga</label>
                <input type="number" name="price" class="w-full p-2 rounded bg-white text-black" required/>
            </div>
            <!-- jmlh kamar -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block mb-1">Jumlah Kamar</label>
                    <input type="text" name="room_total" class="w-full p-2 rounded bg-white text-black" required/>
                </div>

                <!-- menu dropdown -->
                <div>
                    <label class="block mb-1">Status Kos</label>
                    <select name="status" class="w-full p-2 rounded bg-white text-black" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="px-5 py-2 bg-[#8be1d1] text-black rounded-lg ml-auto block">
                Tambah Kos
            </button>

        </form>
    </div>

</div>
