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
                <!-- nama -->
                <div>
                    <label class="block mb-1">Upload QR Code</label>
                    <!-- btn buat upload qr -->
                    <button type="button" @click.stop
                        class="w-full bg-white shadow-md rounded-xl py-5 flex flex-col items-center justify-center text-4xl text-gray-700">
                        +
                        <span class="text-sm text-gray-500">Upload QR Code</span>
                    </button>
                </div>
                <!-- properti -->

            </div>
            <div class="mb-4">
                <label class="block mb-1">Nama Pembayaran</label>
                <input type="text" class="w-full p-2 rounded bg-white text-black" />
            </div>
            <!-- menu dropdown -->
            <div class="mb-4">
                <label class="block mb-1">Tingkat Level</label>
                <select class="w-full p-2 rounded bg-white text-black">
                    <option value="kosong">Utama</option>
                    <option value="disewa">Sekunder</option>
                </select>
            </div> 
            <button class="mb-4 px-5 py-2 bg-[#8be1d1] text-black rounded-lg ml-auto block">
                Tambah
            </button>
    </div>



    </form>
</div>

</div>
