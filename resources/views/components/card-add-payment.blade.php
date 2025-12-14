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
    <div x-show="open" x-transition.opacity @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-40"
        x-cloak>
    </div>

    {{-- card --}}
    <div x-show="open" x-transition x-cloak class="fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 
               w-[430px] rounded-2xl shadow-2xl
               bg-gradient-to-br from-[#0f172a] to-[#1e3a8a] 
               text-white p-6">

        {{-- header --}}
        <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-6">
            <h2 class="text-xl font-semibold">Preferensi Pembayaran</h2>
            <button @click="open = false" class="text-white text-2xl hover:text-gray-300">&times;</button>
        </div>

        {{-- form --}}
        <form method="POST" action="{{ route('payment-method.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">

                <!-- nama -->
                <x-input-label for="qr_code" value="Upload QR Code" />
                <div class="mt-1 flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-6 h-6 text-gray-800 dark:text-slate" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 12h14m-7 7V5" />
                            </svg>

                            <p class="text-sm text-gray-500"><span class="font-semibold">Klik untuk upload</span> gambar
                                QR</p>
                        </div>
                        <input id="dropzone-file" name="qr_code" type="file" class="hidden" accept="image/*" />
                    </label>
                </div>
                <!-- properti -->

            </div>
            <div class="mb-4">
                <x-input-label for="account_name" value="Nama Pembayaran" class="block mb-1 text-white" />
                <x-text-input id="account_name" class="w-full p-2 rounded bg-white text-black" type="text"
                    name="account_name" placeholder="Nama Pembayaran" required />
            </div>
            <!-- menu dropdown -->
            <div class="mb-4">
                <x-input-label for="is_primary" value="Prioritas Pembayaran" class="block mb-1 text-white" />
                <select id="is_primary" name="is_primary" class="w-full p-2 rounded bg-white text-black">
                    <option value="1">Utama</option>
                    <option value="0">Sekunder</option>
                </select>
            </div>
            <button type="submit" class="mb-4 px-5 py-2 bg-[#8be1d1] text-black rounded-lg ml-auto block">
                Tambah
            </button>
    </div>



    </form>
</div>

</div>