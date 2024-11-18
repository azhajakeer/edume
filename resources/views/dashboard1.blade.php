<x-app-layout>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Full-Screen Gradient Background with Smooth Transition -->
    <div class="h-screen flex flex-col items-center justify-center px-4 sm:px-8 space-y-6" style="background-image: url('/images/blrr.jpeg'); background-size: cover; background-position: center;">
        <!-- Welcome Text Above the Container -->
        <h1 class="text-3xl sm:text-4xl font-bold text-indigo-900 text-center">Welcome!!</h1>
        
        <!-- Enhanced Inner Container with Padding, Rounded Corners, Opacity, Shadow, and Black Border -->
        <div class="bg-white bg-opacity-90 rounded-3xl p-8 sm:p-12 w-full max-w-md md:max-w-lg lg:max-w-2xl text-center relative shadow-2xl transition-transform transform hover:scale-105 border-2 border-black">
            
            <!-- Profile Icon with Dark Theme Adjustment and Smooth Hover Effect -->
            <div class="bg-gradient-to-t from-indigo-600 via-indigo-400 to-indigo-300 w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 rounded-full mx-auto mb-6 sm:mb-8 flex items-center justify-center shadow-xl transition-transform transform hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 sm:h-14 md:h-16 w-12 sm:w-14 md:w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-6 2.69-6 6h12c0-3.31-2.69-6-6-6z" />
                </svg>
            </div>

            <!-- Buttons with Elegant Hover and Transition Effects -->
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 md:space-x-8 mb-6 sm:mb-10">
                <a href="{{ route('seller') }}" class="bg-indigo-700 hover:bg-indigo-600 text-white px-8 sm:px-6 md:px-10 py-4 sm:py-5 rounded-full text-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                    I’m a Seller
                </a>
                <a href="{{ route('productlisting') }}" class="bg-indigo-700 hover:bg-indigo-600 text-white px-8 sm:px-6 md:px-10 py-4 sm:py-5 rounded-full text-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                    I’m a Buyer
                </a>
            </div>

            <!-- Donate Button with Soft Hover Effect -->
            <a href="{{ route('doner') }}" class="bg-indigo-700 hover:bg-indigo-600 text-white px-8 sm:px-6 md:px-10 py-4 sm:py-5 rounded-full text-lg shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                Donate
            </a>

            <!-- Footer Text with Clean Font Style -->
            <p class="text-indigo-700 font-semibold text-lg mt-6 sm:mt-8">"We are all part of one community!"</p>
        </div>
    </div>

</x-app-layout>

