<x-guest-layout>
    
    <x-slot name="leftPanel">
        <img src="{{ asset('images/login1.png') }}" alt="Ilustrasi Login" class="w-full max-w-sm">
    </x-slot>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-3xl font-bold text-white mb-8">
        LOGIN
    </h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email" class="block font-medium text-sm text-gray-300">Email</label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
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
                autocomplete="current-password"
                class="block mt-1 w-full rounded-md shadow-sm bg-white border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-8">
            <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-bold text-kosmo-darkblue bg-kosmo-cyan hover:bg-kosmo-lightcyan focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kosmo-cyan transition duration-300">
                LOGIN
            </button>
        </div>

        <div class="text-center mt-5">
            <a class="text-sm text-blue-400 hover:text-blue-300" href="{{ route('password.request') }}">
                Forgot password?
            </a>
        </div>

        <div class="flex items-center my-6">
            <hr class="flex-grow border-gray-600">
            <span class="mx-4 text-gray-400 text-sm">OR</span>
            <hr class="flex-grow border-gray-600">
        </div>

        <div class="text-center">
            <p class="text-sm text-gray-300">
                DIDN'T HAVE AN ACCOUNT? 
                <a href="{{ route('register') }}" class="font-bold text-blue-400 hover:text-blue-300">
                    SIGN UP NOW
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>