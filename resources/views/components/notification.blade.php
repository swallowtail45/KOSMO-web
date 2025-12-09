<div x-data="{ open: false }">

    <!-- lonceng -->
    <button @click="open = true" class="text-xl pl-12">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M7.99999 14.6667C8.73332 14.6667 9.33332 14.0667 9.33332 13.3334H6.66666C6.66666 14.0667 7.25999 14.6667 7.99999 14.6667ZM12 10.6667V7.33342C12 5.28675 10.9067 3.57341 8.99999 3.12008V2.66675C8.99999 2.11341 8.55332 1.66675 7.99999 1.66675C7.44666 1.66675 6.99999 2.11341 6.99999 2.66675V3.12008C5.08666 3.57341 3.99999 5.28008 3.99999 7.33342V10.6667L2.66666 12.0001V12.6667H13.3333V12.0001L12 10.6667Z"
                fill="#323232" />
        </svg>
    </button>


    <!-- overlay -->
    <div x-show="open" x-transition.opacity x-cloak @click="open = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <!-- card -->
    <div x-show="open" x-transition x-cloak
        class="fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2
                bg-white p-6 rounded-xl shadow-xl w-[400px]">

        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">notification</h2>
            <button @click="open = false" class="text-2xl">&times;</button>
        </div>
        <!-- apa buat/dijadii tabel? -->
        <p class="mt-3 text-gray-600">notif</p>
    </div>

</div>
