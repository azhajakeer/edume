<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Admin Dashboard</h2>
            <!-- Button for Approve Bundle -->
            <a href="/admin/bundles" 
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-200 ease-in-out">
                Check Bundles
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Product Management</h3>

            <!-- Table Start -->
            <div class="overflow-x-auto bg-white dark:bg-gray-900 rounded-xl shadow-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gradient-to-r from-teal-500 to-cyan-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left">Image</th>
                            <th class="px-6 py-4 text-left">Product Name</th>
                            <th class="px-6 py-4 text-left">Description</th>
                            <th class="px-6 py-4 text-left">Price</th>
                            <th class="px-6 py-4 text-left">Category</th>
                            <th class="px-6 py-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @foreach($products as $product)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all">
                                <td class="px-6 py-4">
                                    <!-- Display Product Image -->
                                    @if($product->image_path)
                                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->product_name }}" class="w-20 h-20 object-cover rounded-lg">
                                    @else
                                        <div class="w-20 h-20 flex items-center justify-center bg-gray-300 dark:bg-gray-700 text-gray-500 dark:text-gray-400 rounded-lg">No Image</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-800 dark:text-gray-200 font-medium">{{ $product->product_name }}</td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ Str::limit($product->description, 50) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">${{ number_format($product->price, 2) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">{{ $product->category }}</td>
                                <td class="px-6 py-4">
                                    @if(!$product->is_approved)
                                        <div class="flex space-x-3">
                                            <form action="{{ route('product.approve', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-green-600 transition-all focus:outline-none">Approve</button>
                                            </form>
                                            <form action="{{ route('product.reject', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-red-600 transition-all focus:outline-none">Reject</button>
                                            </form>
                                        </div>
                                    @else
                                        <p class="text-green-500 mt-2 font-semibold">Approved</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Table End -->
        </div>
    </div>
</x-app-layout>

