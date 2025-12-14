<div x-data="{ open: false }">
    <div class="fixed top-0 left-0 border-r border-gray-200 bg-white text-gray-800 h-screen transition-all duration-300 flex flex-col justify-between"
        :class="open ? 'w-64' : 'w-16'" x-cloak>

        <div><!-- nama app -->
            <div class="flex items-center justify-between p-4">
                <h1 class="text-xl font-bold text-black-600 flex items-center cursor-pointer" x-show="open"
                    @click="open = !open">
                    Kosmo
                </h1>

                <!-- hamburger menu/logo K (nnti) -->
                <button @click="open = !open" class="text-gray-500 hover:text-blue-600 transition" x-show="!open"
                    :class="{ 'ml-auto': !open }">
                    <svg width="38" height="47" viewBox="0 0 38 47" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect y="5.8938" width="11.6952" height="35.2958" fill="#616161" />
                        <path
                            d="M0.760945 29.0988C2.57189 26.2505 5.46215 24.1793 8.97735 23.2106C12.4925 22.2419 16.4333 22.4308 20.1802 23.7476C23.927 25.0643 27.2674 27.4342 29.6763 30.4848C32.0851 33.5353 33.4646 37.683 33.5263 41.1894L21.4413 41.1894L21.4586 39.1798C21.4396 38.1 21.0267 37.0043 20.2849 36.0649C19.5431 35.1256 18.5145 34.3958 17.3607 33.9903C16.2069 33.5848 14.9934 33.5266 13.9109 33.8249C12.8284 34.1232 11.9384 34.761 11.3807 35.6381L0.760945 29.0988Z"
                            fill="#616161" />
                        <path
                            d="M0.779538 17.8571C2.59049 20.7054 5.48075 22.7767 8.99594 23.7453C12.5111 24.714 16.4519 24.5251 20.1988 23.2084C23.9456 21.8916 27.286 19.5217 29.6949 16.4712C32.1037 13.4206 33.4646 9.40016 33.5263 5.89378L21.4772 5.8938L21.4772 7.77615C21.4582 8.8559 21.0453 9.9516 20.3035 10.891C19.5617 11.8304 18.5331 12.5602 17.3793 12.9656C16.2255 13.3711 15.012 13.4293 13.9295 13.131C12.847 12.8327 11.957 12.1949 11.3993 11.3178L0.779538 17.8571Z"
                            fill="#616161" />
                    </svg>
                </button>
            </div>

            <!-- logo profil -->
            <div class="flex p-4 border-b border-gray-100 mb-6 items-center"
                :class="{ 'justify-center': !open, 'justify-start': open }"><a href="{{ route('profile.edit') }}">
                <div class="bg-gray-200 rounded-full transition-all duration-300"
                    :class="{
                        'h-12 w-12 mr-3': open,
                        'h-8 w-8': !open
                    }">
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile" class="rounded-full h-full w-full object-cover">
                    
                   
                </div> </a>
                <!-- nama profil -->
                <div x-show="open">
                    <p class="font-semibold text-sm">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">Mengelola 1 kos</p>
                </div>

                {{-- lonceng --}}
                <div x-show="open" x-transition x-cloak>
                    <x-notification />
                </div>
            </div>

            <nav class="space-y-10 px-5 mt-2">

                {{-- dashboard --}}
                <a href="{{ route('dashboard') }}" class="block w-full">
                    <div class="flex items-center w-full
                        @if (request()->routeIs('dashboard')) is-active-nav @endif"
                        @class([
                            'p-3 text-gray-600 rounded-lg' => !request()->routeIs('dashboard'),
                        ])>
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_59_92)">
                                <path
                                    d="M3.25 14.0833H11.9167V3.25H3.25V14.0833ZM3.25 22.75H11.9167V16.25H3.25V22.75ZM14.0833 22.75H22.75V11.9167H14.0833V22.75ZM14.0833 3.25V9.75H22.75V3.25H14.0833Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_59_92">
                                    <rect width="26" height="26" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <span x-show="open" class="ml-3">Dashboard</span>
                    </div>
                </a>

                {{-- kelola --}}
                <a href="{{ route('kelola-kos') }}" class="block w-full">
                    <div class="flex items-center w-full
                        @if (request()->routeIs('kelola-kos')) is-active-nav @endif"
                        @class([
                            'p-2 text-gray-600 rounded-lg' => !request()->routeIs('kelola-kos'),
                        ])>
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_59_90)">
                                <path
                                    d="M20.5833 3.25H5.41667C4.225 3.25 3.25 4.225 3.25 5.41667V20.5833C3.25 21.775 4.225 22.75 5.41667 22.75H20.5833C21.775 22.75 22.75 21.775 22.75 20.5833V5.41667C22.75 4.225 21.775 3.25 20.5833 3.25ZM9.75 18.4167H7.58333V10.8333H9.75V18.4167ZM14.0833 18.4167H11.9167V7.58333H14.0833V18.4167ZM18.4167 18.4167H16.25V14.0833H18.4167V18.4167Z"
                                    fill="#323232" />
                            </g>
                            <defs>
                                <clipPath id="clip0_59_90">
                                    <rect width="26" height="26" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <span x-show="open" class="ml-3">Kelola</span>
                    </div>
                </a>

                {{-- reminder --}}
                <a href="{{ route('reminder') }}" class="block w-full">
                    <div class="flex items-center w-full transition duration-150 ease-in-out
                        @if (request()->routeIs('reminder')) is-active-nav @endif"
                        @class([
                            'p-2 text-gray-600 rounded-lg' => !request()->routeIs('#'),
                        ])>
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_59_91)">
                                <path
                                    d="M18.4167 13H13V18.4166H18.4167V13ZM17.3333 1.08331V3.24998H8.66667V1.08331H6.5V3.24998H5.41667C4.21417 3.24998 3.26083 4.22498 3.26083 5.41665L3.25 20.5833C3.25 21.775 4.21417 22.75 5.41667 22.75H20.5833C21.775 22.75 22.75 21.775 22.75 20.5833V5.41665C22.75 4.22498 21.775 3.24998 20.5833 3.24998H19.5V1.08331H17.3333ZM20.5833 20.5833H5.41667V8.66665H20.5833V20.5833Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_59_91">
                                    <rect width="26" height="26" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <span x-show="open" class="ml-3">Reminder</span>
                    </div>
                </a>
                {{-- profil --}}
                <a href="{{ route('profile.edit') }}" class="block w-full">
                    <div class="flex items-center p- hover:bg-gray-100 active:bg-gray-200 transition duration-150 ease-in-out
                        @if (request()->routeIs('profil')) is-active-nav @endif"
                        @class([
                            'p-2 text-gray-600 rounded-lg' => !request()->routeIs('#'),
                        ])>
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_59_93)">
                                <path
                                    d="M13 13C15.3942 13 17.3333 11.0608 17.3333 8.66665C17.3333 6.27248 15.3942 4.33331 13 4.33331C10.6058 4.33331 8.66667 6.27248 8.66667 8.66665C8.66667 11.0608 10.6058 13 13 13ZM13 15.1666C10.1075 15.1666 4.33334 16.6183 4.33334 19.5V21.6666H21.6667V19.5C21.6667 16.6183 15.8925 15.1666 13 15.1666Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_59_93">
                                    <rect width="26" height="26" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <span x-show="open" class="ml-5">Profil</span>
                    </div>
                </a>

            </nav>
        </div>

        {{-- logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="p-1 border-t border-gray-100">
                <a href="route('logout')"
                    class="flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 active:bg-gray-200 transition"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_62_986)">
                            <path
                                d="M7.58333 7.58333L9.11083 9.11083L6.31583 11.9167H17.3333V14.0833H6.31583L9.11083 16.8783L7.58333 18.4167L2.16666 13L7.58333 7.58333ZM21.6667 5.41667H13V3.25H21.6667C22.8583 3.25 23.8333 4.225 23.8333 5.41667V20.5833C23.8333 21.775 22.8583 22.75 21.6667 22.75H13V20.5833H21.6667V5.41667Z"
                                fill="#323232" />
                        </g>
                        <defs>
                            <clipPath id="clip0_62_986">
                                <rect width="26" height="26" fill="white"
                                    transform="matrix(-1 0 0 1 26 0)" />
                            </clipPath>
                        </defs>
                    </svg>

                    <span x-show="open" class="ml-3">Log Out</span>

                </a>
            </div>
        </form>
    </div>
</div>
