<x-guest-layout>
    <x-slot name="leftPanel">
        <div class="max-w-md text-left">
            <h1 class="text-5xl font-extrabold leading-tight">
                <span class="text-gray-900">Mulai kelola</span>
                <span class="text-cyan-600">kosmu</span>
                <span class="block text-gray-900">hanya dalam</span>
                <span class="text-cyan-600">satu</span>
                <span class="block text-gray-900">genggaman</span>
            </h1>
        </div>
    </x-slot>

    <form method="POST" action="{{ route('complete-profile.store') }}">
        @csrf
        @method('PUT') <div class="mb-4">
            <label class="block font-medium text-sm text-gray-300">Nama</label>
            <input type="text" value="{{ auth()->user()->name }}" disabled class="block mt-1 w-full rounded-md shadow-sm bg-gray-700 text-gray-400 border-gray-600 cursor-not-allowed">
        </div>

        <div class="mb-4">
            <label for="phone" class="block font-medium text-sm text-gray-300">No tlp</label>
            <input id="phone" type="text" name="phone" required class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:ring-teal-500 focus:border-teal-500">
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="col-span-1">
                <label for="address" class="block font-medium text-sm text-gray-300">Alamat</label>
                <input id="address" type="text" name="address" required class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:ring-teal-500 focus:border-teal-500">
            </div>
            <div class="col-span-1">
                <label for="postal_code" class="block font-medium text-sm text-gray-300">Kode Pos</label>
                <input id="postal_code" type="text" name="postal_code" required class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:ring-teal-500 focus:border-teal-500">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="col-span-1">
                <label for="province" class="block font-medium text-sm text-gray-300">Provinsi</label>
                <input id="province" type="text" name="province" required class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:ring-teal-500 focus:border-teal-500">
            </div>
            <div class="col-span-1">
                <label for="city" class="block font-medium text-sm text-gray-300">Kota/Kab</label>
                <input id="city" type="text" name="city" required class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:ring-teal-500 focus:border-teal-500">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-8">
            <div class="col-span-1">
                <label for="district" class="block font-medium text-sm text-gray-300">Kecamatan</label>
                <input id="district" type="text" name="district" required class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:ring-teal-500 focus:border-teal-500">
            </div>
            <div class="col-span-1">
                <label for="village" class="block font-medium text-sm text-gray-300">Kelurahan</label>
                <input id="village" type="text" name="village" required class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:ring-teal-500 focus:border-teal-500">
            </div>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-bold text-kosmo-dark bg-kosmo-cyan hover:bg-kosmo-lightcyan transition duration-300">
                SIGN UP
            </button>
        </div>
    </form>
</x-guest-layout>