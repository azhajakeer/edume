<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduME Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-purple-500 to-indigo-900 h-screen flex items-center justify-center">
  <div class="bg-white bg-opacity-5 rounded-lg p-10 w-96 text-center relative">
    <!-- Profile Icon -->
    <div class="bg-white w-16 h-16 rounded-full mx-auto mb-6 flex items-center justify-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-6 2.69-6 6h12c0-3.31-2.69-6-6-6z" />
      </svg>
    </div>

    <!-- Buttons -->
    <div class="flex justify-center space-x-4 mb-4">
      <!-- Link to Seller Page -->
      <a href="{{ route('seller') }}" class="bg-indigo-900 text-white px-4 py-2 rounded-full">I’m a Seller</a>
      <button class="bg-indigo-900 text-white px-4 py-2 rounded-full">I’m a Buyer</button>
    </div>
    <button class="bg-indigo-900 text-white px-4 py-2 rounded-full mb-6">Donate</button>

    <!-- Footer Text -->
    <p class="text-white font-semibold">"We are all part of one community!"</p>
  </div>

  <script>
    function toggleDropdown() {
      const dropdownMenu = document.getElementById('dropdownMenu');
      dropdownMenu.classList.toggle('hidden');
    }
  </script>
</body>