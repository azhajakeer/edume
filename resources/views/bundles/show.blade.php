<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fas fa-box-open mr-2 text-primary"></i> {{ __('Bundle Details') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <!-- Single Bundle Details Section -->
            <div class="flex flex-col lg:flex-row items-center lg:space-x-12 space-y-8 lg:space-y-0">

                <!-- Product Image Section -->
                <div class="relative w-full lg:w-1/2 max-w-lg mx-auto transform hover:scale-105 transition-all duration-300">
                    <img src="{{ asset('storage/' . $bundle->bundle_image) }}" 
                         class="w-full h-auto object-cover rounded-lg shadow-xl transition-transform duration-300 transform hover:scale-110 hover:shadow-2xl"
                         alt="{{ $bundle->bundle_name }}">
                </div>

                <!-- Product Details Section -->
                <div class="w-full lg:w-1/2 space-y-6">
                    <h1 class="text-4xl font-semibold text-gray-900 text-center lg:text-left">{{ $bundle->bundle_name }}</h1>
                    <p class="text-lg text-gray-700 mb-6">{{ $bundle->description }}</p>
                    <p class="text-2xl font-bold text-primary mb-6">${{ number_format($bundle->price, 2) }}</p>
                </div>
            </div>

            <!-- Additional Bundle Categories (Optional) -->
            <div class="mt-12">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Categories</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($bundle->categories as $category)
                        <div class="p-4 border rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
                            <img src="{{ asset('storage/' . $category->category_image) }}" alt="{{ $category->category }}" class="w-full h-40 object-cover rounded-t-lg">
                            <p class="mt-2 text-center text-gray-700">{{ $category->category }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-6 mt-8">
        <div class="container mx-auto text-center">
            <p class="text-sm">© 2024 Your Company. All rights reserved.</p>
        </div>
    </footer>
</x-app-layout>
