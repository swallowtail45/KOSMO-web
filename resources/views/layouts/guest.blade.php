<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-t">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'KOSMO') }}</title>


        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="text-gray-900 antialiased">
        
        <div class="min-h-screen flex flex-col sm:flex-row">

            <div class="sm:w-1/2 bg-gray-100 flex flex-col justify-between p-8 md:p-12">
                
                <div>
                    <a href="/" class="text-3xl font-extrabold text-kosmo-dark">
                        KOSMO
                    </a>
                </div>
                
                <div class="flex-grow flex items-center justify-center py-12">
                    {{ $leftPanel }}
                </div>
                
                <div>
                    <p class="text-sm text-gray-600">Copyright &copy; 2025, KOSMO, All Rights Reserved.</p>
                </div>
            </div>

            <div class="sm:w-1/2 bg-kosmo-darkblue flex items-center justify-center p-8 md:p-12">
                <div class="w-full max-w-md">
                    {{ $slot }} </div>
            </div>

        </div>
    </body>
</html>