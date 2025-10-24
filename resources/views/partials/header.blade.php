<header class="sticky top-0 z-50 shadow-lg bg-white">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
        <!-- Logo/Site Title -->
        <a href="{{route('home')}}" class="text-xl font-bold text-gray-900 tracking-wider hover:text-primary transition duration-300">
            THE GLOBAL PANTRY
        </a>
        
        <!-- Desktop Navigation Links -->
        <div class="hidden sm:flex space-x-6 font-medium">
            <a href="{{route('home')}}" class="text-gray-600 hover:text-primary transition duration-300 rounded-lg px-3 py-2">Home</a>
            <a href="{{url('browse')}}" class="text-gray-600 hover:text-primary transition duration-300 rounded-lg px-3 py-2">Browse</a>
            <a href="#contact" class="text-gray-600 hover:text-primary transition duration-300 rounded-lg px-3 py-2">Contact</a>
            <a href="{{url('login')}}" class="text-white bg-primary hover:bg-opacity-90 rounded-lg px-3 py-2 ml-4 shadow-md transition duration-300">Login / Sign Up</a>
        </div>

        <!-- Mobile Menu Button (Hamburger) -->
        <button id="mobile-menu-button" class="sm:hidden text-gray-600 focus:outline-none hover:text-primary">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </nav>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="hidden sm:hidden shadow-lg bg-white">
        <a href="{{route('home')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-primary">Home</a>
        <a href="{{url('browse')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-primary">Browse</a>
        <a href="#contact" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-primary">Contact</a>
        <a href="{{url('login')}}" class="block px-4 py-2 text-white bg-primary m-2 rounded-lg text-center">Login / Sign Up</a>
    </div>
</header>
