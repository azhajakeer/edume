<x-guest-layout>
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
            <a href="{{ route('login') }}" class="text-white hover:text-gray-200 dark:hover:text-gray-400 px-4 py-2 rounded-full border border-white">
                Login
            </a>
        </div>
    </div>
</nav>

    <!-- Full-Screen Background Image with Overlay and Padding -->
    <div class="fixed inset-0 flex items-center justify-center p-8 bg-cover bg-center bg-yellow-700 dark:bg-gray-900"
         style="background-image: url('/images/child.jpg'); padding: 16px;">
         
        <!-- Centered Registration Form with Border -->
        <div class="relative z-50 w-full max-w-lg bg-white dark:bg-gray-800 shadow-lg bg-opacity-10 rounded-lg p-8 min-h-[600px] h-auto border border-gray-300 dark:border-gray-700 dark:bg-opacity-80 dark:border-white mt-20">

            <!-- Welcome Text -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Welcome to EduME</h2>
                <p class="text-gray-600 dark:text-gray-300 mt-2">Join us and start your learning journey today!</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
               <!-- Location -->
<div class="mt-4">
    <x-input-label for="location" :value="__('Location')" class="text-gray-300 font-semibold" />
    <select id="location" name="location" class="block mt-1 w-full p-2 bg-gray-800 text-gray-200 border border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        <option value="" disabled selected class="dark:bg-gray-800">Select your location</option>
        <option value="Ampara">Ampara</option>
        <option value="Anuradhapura">Anuradhapura</option>
        <option value="Badulla">Badulla</option>
        <option value="Batticaloa">Batticaloa</option>
        <option value="Colombo">Colombo</option>
        <option value="Galle">Galle</option>
        <option value="Gampaha">Gampaha</option>
        <option value="Hambantota">Hambantota</option>
        <option value="Jaffna">Jaffna</option>
        <option value="Kalutara">Kalutara</option>
        <option value="Kandy">Kandy</option>
        <option value="Kegalle">Kegalle</option>
        <option value="Kilinochchi">Kilinochchi</option>
        <option value="Kurunegala">Kurunegala</option>
        <option value="Mannar">Mannar</option>
        <option value="Matale">Matale</option>
        <option value="Matara">Matara</option>
        <option value="Monaragala">Monaragala</option>
        <option value="Mullaitivu">Mullaitivu</option>
        <option value="Nuwara Eliya">Nuwara Eliya</option>
        <option value="Polonnaruwa">Polonnaruwa</option>
        <option value="Puttalam">Puttalam</option>
        <option value="Ratnapura">Ratnapura</option>
        <option value="Trincomalee">Trincomalee</option>
        <option value="Vavuniya">Vavuniya</option>
    </select>
    <x-input-error :messages="$errors->get('location')" class="mt-2 text-red-400 text-sm" />
</div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <br>

                <!-- Register Button -->
                <div class="flex justify-center mt-4">
                    <x-primary-button class="text-lg text-center">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>

                <!-- Already Registered Link -->
                <div class="flex items-center justify-center mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

