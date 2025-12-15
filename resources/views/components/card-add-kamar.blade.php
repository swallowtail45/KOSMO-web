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
        {{ $buttonText ?? 'Kelola Kamar' }}
    </button>

    {{-- overlay --}}
    <div 
        x-show="open" x-cloak
        x-transition.opacity
        @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40">
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
            <h2 class="text-xl font-semibold">Kelola Kamar</h2>
            <button @click="open = false" class="text-white text-2xl hover:text-gray-300">&times;</button>
        </div>

        {{-- form --}}
        <form method="POST" action="{{ route('room.store') }}" class="p-6 space-y-4">
                @csrf


            <div class="grid grid-cols-2 gap-4 mb-4">
            <!-- nama -->
                <div>
                    <label class="block mb-1">Nama Kamar</label>
                    <input type="text" name="name" class="w-full p-2 rounded bg-white text-black" required/>
                </div>
            <!-- properti -->
                <div>
                    <label class="block mb-1">Properti</label>
                    <input type="text" name="property_type" class="w-full p-2 rounded bg-white text-black" required/>
                </div>
            </div>
            <!-- penyewa -->
            <div class="mb-4">
                <label class="block mb-1">Penyewa</label>
                <input type="text" name="tenant_name" class="w-full p-2 rounded bg-white text-black" />
            </div>
            <!-- no telp -->
            <div class="mb-4">
                <label class="block mb-1">No. Telepon</label>
                <input type="text" name="tenant_phone" class="w-full p-2 rounded bg-white text-black" />
            </div>
            <!-- harga -->
            <div class="mb-4">
                <label class="block mb-1">Harga</label>
                <input type="number" name="price" class="w-full p-2 rounded bg-white text-black" />
            </div>
            <!-- tggl sewa -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block mb-1">Tanggal Sewa</label>
                    <input type="date" name="start_date" class="w-full p-2 rounded bg-white text-black" />
                </div>

                <!-- menu dropdown -->
                <div>
                    <label class="block mb-1">Status Sewa</label>
                    <select class="w-full p-2 rounded bg-white text-black" name="status">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Sudah Disewa">Sudah Disewa</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="px-5 py-2 bg-[#8be1d1] text-black rounded-lg ml-auto block">
                Tambah Kamar
            </button>

        </form>
    </div>

</div>
