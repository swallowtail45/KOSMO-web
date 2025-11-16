<x-guest-layout>
    
    <x-slot name="leftPanel">
        <div class="max-w-md text-left">
            <h1 class="text-5xl font-bold leading-tight">
                <span class="text-gray-900">Mulai kelola</span>
                <span class="text-cyan-600">kosmu</span>
                <span class="block text-gray-900">hanya dalam</span>
                <span class="text-cyan-600">satu</span>
                <span class="block text-gray-900">genggaman</span>
            </h1>
        </div>
    </x-slot>

    <h1 class="text-3xl font-bold text-white mb-8">
        Register
    </h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" class="block font-medium text-sm text-gray-300">Name</label>
            <input 
                id="name" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name" 
                class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="email" class="block font-medium text-sm text-gray-300">Email</label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autocomplete="username" 
                class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password" class="block font-medium text-sm text-gray-300">Password</label>
            <input 
                id="password" 
                type="password" 
                name="password" 
                required 
                autocomplete="new-password"
                class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-300">Verify Password</label>
            <input 
                id="password_confirmation" 
                type="password" 
                name="password_confirmation" 
                required 
                autocomplete="new-password"
                class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-8">
            <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-bold text-kosmo-darkblue bg-kosmo-cyan hover:bg-kosmo-lightcyan focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kosmo-cyan transition duration-300">
                SIGN UP
            </button>
        </div>

        <div class="flex items-center my-6">
            <hr class="flex-grow border-gray-600">
            <span class="mx-4 text-gray-400 text-sm">OR</span>
            <hr class="flex-grow border-gray-600">
        </div>

        <div class="text-center">
            <p class="text-sm text-gray-300">
                HAVE A ACCOUNT? 
                <a href="{{ route('login') }}" class="font-bold text-blue-400 hover:text-blue-300">
                    LOGIN NOW
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>