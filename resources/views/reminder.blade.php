<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white" x-data="{ 
          showAddModal: false,
          showDetailModal: false,
          selectedReminder: null
      }">

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

                @if($reminders->isEmpty())
                            <div class="text-center py-8 text-gray-400 bg-white rounded-lg border border-dashed border-gray-300">
                                Belum ada pengingat tersimpan.
                            </div>
                        @else
                            @foreach($reminders as $reminder)
                            <div class="flex items-stretch bg-white shadow-md rounded-xl overflow-hidden">
                                <div class="flex-1 p-4">
                                    <div class="flex items-center gap-3 mb-1">
                                        <span class="font-bold text-gray-800">{{ $reminder->title }}</span>
                                        <span class="text-gray-600">|</span>
                                        <span class="text-gray-800 font-medium">{{ $reminder->description }}</span>
                                    </div>
                                    <p>Status Reminder : <span class="{{ $reminder->status == 'Aktif' ? 'text-green-600 font-bold' : 'text-red-500' }}">{{ $reminder->status }}</span></p>
                                    <p>Media Reminder : {{ $reminder->media }}</p>
                                </div>
                                
                                <div class="flex items-center h-full">
                                    
                                    <button @click='selectedReminder = @json($reminder); showDetailModal = true' type="button" class="w-14 flex items-center justify-center bg-teal-300 hover:bg-teal-400 transition">
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

                                    <form action="{{ route('reminder.destroy', $reminder->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengingat ini?');">
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
<div x-show="showDetailModal" style="display: none;" 
         class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-75 backdrop-blur-sm p-4"
         x-transition.opacity>
        
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all"
             @click.away="showDetailModal = false"
             x-transition:enter="ease-out duration-300" x-transition:enter-start="scale-90 opacity-0" x-transition:enter-end="scale-100 opacity-100">
             
             <div class="bg-kosmo-darkblue p-6">
                <h3 class="text-white text-xl font-bold">Detail Pengingat</h3>
             </div>

             <div class="p-6" x-if="selectedReminder">
                <div class="space-y-4">
                    <div>
                        <label class="text-xs text-gray-400 font-bold uppercase tracking-wide">Judul</label>
                        <p class="text-lg font-semibold text-gray-800" x-text="selectedReminder.title"></p>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 font-bold uppercase tracking-wide">Deskripsi</label>
                        <p class="text-gray-700" x-text="selectedReminder.description"></p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs text-gray-400 font-bold uppercase tracking-wide">Media</label>
                            <p class="font-medium text-teal-600" x-text="selectedReminder.media"></p>
                        </div>
                        <div>
                            <label class="text-xs text-gray-400 font-bold uppercase tracking-wide">Status</label>
                            <span class="px-2 py-1 rounded text-xs font-bold"
                                  :class="selectedReminder.status == 'Aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'"
                                  x-text="selectedReminder.status">
                            </span>
                        </div>
                    </div>
                </div>

                <button @click="showDetailModal = false" class="w-full mt-6 bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-3 rounded-lg transition">
                    Tutup
                </button>
</body>

</html>
