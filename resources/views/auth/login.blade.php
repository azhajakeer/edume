<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Full Screen Background Image with Overlay and Padding -->
    <div class="fixed inset-0 flex items-center justify-center p-8">
        <div class="w-full h-full bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('/images/child.jpg');">
            <!-- Semi-transparent Overlay for readability -->
            <div class="absolute inset-0 bg-black opacity-10"></div>

            <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Full Screen Background Image with Overlay and Padding -->
    <div class="fixed inset-0 flex items-center justify-center p-8">
        <div class="w-full h-full bg-cover bg-center rounded-lg overflow-hidden p-4" style="background-image: url('/images/child.jpg');">
            <!-- Semi-transparent Overlay for readability -->
            <div class="absolute inset-0 bg-black opacity-10 rounded-lg"></div>

           <!-- Navbar -->
<nav class="fixed top-0 inset-x-0 bg-yellow-700 dark:bg-gray-900 p-4 shadow-lg z-50">
    <div class="flex items-center justify-between max-w-6xl mx-auto px-4">
        <!-- Brand Name or Logo -->
        <a href="/" class="text-2xl font-bold text-white">EduME</a>

        <!-- Navbar Buttons with Circular Borders -->
        <div class="space-x-4 flex items-center">
            <a href="/" class="text-white hover:text-gray-200 dark:hover:text-gray-400 px-4 py-2 rounded-full border border-white">
                Home
            </a>
            <a href="{{ route('register') }}" class="text-white hover:text-gray-200 dark:hover:text-gray-400 px-4 py-2 rounded-full border border-white">
                signup
            </a>
        </div>
    </div>
</nav>



        
            <!-- Centered Login Card -->
            <div class="relative z-10 flex items-center justify-center h-screen">
                <div class="w-full max-w-md bg-white bg-opacity-10 dark:bg-gray-800 dark:bg-opacity-80 shadow-lg rounded-lg p-8 border border-gray-300 dark:border-white">

                    <!-- Welcome Back Text -->
                    <div class="text-center mb-4">
                        <h1 class="text-2xl font-semibold text-gray-700 dark:text-white">
                            {{ __('Welcome Back!') }}
                        </h1>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input id="email" class="block mt-1 w-full rounded-md dark:bg-gray-700 dark:text-gray-100" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 dark:text-red-400" />
                        </div>
                    
                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input id="password" class="block mt-1 w-full rounded-md dark:bg-gray-700 dark:text-gray-100" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-white dark:border-white dark:bg-gray-700 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" name="remember">
                                <span class="ml-2 text-sm text-gray-600 dark:text-white">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="flex items-center justify-center mt-6">
                            <x-primary-button class="px-6 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>

                        <!-- Sign Up and Forgot Password Links -->
                        <div class="flex flex-col items-center mt-4 space-y-2">
                            <a class="underline text-sm text-white dark:text-white hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none" href="{{ route('register') }}">
                                {{ __('Not registered yet?') }}
                            </a>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>
   
 
</x-guest-layout>
        
            <!-- Centered Login Card -->
            <div class="relative z-10 flex items-center justify-center h-screen">
                <div class="w-full max-w-md bg-white bg-opacity-10 dark:bg-gray-800 dark:bg-opacity-80 shadow-lg rounded-lg p-8 border border-gray-300 dark:border-white">

                    <!-- Welcome Back Text -->
                    <div class="text-center mb-4">
                        <h1 class="text-2xl font-semibold text-gray-700 dark:text-white">
                            {{ __('Welcome Back!') }}
                        </h1>
                    </div>

                    <!-- Profile Icon -->
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500 dark:text-gray-300 rounded-full bg-gray-200 dark:bg-gray-700 p-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a5 5 0 015 5v1a5 5 0 01-10 0V7a5 5 0 015-5zm-7 16a7 7 0 0114 0H3z" />
                        </svg>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address with Profile Icon -->
                        <div class="flex items-center space-x-2">
                            <div class="w-full">
                                <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300" />
                                <x-text-input id="email" class="block mt-1 w-full rounded-md dark:bg-gray-700 dark:text-gray-100" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 dark:text-red-400" />
                            </div>
                        </div>
                    
                        <!-- Password -->
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300" />
                            <x-text-input id="password" class="block mt-1 w-full rounded-md dark:bg-gray-700 dark:text-gray-100" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-white dark:border-white dark:bg-gray-700 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" name="remember">
                                <span class="ml-2 text-sm text-gray-600 dark:text-white">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                    
                        <!-- Submit Button -->
                        <div class="flex items-center justify-center mt-6">
                            <x-primary-button class="px-6 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>

                        <!-- Sign Up and Forgot Password Links -->
                        <div class="flex flex-col items-center mt-4 space-y-2">
                            <a class="underline text-sm text-white dark:text-white hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none" href="{{ route('register') }}">
                                {{ __('Not registered yet?') }}
                            </a>
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
