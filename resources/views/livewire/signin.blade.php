<div>
    {{-- The best athlete wants his opponent at his best. --}}
   

<!-- HTML for Sign In Form -->
<div class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('../public/assets/images/paw_bkgrd.jpg');">
    <div class="bg-white bg-opacity-90 p-6 -mt-12 sm:p-8 rounded-lg shadow-2xl border border-gray-300 max-w-sm sm:max-w-md w-full">
        <h2 class="text-center text-xl sm:text-2xl font-bold mb-4 sm:mb-6" style="font-family: 'CarmenSans', san-serif;">Sign In</h2>
        
        <form action="/pet_comforts/public/login.php" method="POST">
            <div class="mb-3 sm:mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base">
            </div>
            
            <div class="mb-4 sm:mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base">
            </div>

             
            <div class="flex flex-col items-center">
                <button id="login" onclick='login()' class="w-full bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 sm:py-3 px-4 mt-4 sm:mt-6 rounded-full text-center text-sm sm:text-base">Sign In</button>
                <a href="/pet_comforts/public/register.php" class="mt-4 sm:mt-6 text-blue-500 hover:underline text-sm sm:text-base">Don't have an account? Register Now</a>
            </div>
        </form>
    </div>
</div>


</div>
