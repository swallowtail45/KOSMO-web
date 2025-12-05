<style>
    [x-cloak] {
        display: none !important;
    }
</style>
<div x-data="{ open: false }"> 

    {{-- button open --}}
    <button @click="open = true"
        class="w-full bg-white shadow-md rounded-xl py-10 flex items-center justify-center hover:bg-gray-50 text-4xl text-gray-700">
        {{ $buttonText ?? '+' }}
    </button>

    {{-- overlay --}}
    <div x-show="open" x-transition.opacity @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-40" x-cloak>
    </div>

    {{-- card --}}
    <div x-show="open" x-transition x-cloak
        class="fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
               w-[430px] rounded-2xl shadow-2xl
               bg-gradient-to-br from-[#0f172a] to-[#1e3a8a] 
               text-white p-6">

        {{-- header --}}
        <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
            <h2 class="text-xl font-semibold">Preferensi Pembayaran</h2>
            <button @click="open = false" class="text-white text-2xl hover:text-gray-300">&times;</button>
        </div>

        {{-- form --}}
        <form>
            <div class="mb-4">
                <label class="block mb-1">Nama Pengingat</label>
                <input type="text" class="w-full p-2 rounded bg-white text-black" />
            </div>
            <div class="mb-4">
                <label class="block mb-1">Pesan</label>
                <textarea
                    class="w-full p-3 rounded-lg bg-white text-black border border-gray-300 focus:outline-none focus:ring focus:ring-blue-300"
                    rows="4" placeholder="Masukkan deskripsi pembayaran..."></textarea>
            </div>
            <!-- menu dropdown -->
            <div class="mb-4">
                <label class="block mb-1">No. Telepon Penyewa</label>
                <input type="text" class="w-full p-2 rounded bg-white text-black" />
            </div>
            <button class="mb-4 px-5 py-2 bg-[#8be1d1] text-black rounded-lg ml-auto block">
                Tambah
            </button>
    </div>

    </form>
</div>

</div>
