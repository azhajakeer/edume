<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add a New Product') }}
        </h2>
    </x-slot>

    <div class="h-screen flex items-center justify-center p-6" 
         style="background-image: url('/images/ll.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="flex w-full max-w-7xl space-x-16">
            <!-- Left Side: Product Form -->
            <div class="bg-gradient-to-b from-gray-800 via-gray-900 to-gray-800 p-6 rounded-3xl shadow-xl w-3/4 md:w-1/3 transform transition-transform duration-300 hover:scale-105">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-4 text-green-500 font-semibold text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Product Form -->
                <form action="{{ route('seller.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Product Name -->
                    <div class="mb-4">
                        <label for="product_name" class="block text-gray-300 font-semibold text-lg mb-2">Product Name</label>
                        <input type="text" name="product_name" id="product_name" class="w-full p-3 rounded-lg text-gray-200 bg-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required placeholder="Enter product name">
                    </div>

                    <!-- Product Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-300 font-semibold text-lg mb-2">Description</label>
                        <textarea name="description" id="description" class="w-full p-3 rounded-lg text-gray-200 bg-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required placeholder="Enter product description"></textarea>
                    </div>

                    <!-- Product Price -->
                    <div class="mb-4">
                        <label for="price" class="block text-gray-300 font-semibold text-lg mb-2">Price ($)</label>
                        <input type="number" name="price" id="price" class="w-full p-3 rounded-lg text-gray-200 bg-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" step="0.01" required placeholder="Enter price">
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="category" class="block text-gray-300 font-semibold text-lg mb-2">Category</label>
                        <select name="category" id="category" class="w-full p-3 rounded-lg text-gray-200 bg-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="electronics">Electronics</option>
                            <option value="furniture">Furniture</option>
                            <option value="clothing">Clothing</option>
                            <option value="books">Books</option>
                            <option value="toys">Toys</option>
                        </select>
                    </div>

                    <!-- Product Images -->
                    <div class="mb-4">
                        <label for="image" class="block text-gray-300 font-semibold text-lg mb-2">Product Image</label>
                        <input type="file" name="image" id="image" class="w-full text-gray-200 bg-gray-700 p-3 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>

                    <!-- Hidden seller_id -->
                    <input type="hidden" name="seller_id" value="{{ auth()->user()->id }}">

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-gray-800 text-white py-3 rounded-full mt-6 border border-white hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">
                        Add Product
                    </button>
                </form>
            </div>

            <!-- Right Side: Question and Product Table -->
                     <!-- Right Side: Question and Product Table -->
                <div class="w-full lg:w-1/2">
                    <div class="text-center mb-4 bg-gradient-to-t from-gray-700 via-gray-800 to-gray-900 p-6 rounded-lg">
                        <h3 class="text-2xl font-semibold text-white mb-2">Do you have more products to add?</h3>
                        <p class="text-lg text-white">If you have more products to add, feel free to continue adding more items.</p>
                        <a href="{{ route('sell-bundle') }}" class="mt-4 px-6 py-2 bg-gray-800 text-white hover:bg-indigo-700 rounded-full opacity-60">
    Sell as Bundle
</a>
                    </div>
                <!-- Product Table -->
                @if($approvedProducts->isNotEmpty())
                    <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
                        <thead class="bg-gradient-to-b from-gray-800 via-gray-900 to-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">Product Name</th>
                                <th class="px-6 py-4 text-left">Category</th>
                                <th class="px-6 py-4 text-left">Price</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approvedProducts as $product)
                                <tr class="border-b hover:bg-indigo-50 transition ease-in-out">
                                    <td class="px-6 py-4">{{ $product->product_name }}</td>
                                    <td class="px-6 py-4">{{ $product->category }}</td>
                                    <td class="px-6 py-4">${{ $product->price }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('product.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-full inline-block hover:bg-blue-600 transition duration-300 transform hover:scale-105">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full inline-block hover:bg-red-600 transition duration-300 transform hover:scale-105">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center mt-4 text-white">No approved products available.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

