<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
  

<div class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('/assets/images/paw_bkgrd.jpg') }}');">
    
    <div class="bg-white bg-opacity-90 p-6 sm:p-8 mt-10 rounded-lg shadow-2xl border border-gray-300 max-w-sm sm:max-w-md w-full">
        <h2 class="text-center text-xl sm:text-2xl font-bold mb-4 sm:mb-6" style="font-family: 'CarmenSans', san-serif;">Create Account</h2>
        
       
    <div class="mb-3 sm:mb-4">
        <label class="block text-sm font-medium text-gray-700">First Name</label>
        <input type="text" id="first_name" name="username" required class="mt-1 block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base">
    </div>
    <div class="mb-3 sm:mb-4">
        <label class="block text-sm font-medium text-gray-700">Last Name</label>
        <input type="text" id="last_name" name="username" required class="mt-1 block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base">
    </div>
    <div class="mb-3 sm:mb-4">
        <label class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" id="email" name="email" required class="mt-1 block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base">
    </div>
    <div class="mb-4 sm:mb-6">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base">
    </div>
    <div class="mb-4 sm:mb-6">
        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required class="mt-1 block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base">
    </div>
    <div class="mb-4 sm:mb-6">
        <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
        <input type="mobile" id="mobile" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm sm:text-base">
    </div>
  
    <div class="flex flex-col items-center">
        <button id="register" onclick="register()" class="w-full bg-blue-700 hover:bg-blue-600 text-white font-bold py-2 sm:py-3 px-4 mt-4 sm:mt-6 rounded-full text-center text-sm sm:text-base">Sign Up</button>
        <a href="{{url('/login')}}" class="mt-4 sm:mt-6 text-blue-500 hover:underline text-sm sm:text-base">Already have an account? Sign In</a>
    </div>


    </div>
</div>



</div>
