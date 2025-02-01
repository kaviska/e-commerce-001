<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ada978dc6b.js" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: 'CarmenSans';
            src: url('../public/assets/fonts/CarmenSans-Heavy.woff') format('woff');
            font-weight: 800;
            font-style: normal;
        }
        .logo-text {
            white-space: nowrap; 
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header Section -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('assets/images/C1.jpg') }}" alt="Pet Comforts Logo" class="h-10 md:h-14">
                    <h1 class="ml-2 text-2xl md:text-3xl font-bold text-[#DE2723] logo-text" style="font-family: 'CarmenSans', sans-serif;">Pet Comforts</h1>
                </a>
            </div>
            <!-- Search Bar for Larger Screens -->
            <div class="hidden relative lg:flex items-center w-1/2">
                <input type="text" id="search" 
                    class="w-full py-2 pl-4 pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                    placeholder="Search...">
                    
                <!-- Search Results Dropdown -->
                <div id="searchResults" 
                    class="absolute top-full left-0 w-full bg-white shadow-lg rounded-lg border border-gray-200 hidden z-10">
                </div>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button id="menu-toggle" class="text-3xl text-[#001952] focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <!-- Sign In and Cart for Larger Screens -->
            <div class="hidden lg:flex items-center space-x-4">
                <a href="{{ url('/login') }}" id="login-link" class="flex items-center">
                    <img src="{{ asset('assets/images/pet-care.png') }}" alt="Sign In Icon" class="h-10">
                    <span class="ml-2 text-lg font-semibold text-[#5272BB]" style="font-family: 'League Spartan', sans-serif;">Sign In</span>
                </a>
                <a href="#" id="logout-link" class=" items-center hidden">
                    <i class="fas fa-sign-out-alt text-2xl text-[#5272BB]"></i>
                    <span class="ml-2 text-lg font-semibold text-[#5272BB]" style="font-family: 'League Spartan', sans-serif;">Logout</span>
                </a>
                <a href="{{ url('/cart') }}" class="relative flex items-center">
                    <img src="{{ asset('assets/images/pet_cart.png') }}" alt="Cart Icon" class="h-10">
                    <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full" id='cartCount'>0</span>
                </a>
            </div>
        </div>
    </header>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <input type="text" wire:model="search" class="w-full py-2 pl-4 pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Search...">
            <button class="absolute right-0 mr-4 mt-2">
                <i class="fas fa-search text-gray-500"></i>
            </button>
            <div class="mt-4">
                <a href="{{url('/login')}}" class="block py-2 text-lg font-semibold text-[#5272BB]" style="font-family: 'League Spartan', sans-serif;">Sign In</a>
                <a href="#" class="block py-2 text-lg font-semibold text-[#001952]" style="font-family: 'League Spartan', sans-serif;">Cart</a>
            </div>
        </div>
    </div>
    <!-- Navigation Bar -->
    <nav class="bg-[#001952] py-4 hidden lg:block">
        <ul class="flex justify-evenly text-white uppercase font-bold text-lg" style="font-family: 'Inter', sans-serif;">
            <!-- Dog Dropdown -->
            <li class="relative group">
                <a href="#" class="flex items-center">
                    Dog
                    <span class="ml-2"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <!-- Dropdown Mega Menu -->
                <div class="mega-menu hidden group-hover:block   top-full w-[100%] bg-[#001952] py-4 px-4 z-10">
                    <div class="container mx-auto flex justify-around">
                        <ul>
                            @foreach($c1 as $subCategory)
                                <li class="mb-2"><a href="{{ url('/allProduct/' . $subCategory->id) }}" class="hover:text-gray-400">{{ $subCategory->name }}</a></li>
                            @endforeach
                        </ul>
                        
                    </div>
                </div>
            </li>
            <!-- Cat Dropdown -->
            <li class="relative group">
                <a href="#" class="flex items-center">
                    Cat
                    <span class="ml-2"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <!-- Dropdown Mega Menu -->
                <div class="mega-menu hidden group-hover:block  w-[100%] bg-[#001952] py-4 px-4 z-10">
                    <div class="container mx-auto flex justify-around">
                        <ul>
                            @foreach($c2 as $subCategory)
                                <li class="mb-2"><a href="{{ url('/allProduct/' . $subCategory->id) }}" class="hover:text-gray-400">{{ $subCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            <li class="relative group">
                <a href="#" class="flex items-center">
                    Bird
                    <span class="ml-2"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <!-- Dropdown Mega Menu -->
                <div class="mega-menu hidden group-hover:block  w-[100%] bg-[#001952] py-4 px-4  z-10">
                    <div class="container mx-auto flex justify-around">
                        <ul>
                            @foreach($c3 as $subCategory)
                                <li class="mb-2"><a href="{{ url('/allProduct/' . $subCategory->id) }}" class="hover:text-gray-400">{{ $subCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            <li class="relative group">
                <a href="#" class="flex items-center">
                    Rabbit
                    <span class="ml-2"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <!-- Dropdown Mega Menu -->
                <div class="mega-menu hidden group-hover:block w-[100%] bg-[#001952] py-4 px-4  z-10">
                    <div class="container mx-auto flex justify-around">
                        <ul>
                            @foreach($c4 as $subCategory)
                                <li class="mb-2"><a href="{{ url('/allProduct/' . $subCategory->id) }}" class="hover:text-gray-400">{{ $subCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            <li class="relative group">
                <a href="#" class="flex items-center">
                    Others
                    <span class="ml-2"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <!-- Dropdown Mega Menu -->
                <div class="mega-menu hidden group-hover:block w-[100%] bg-[#001952] py-4 px-4  z-10">
                    <div class="container mx-auto flex justify-around">
                        <ul>
                            @foreach($c5 as $subCategory)
                                <li class="mb-2"><a href="{{ url('/allProduct/' . $subCategory->id) }}" class="hover:text-gray-400">{{ $subCategory->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </li>
            <!-- Add more categories as needed -->
        </ul>
    </nav>
    <!-- JavaScript for toggling menu and search -->
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>

   
