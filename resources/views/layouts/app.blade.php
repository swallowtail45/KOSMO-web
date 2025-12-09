<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- style aktif button -->
        <style>
        .is-active-nav {
            background-color: #e0e7ffff; 
            color: #4338ca;        
            font-weight: 600;      
            padding: 8px;          
            padding-left: 1px;     
            padding-right: 1px;    
            padding-top: 8px;      
            border-radius: 8px;     
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1); 
            }
            [x-cloak] {
        display: none !important;
        }
</style>
    </head>
    <body class="font-sans antialiased">
        <x-sidebar />
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                 @yield('content')
            </main>
    </body>
</html>
