<x-app-layout>
<x-slot name="header">
<div class="flex items-center justify-between h-6 px-2">
            <h2 class="font-medium text-xl text-gray-800 dark:text-gray-200">
                {{ __('Shop Products') }}
            </h2>
            <div class="flex items-center space-x-3">
            <div class="flex items-center space-x-3">
    <!-- Category Filter Form in Header -->
    <form method="GET" action="{{ route('approved.products.filter') }}" class="flex items-center">
        <label for="category" class="sr-only">Filter by Category:</label>
        <select name="category" onchange="this.form.submit()" 
                class="px-4 py-1 text-s font-medium text-white bg-gray-900 border border-white rounded-md focus:ring-2 focus:ring-white focus:outline-none hover:bg-gray-800 transition-all">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ $selectedCategory == $category ? 'selected' : '' }}>{{ $category }}</option>
            @endforeach
        </select>
    </form>

    <!-- Shop Bundle Button -->
    <a href="{{ route('shop.bundles') }}" 
       class="px-4 py-1 text-s font-medium text-white bg-gray-900 border border-white rounded-md shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-white transition-all">
        Shop Bundle
    </a>
</div>

    </x-slot>
    
    <div class="py-12 bg-white">
        <div class="sm:px-6 lg:px-8">
            <br><br>

            @if($approvedProducts->isEmpty())
                <p class="text-gray-600 text-center">No approved products available.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8 ">
                    @foreach($approvedProducts as $product)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105 dark:bg-gray-900">
                            <div class="h-56 bg-gray-100">
                                @if($product->image_path)
                                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image" class="h-full w-full object-cover rounded-t-2xl">
                                @else
                                    <div class="h-full flex items-center justify-center text-gray-500">No Image</div>
                                @endif
                            </div>
                            <div class="p-6">
                                <h4 class="text-lg font-semibold text-white truncate">{{ $product->product_name }}</h4>
                                <p class="text-xl font-semibold text-white">${{ number_format($product->price, 2) }}</p>

                                <!-- View Details Button -->
                                <a href="{{ route('product.show', $product->id) }}" class="inline-block mt-6 px-8 py-3 bg-gray-800 text-white font-semibold rounded-md shadow-md border-2 border-teal-500 hover:bg-gray-900 hover:border-green-500 focus:outline-none focus:ring-2 focus:ring-teal-300 transition-all duration-300 transform hover:scale-105 w-full text-center">
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
