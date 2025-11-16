<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KOSMO : Kos Mobile</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800">

    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-900">
                KOSMO
            </a>

            <div class="space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 bg-kosmo-cyan text-white px-4 py-2 rounded-md hover:bg-kosmo-lightcyan transition duration-300">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <header class="bg-white py-20 md:py-32"> <div class="container mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-12">
        
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Buat semua urusan   <br class="hidden md:inline"> <a class="text-kosmo-cyan">kosmu </a>hanya dalam <br class="hidden md:inline"> <a class="text-kosmo-cyan">satu genggaman!</a>
            </h1>
            <p class="text-xl text-gray-700 mb-8 max-w-lg md:max-w-none mx-auto md:mx-0">
                Solusi inovatif untuk Kelola kos menjadi lebih mudah dan praktis, dirancang dengan fokus pada pengalaman pengguna.
            </p>
            <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                <a href="#features" class="bg-kosmo-cyan text-white text-lg font-semibold px-8 py-4 rounded-lg shadow-lg hover:bg-kosmo-lightcyan transition duration-300 transform hover:scale-105">
                    Kelola Sekarang!
                </a>
            </div>
        </div>

        <div class="md:w-1/2 mt-12 md:mt-0 flex justify-center">
            <img 
                src="{{ asset('images/landing_page1.png') }}" 
                alt="Ilustrasi Proyek Anda" 
                class="max-w-full h-auto w-auto max-h-[400px]"
            >
            </div>

    </div>
</header>

    <section class="py-20 bg-gradient-to-br from-kosmo-darkblue to-kosmo-blue">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-white mb-12">
                Fitur Unggulan Kami
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 pt-20">
                
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transition duration-300 transform hover:scale-105">
                    <div class="text-blue-600 mb-4 -mt-40">
                        <img 
                            src="{{ asset('images/landing_page2.png') }}" 
                            alt="Ilustrasi Proyek Anda" 
                            class="max-w-full h-auto w-auto max-h-[20x]"
                        >
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Cepat & Efisien</h3>
                    <p class="text-gray-600">
                        Pembukuan digital tanpa perlu repot. Pembukuan otomatis oleh sistem tiap bulannya.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center transition duration-300 transform hover:scale-105">
                    <div class="text-blue-600 mb-4 -mt-40">
                        <img 
                            src="{{ asset('images/landing_page3.png') }}" 
                            alt="Ilustrasi Proyek Anda" 
                            class="max-w-full h-auto w-auto max-h-[20x]"
                        >
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Desain Modern</h3>
                    <p class="text-gray-600">
                        Tambah kamar, properti, dan biaya tambahan lainnya hanya dalam satu kali klik.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-lg text-center transition duration-300 transform hover:scale-105">
                    <div class="text-blue-600 mb-4 -mt-40">
                        <img 
                            src="{{ asset('images/landing_page4.png') }}" 
                            alt="Ilustrasi Proyek Anda" 
                            class="max-w-full h-auto w-auto max-h-[20x]"
                        >
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Aman Terpercaya</h3>
                    <p class="text-gray-600">
                        Pengingat masa tenggang. Pengingat otomatis untuk semua penyewa.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 md:py-32">
    <div class="container mx-auto px-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

            <div class="flex justify-center">
                <img 
                  src="{{ asset('images/landing_page5.png') }}" 
                  alt="Ilustrasi Frequently Asked Questions"
                  class="w-full max-w-md"
                >
            </div>

            <div>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4">
                    Frequently Asked Question
                </h2>
                <p class="text-lg text-gray-600 mb-10">
                    Pertanyaan yang sering ditanyakan oleh pengguna baru KOSMO :
                </p>

                <div class="space-y-4">

                    <details class="group border-b border-gray-200 py-5">
                        <summary class="flex justify-between items-center cursor-pointer list-none">
                            <span class="text-xl font-semibold text-gray-900">
                                Aplikasi Manajemen Kos untuk apa?
                            </span>
                            <span class="group-open:rotate-180 transition-transform duration-300">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <p class="mt-4 text-base text-gray-600">
                            KOSMO adalah aplikasi yang dirancang untuk membantu pemilik kos mengelola properti mereka, mulai dari pelacakan pembayaran, manajemen penyewa, hingga laporan keuangan bulanan.
                        </p>
                    </details>

                    <details class="group border-b border-gray-200 py-5">
                        <summary class="flex justify-between items-center cursor-pointer list-none">
                            <span class="text-xl font-semibold text-gray-900">
                                Mengapa KOSMO ada?
                            </span>
                            <span class="group-open:rotate-180 transition-transform duration-300">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <p class="mt-4 text-base text-gray-600">
                            Kami melihat banyaknya kesulitan yang dihadapi pemilik kos dalam manajemen manual. KOSMO hadir untuk mendigitalisasi proses tersebut, membuatnya lebih efisien, transparan, dan mengurangi kesalahan manusia.
                        </p>
                    </details>

                    <details class="group border-b border-gray-200 py-5">
                        <summary class="flex justify-between items-center cursor-pointer list-none">
                            <span class="text-xl font-semibold text-gray-900">
                                Kapan KOSMO berdiri?
                            </span>
                            <span class="group-open:rotate-180 transition-transform duration-300">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <p class="mt-4 text-base text-gray-600">
                            KOSMO didirikan pada awal tahun 2025 dengan misi untuk merevolusi industri manajemen properti skala kecil dan menengah di Indonesia.
                        </p>
                    </details>

                    <details classs="group border-b border-gray-200 py-5">
                        <summary class="flex justify-between items-center cursor-pointer list-none">
                            <span class="text-xl font-semibold text-gray-900">
                                Kenapa saya harus menggunakan KOSMO?
                            </span>
                            <span class="group-open:rotate-180 transition-transform duration-300">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </summary>
                        <p class="mt-4 text-base text-gray-600">
                            Dengan KOSMO, Anda menghemat waktu administrasi, mengurangi risiko telat bayar, memiliki laporan keuangan yang rapi, dan dapat memantau bisnis kos Anda dari mana saja dan kapan saja.
                        </p>
                    </details>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="relative bg-white py-20 md:py-32 overflow-hidden">

    <div class="absolute top-0 left-0 -translate-x-1/4 -translate-y-1/4 opacity-20 pointer-events-none z-0" aria-hidden="true">
        <svg width="500" height="500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50 L400 150 L200 400 Z" stroke="#0D1F33" stroke-width="2"/>
            <rect x="50" y="250" width="300" height="100" rx="50" stroke="#0D1F33" stroke-width="2"/>
        </svg>
    </div>
    <div class="absolute bottom-0 right-0 translate-x-1/4 translate-y-1/4 opacity-20 pointer-events-none z-0" aria-hidden="true">
        <svg width="500" height="500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="250" cy="250" r="200" stroke="#0D1F33" stroke-width="2"/>
            <path d="M300 250 L450 350 L250 450 Z" stroke="#0D1F33" stroke-width="2"/>
        </svg>
    </div>


    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            
            <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight bg-gradient-to-br from-kosmo-darkblue to-kosmo-blue text-transparent bg-clip-text pb-6">
                Buat semua urusan <br>kosmu hanya dalam <br>satu genggaman
            </h2>

            <div class="mt-14 relative inline-block">
                
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[105%] h-[120%] border-2 border-gray-400 rounded-lg transform -rotate-3 z-0" aria-hidden="true"></span>
                
                <a href="#" class="relative z-10 inline-block bg-kosmo-cyan text-teal-900 font-bold text-lg px-10 py-4 rounded-lg shadow-md hover:bg-kosmo-lightcyan transition duration-300 transform hover:scale-105 active:scale-95">
                    Kelola Sekarang
                </a>
            </div>

        </div>
    </div>
