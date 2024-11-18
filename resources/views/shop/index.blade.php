<!-- resources/views/shop/bundles.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center space-x-2">
            <i class="fas fa-box-open text-indigo-600"></i>
            <span>{{ __('Shop Bundles') }}</span>
        </h2>
    </x-slot>

    <div class="bg-white py-12 bg-white">
        <div class="container mx-auto px-4">
            <!-- Title Section -->
            <h1 class="text-center text-4xl font-bold text-gray-800 dark:text-gray-100 mb-10">
                Explore Our Exclusive Bundles
            </h1>

            @if($bundles->isEmpty())
                <!-- Empty State -->
                <div class="flex justify-center">
                    <div class="bg-indigo-100 dark:bg-gray-700 text-indigo-700 dark:text-gray-200 text-sm font-medium px-4 py-3 rounded-md shadow-md flex items-center space-x-2">
                        <i class="fas fa-info-circle"></i>
                        <span>No bundles are available at the moment. Please check back later!</span>
                    </div>
                </div>
            @else
                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($bundles as $bundle)
                        <div class="bg-white dark:bg-gray-800 border dark:border-gray-700 rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105">
                            <!-- Product Image -->
                            <div class="relative pb-[100%]">
                                <img src="{{ asset('storage/' . $bundle->bundle_image) }}" 
                                     class="absolute inset-0 w-full h-full object-cover rounded-t-xl transition-transform duration-300 hover:scale-110" 
                                     alt="{{ $bundle->bundle_name }}">
                            </div>

                            <!-- Product Details -->
                            <div class="p-5 text-center">
                                <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-100 truncate">
                                    {{ $bundle->bundle_name }}
                                </h5>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">
                                    {{ Str::limit($bundle->description, 80) }}
                                </p>
                                <p class="text-indigo-600 dark:text-indigo-400 font-bold text-lg mt-4">
                                    ${{ number_format($bundle->price, 2) }}
                                </p>
                                <a href="{{ route('bundles.show', $bundle->id) }}" 
                                   class="inline-block mt-4 px-6 py-2 border-2 border-indigo-600 text-indigo-600 dark:text-indigo-400 dark:border-indigo-400 font-medium text-sm rounded-full hover:bg-indigo-600 hover:text-white dark:hover:bg-indigo-400 dark:hover:text-gray-900 transition-all duration-300">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
