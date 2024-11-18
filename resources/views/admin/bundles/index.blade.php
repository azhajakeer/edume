<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Check Bundles') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8 bg-dark rounded-lg shadow-xl">
        <h2 class="text-4xl font-extrabold text-center mb-8 text-white">Bundles</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-4 rounded-lg shadow-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full table-auto border-collapse rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gradient-to-r from-blue-500 via-teal-500 to-teal-600 text-white">
                    <th class="px-6 py-4 border-2 border-teal-600 text-left text-l font-medium rounded-tl-lg">Bundle Name</th>
                    <th class="px-6 py-4 border-2 border-teal-600 text-left text-l font-medium">Description</th>
                    <th class="px-6 py-4 border-2 border-teal-600 text-left text-l font-medium">Price</th>
                    <th class="px-6 py-4 border-2 border-teal-600 text-left text-l font-medium">Image</th>
                    <th class="px-6 py-4 border-2 border-teal-600 text-left text-l font-medium">Status</th>
                    <th class="px-6 py-4 border-2 border-teal-600 text-left text-l font-medium rounded-tr-lg">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bundles as $bundle)
                    <tr class="bg-gray-900 shadow-md hover:shadow-lg rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                        <td class="px-6 py-4 border-2 border-teal-600 text-m text-white">{{ $bundle->bundle_name }}</td>
                        <td class="px-6 py-4 border-2 border-teal-600 text-m text-white">{{ $bundle->description }}</td>
                        <td class="px-6 py-4 border-2 border-teal-600 text-m text-white">${{ $bundle->price }}</td>
                        <td class="px-6 py-4 border-2 border-teal-600 text-m text-white">
                            <img src="{{ asset('storage/' . $bundle->bundle_image) }}" alt="Bundle Image" class="w-32 h-32 object-cover rounded-lg shadow-md transition-all duration-300 hover:scale-110">
                        </td>
                        <td class="px-6 py-4 border-2 border-teal-600 text-sm text-gray-700">
                            <select data-id="{{ $bundle->id }}" class="status-dropdown px-4 py-2 border-2 border-teal-600 rounded-lg text-sm focus:ring-2 focus:ring-teal-500">
                                <option value="approved" {{ $bundle->status == 'approved' ? 'selected' : '' }}>Approve</option>
                                <option value="rejected" {{ $bundle->status == 'rejected' ? 'selected' : '' }}>Reject</option>
                            </select>
                        </td>
                        <td class="px-6 py-4 border-2 border-teal-600 text-sm text-gray-700">
                            <button data-id="{{ $bundle->id }}" class="update-status-btn bg-gradient-to-r from-blue-600 to-teal-600 text-white px-6 py-2 rounded-md hover:bg-gradient-to-l hover:from-blue-500 hover:to-teal-500 transition-all duration-300 focus:outline-none">
                                Update Status
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 px-4 py-6">No pending bundles at the moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const updateButtons = document.querySelectorAll('.update-status-btn');

            updateButtons.forEach(button => {
                button.addEventListener('click', async () => {
                    const bundleId = button.getAttribute('data-id');
                    const statusDropdown = document.querySelector(`.status-dropdown[data-id="${bundleId}"]`);
                    const status = statusDropdown.value;

                    try {
                        const response = await fetch(`/admin/bundles/${bundleId}/updateStatus`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({ status }),
                        });

                        const result = await response.json();

                        if (result.success) {
                            alert('Status updated successfully!');
                        } else {
                            alert('Failed to update status.');
                        }
                    } catch (error) {
                        console.error('Error updating status:', error);
                        alert('approve bundle?');
                    }
                });
            });
        });
    </script>
</x-app-layout>