</section>
    
    <footer class="bg-white"> <div class="bg-gray-900 text-gray-300 py-16">
        <div class="container mx-auto px-6">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">

                <div class="md:col-span-2">
                    <h3 class="text-3xl font-bold text-white mb-4">KOSMO</h3>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Aplikasi manejemen kos berbasis digital yang membantu memudahkan manejemenisasi keuangan kos bulanan.
                    </p>
                    
                    <div class="flex space-x-5 mb-6">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <span class="sr-only">X (Twitter)</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231L18.244 2.25zM17.08 19.77h1.566L7.05 4.126H5.407l11.673 15.644z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <span class="sr-only">GitHub</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.418 2.865 8.165 6.839 9.49.5.092.682-.217.682-.483 0-.237-.009-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.03-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.026 2.747-1.026.546 1.379.202 2.398.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.001 10.001 0 0022 12c0-5.523-4.477-10-10-10z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                    
                    <a href="#" class="inline-flex items-center text-sm text-gray-400 hover:text-white transition duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                        Back to top
                    </a>
                </div>

                <div>
                    <h4 class="text-lg font-semibold text-white mb-5">Site map</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Homepage</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">FAQ</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Partners</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Contact Us</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">About us</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold text-white mb-5">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition duration-300">Terms of Services</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-cyan-400 text-gray-900 py-4">
        <div class="container mx-auto px-6 text-center">
            <p class="text-sm font-medium">
                Copyright &copy; 2025, KOSMO, All Rights Reserved.
            </p>
        </div>
    </div>

</footer>

</body>
</html>