<!-- resources/views/product/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <!-- Full-Screen Background with an Image -->
    <div class="h-screen flex flex-col items-center justify-center bg-cover bg-center" style="background-image: url('/images/ll.jpeg');">
        <!-- Dark Form Container -->
        <div class="bg-gray-900 bg-opacity-80 rounded-lg p-10 w-96 text-center mb-10">
            <!-- Update Form -->
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mb-4">
                    <label for="product_name" class="block text-gray-300 font-semibold">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="w-full p-2 rounded bg-gray-700 text-white" value="{{ $product->product_name }}" required>
                </div>

                <!-- Product Description -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-300 font-semibold">Description</label>
                    <textarea name="description" id="description" class="w-full p-2 rounded bg-gray-700 text-white" required>{{ $product->description }}</textarea>
                </div>

                <!-- Product Price -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-300 font-semibold">Price ($)</label>
                    <input type="number" name="price" id="price" class="w-full p-2 rounded bg-gray-700 text-white" value="{{ $product->price }}" step="0.01" required>
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label for="category" class="block text-gray-300 font-semibold">Category</label>
                    <select name="category" id="category" class="w-full p-2 rounded bg-gray-700 text-white" required>
                        <option value="electronics" {{ $product->category == 'electronics' ? 'selected' : '' }}>Electronics</option>
                        <option value="furniture" {{ $product->category == 'furniture' ? 'selected' : '' }}>Furniture</option>
                        <option value="clothing" {{ $product->category == 'clothing' ? 'selected' : '' }}>Clothing</option>
                        <option value="books" {{ $product->category == 'books' ? 'selected' : '' }}>Books</option>
                        <option value="toys" {{ $product->category == 'toys' ? 'selected' : '' }}>Toys</option>
                    </select>
                </div>

                <!-- Product Image -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-300 font-semibold">Update Image</label>
                    <input type="file" name="image" id="image" class="w-full bg-gray-700 text-white">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="bg-indigo-800 hover:bg-indigo-700 text-white px-4 py-2 rounded-full">Update Product</button>
            </form>
        </div>
    </div>
</x-app-layout>

