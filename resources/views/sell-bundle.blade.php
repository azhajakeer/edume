<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sell as Bundle') }}
        </h2>
    </x-slot>

    <!-- Adjusted Layout to fit below the header -->
    <div class="bg-cover bg-center bg-fixed" style="background-image: url('/images/ll.jpeg');">
        <!-- Smaller Container for the form -->
        <div class="container mx-auto p-6 max-w-2xl bg-gradient-to-r from-gray-700 via-gray-800 to-gray-900 rounded-lg shadow-xl relative mt-8 mb-12">
            <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div> <!-- Dark overlay for contrast -->

            <h2 class="text-4xl font-bold text-center text-white mb-8 relative z-10">Sell Your Bundle</h2>

            <form action="{{ route('bundle.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8 bg-gray-100 p-6 rounded-lg shadow-lg relative z-10 border border-gray-300">
                @csrf

                <!-- Bundle Name -->
                <div class="mb-6">
                    <label for="bundleName" class="block text-gray-800 text-lg font-semibold">Bundle Name</label>
                    <input type="text" id="bundleName" name="bundleName" class="w-full px-6 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent text-lg placeholder-gray-500 transition-all duration-300" placeholder="Enter your bundle name" required>
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-gray-800 text-lg font-semibold">Description</label>
                    <textarea id="description" name="description" class="w-full px-6 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent text-lg placeholder-gray-500 transition-all duration-300" placeholder="Describe the bundle contents" required></textarea>
                </div>

                <!-- Price -->
                <div class="mb-6">
                    <label for="price" class="block text-gray-800 text-lg font-semibold">Price</label>
                    <div class="relative">
                        <input type="number" id="price" name="price" class="w-full px-6 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent text-lg placeholder-gray-500 transition-all duration-300" placeholder="Enter price" required>
                        <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-lg">$</span>
                    </div>
                </div>

                <!-- Category and Image Upload Fields -->
                @for ($i = 1; $i <= 5; $i++)
                <div class="flex items-center gap-6 mb-6">
                    <div class="flex-1">
                        <label for="category_{{ $i }}" class="block text-gray-800 text-lg font-semibold">Category {{ $i }}</label>
                        <select id="category_{{ $i }}" name="categories[]" class="w-full px-6 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent text-lg transition-all duration-300">
                            <option value="electronics">Electronics</option>
                            <option value="furniture">Furniture</option>
                            <option value="books">Books</option>
                            <option value="clothing">Clothing</option>
                            <option value="accessories">Accessories</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <label for="categoryImage_{{ $i }}" class="block text-gray-800 text-lg font-semibold">Image for Category {{ $i }}</label>
                        <input type="file" id="categoryImage_{{ $i }}" name="categoryImages[]" class="w-full px-6 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent text-lg transition-all duration-300" accept="image/*" required>
                    </div>
                </div>
                @endfor

                <!-- Main Bundle Image -->
                <div class="mb-6">
                    <label for="bundleImage" class="block text-gray-800 text-lg font-semibold">Main Bundle Image</label>
                    <input type="file" id="bundleImage" name="bundleImage" class="w-full px-6 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent text-lg transition-all duration-300" accept="image/*" required>
                </div>

                <!-- Submit Button -->
<button type="submit" class="w-full px-8 py-4 bg-gray-800 text-white font-semibold rounded-md shadow-xl hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300 transition duration-300 transform hover:scale-105">
    Submit Bundle
</button>

            </form>
        </div>
    </div>
</x-app-layout>


