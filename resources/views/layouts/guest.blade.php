<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KOSMO') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-900 antialiased">

    <div class="min-h-screen w-full bg-cover bg-center bg-no-repeat flex flex-col"
        style="background-image: url('images/bg_.png');">

        <!-- HEADER -->
        <header class="p-8">
            <a href="/" class="text-3xl font-extrabold text-black">
                KOSMO
            </a>
        </header>

        <!-- MAIN CONTENT WRAPPER -->
        <main class="flex-grow flex items-center justify-between px-8">

            <!-- LEFT PANEL -->
            <div class="w-full max-w-md p-6 rounded-xl bg-transparent">
                {{ $leftPanel }}
            </div>

            <!-- RIGHT PANEL -->
            <div class="w-full max-w-md mr-10 p-0 rounded-xl bg-transparent">
                {{ $slot }}
            </div>

        </main>

        <!-- FOOTER -->
        <footer class="p-8 text-black text-sm">
            Copyright &copy; 2025, KOSMO, All Rights Reserved.
        </footer>

    </div>

</body>

</html>
