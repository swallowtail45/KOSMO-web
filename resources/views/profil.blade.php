
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

<body class="bg-white" x-data="{ 
          tab: '{{ session('active_tab', 'akun') }}', 
          showAddModal: false,
          showDetailModal: false,
          selectedPayment: null 
      }">

    <div class="p-10 ml-20" >

        <!-- judul -->
        <div x-show="tab === 'akun'" x-cloak>
            <h1 class="text-3xl font-bold text-gray-900" x-show="tab === 'akun'" x-cloak>Profil</h1>
            <p class="text-gray-600 mt-1">Kelola Informasi Pribadi Anda</p>
        </div>
        <div x-show="tab === 'bayar'" x-cloak>
            <h1 class="text-3xl font-bold text-gray-900" x-show="tab === 'bayar'" x-cloak>Preferensi Pembayaran</h1>
            <p class="text-gray-600 mt-1">Kelola Preferensi Pembayaran Anda</p>
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

            
            <form method="post" action="{{ route('profile.update') }}" class="grid grid-cols-1 gap-6 max-w-10x0" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <!-- foto profil -->
                <div class="flex flex-col items-center mb-8">
        <div class="relative group">
            <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-200 border-4 border-white shadow-lg flex items-center justify-center">
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile" class="w-full h-full object-cover">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D1F33&color=fff&size=128" alt="Profile" class="w-full h-full object-cover">
                @endif
            </div>
            
            <label for="avatar-upload" class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow-md border border-gray-200 cursor-pointer hover:bg-gray-100 transition">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
    </svg>
                
                <input id="avatar-upload" name="avatar" type="file" class="hidden" accept="image/*" onchange="document.getElementById('send-btn').classList.remove('hidden');">
            </label>
        </div>
    </div>

                <!-- nama -->
                <div>
                    <x-input-label for="name" class="block text-gray-700 mb-1" :value="__('Nama')" />
                    <x-text-input 
                        id="name" 
                        name="name" 
                        type="text" 
                        class="w-full bg-gray-100 rounded-md px-4 py-2" 
                        :value="old('name', auth()->user()->name)" 
                        required 
                        autofocus 
                        autocomplete="name" 
                    /> 
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <!-- no hp -->
                <div>
                    <x-input-label for="phone" class="block text-gray-700 mb-1" :value="__('No HP')" />
                    <x-text-input 
                        id="phone" 
                        name="phone" 
                        type="text" 
                        class="w-full bg-gray-100 rounded-md px-4 py-2" 
                        :value="old('phone', auth()->user()->phone)" 
                    /> 
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>

                <!-- alamat + kode pos -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="address" class="block text-gray-700 mb-1" :value="__('Alamat')" />
                    <x-text-input 
                        id="address" 
                        name="address" 
                        type="text" 
                        class="w-full bg-gray-100 rounded-md px-4 py-2" 
                        :value="old('address', auth()->user()->address)" 
                    /> 
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>

                    <div>
                        <x-input-label for="postal_code" class="block text-gray-700 mb-1" :value="__('Kode Pos')" />
                    <x-text-input 
                        id="postal_code" 
                        name="postal_code" 
                        type="text" 
                        class="w-full bg-gray-100 rounded-md px-4 py-2" 
                        :value="old('postal_code', auth()->user()->postal_code)" 
                    /> 
                    <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                    </div>
                </div>

                <!-- provinsi + kota -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="province" class="block text-gray-700 mb-1" :value="__('Provinsi')" />
                    <x-text-input 
                        id="province" 
                        name="province" 
                        type="text" 
                        class="w-full bg-gray-100 rounded-md px-4 py-2" 
                        :value="old('province', auth()->user()->province)" 
                    /> 
                    <x-input-error class="mt-2" :messages="$errors->get('province')" />
                    </div>

                    <div>
                        <x-input-label for="city" class="block text-gray-700 mb-1" :value="__('Kota/Kab')" />
                    <x-text-input 
                        id="city" 
                        name="city" 
                        type="text" 
                        class="w-full bg-gray-100 rounded-md px-4 py-2" 
                        :value="old('city', auth()->user()->city)" 
                    /> 
                    <x-input-error class="mt-2" :messages="$errors->get('city')" />
                    </div>
                </div>

                <!-- Kecamatan + Kelurahan -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <x-input-label for="district" class="block text-gray-700 mb-1" :value="__('Kecamatan')" />
                    <x-text-input 
                        id="district" 
                        name="district" 
                        type="text" 
                        class="w-full bg-gray-100 rounded-md px-4 py-2" 
                        :value="old('district', auth()->user()->district)" 
                    /> 
                    <x-input-error class="mt-2" :messages="$errors->get('district')" />
                    </div>

                    <div>
                        <x-input-label for="village" class="block text-gray-700 mb-1" :value="__('Kelurahan')" />
                    <x-text-input 
                        id="village" 
                        name="village" 
                        type="text" 
                        class="w-full bg-gray-100 rounded-md px-4 py-2" 
                        :value="old('village', auth()->user()->village)" 
                    /> 
                    <x-input-error class="mt-2" :messages="$errors->get('village')" />
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button class="bg-kosmo-cyan text-slate-950 hover:bg-kosmo-lightcyan">
                        {{ __('Simpan') }}
                    </x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600"
                        >{{ __('Tersimpan.') }}</p>
                    @endif
                 </div>
            </form>

            <!-- secktion -->
            <div class="mt-12 max-w-10x0">
                <h2 class="text-gray-700 mb-4 font-bold border-b pb-5">Hapus Data</h2>

                <div class="grid grid-cols-2 gap-6">

                    <!-- hapus data penyewa -->
                    <div class="flex items-center justify-between pb-4">
                        <p>Hapus Semua Data Kamar</p>
                        <form action="{{ route('profile.destroy-rooms') }}" method="POST" onsubmit="return confirm('PERINGATAN: Anda yakin ingin menghapus SEMUA KAMAR? Data penyewa di dalamnya juga akan terhapus.');">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="bg-teal-500 text-white px-4 py-1 rounded hover:bg-teal-600">Hapus</button>
                        </form>
                    </div>

                    <!-- button hapaus semua data -->
                    <div class="flex items-center justify-between pb-4">
                        <p>Hapus Semua Data Kos</p>
                        <form action="{{ route('profile.destroy-kos') }}" method="POST" onsubmit="return confirm('PERINGATAN: Anda yakin ingin menghapus SEMUA DATA KOS?');">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="bg-teal-500 text-white px-4 py-1 rounded hover:bg-teal-600">Hapus</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- isi preferensi bayar -->
         
        <div x-show="tab === 'bayar'" x-cloak x-data class="mt-8 text-gray-800">

            <!-- Card Pembayaran -->
            <div class="mt-6 space-y-4">
        
                @if($user->paymentMethods->isEmpty())
                            <div class="text-center py-8 text-gray-400 bg-white rounded-lg border border-dashed border-gray-300">
                                Belum ada metode pembayaran tersimpan.
                            </div>
                        @else
                            @foreach($user->paymentMethods as $method)
                            <div class="flex items-stretch bg-white shadow-md rounded-xl overflow-hidden">
                                <div class="flex-1 p-4">
                                    <div class="flex items-center gap-3 mb-1">
                                        <span class="font-bold text-gray-800">QRIS</span>
                                        <span class="text-gray-600">|</span>
                                        <span class="text-gray-800 font-medium">{{ $method->account_name }}</span>
                                        @if($method->is_primary)
                                        <span class="bg-gray-200 text-gray-600 text-xs px-2 py-0.5 rounded font-bold border border-gray-300">
                                    Utama
                                </span>
                                    @endif
                                    </div>
                                    <span class="text-xs text-gray-400">ID: {{ $method->id }}</span>
                                </div>
                                
                                <div class="flex items-center h-full">
                                    
                                    <button @click='selectedPayment = @json($method); showDetailModal = true' type="button" class="w-14 flex items-center justify-center bg-teal-300 hover:bg-teal-400 transition">
                                        <svg width="38" height="95" viewBox="0 0 54 54" fill="none"
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

                                    <form action="{{ route('payment-method.destroy', $method->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus metode pembayaran ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-14 flex items-center justify-center bg-red-400 hover:bg-red-500 transition">
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
                                    </form>
                                    
                                </div>                
                            </div>                            
                            @endforeach
                        @endif
                        

                        
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

                
        <div x-show="showDetailModal" style="display: none;" 
                     class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
                     x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    
                    <div class="bg-white rounded-lg shadow-xl w-full max-w-sm mx-4 overflow-hidden" @click.away="showDetailModal = false">
                        
                        <div class="bg-kosmo-darkblue px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <h3 class="text-lg font-bold text-white">Detail Pembayaran</h3>
                            <button @click="showDetailModal = false" class="text-gray-500 hover:text-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>

                        <div class="p-6 text-center" x-if="selectedPayment">
                            
                            <template x-if="selectedPayment.is_primary">
                                <span class="bg-teal-100 text-teal-700 text-xs px-3 py-1 rounded-full font-bold mb-4 inline-block">METODE UTAMA</span>
                            </template>

                            
                            <p class="text-sm text-gray-500 mb-6" x-text="selectedPayment.account_name"></p>

                            <div class="bg-white p-2 border border-gray-200 rounded-lg shadow-sm inline-block mb-4">
                                <template x-if="selectedPayment.qr_code">
                                    
                                    <img :src="'/storage/' + selectedPayment.qr_code" class="w-48 h-48 object-cover rounded-md">
                                </template>
                                <template x-if="!selectedPayment.qr_code">
                                    <div class="w-48 h-48 flex items-center justify-center bg-gray-100 rounded-md">
                                        <div class="text-gray-400">Kode QR tidak tersedia</div>
                                </template>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                
        <x-app-layout>
        </x-app-layout>
    

</body>

</html>
