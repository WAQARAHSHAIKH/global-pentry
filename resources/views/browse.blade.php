@extends('layout.app')

@section('content')

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <h2 class="text-4xl font-extrabold text-primary">Explore World Cuisine</h2>
        <p class="text-lg text-gray-500 mb-8">Discover recipes from every corner of the globe. Log in to view full instructions!</p>
        
        <!-- Search and Filter Section (Placeholder for functionality) -->
        <div class="flex flex-col gap-4 mb-10 p-4 bg-white rounded-xl shadow-lg">
            <div class="flex flex-col md:flex-row gap-4">
                <input type="text" id="searchInput" placeholder="Search by title or cuisine..." class="flex-grow border border-gray-300 rounded-lg p-3 focus:ring-primary focus:border-primary">
                <select id="cuisineFilter" class="w-full md:w-48 border border-gray-300 rounded-lg p-3 focus:ring-primary focus:border-primary">
                    <option value="">Filter Cuisine</option>
                </select>
                <button onclick="applyFilters()" class="hidden md:block bg-gray-500 text-white font-semibold py-3 px-6 rounded-lg hover:bg-gray-600 transition duration-200">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div id="recipe-cards-grid-placeholder" class="mb-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8"> 
        <!-- Recipe cards will be inserted here by recipe_cards_logic.js -->
    </div>
         <div>
        <script type="text/javascript" src="recipe_cards_logic.js"></script>
    </div>
    </main>
    

 <!-- LOGIN REQUIRED MODAL -->
<div id="login-required-modal" 
     class="hidden fixed inset-0 z-50 bg-black bg-opacity-70 flex items-center justify-center transition-opacity duration-300">
    <div class="bg-white rounded-xl p-8 max-w-sm mx-4 shadow-2xl transform transition-transform duration-300 scale-100">
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1m-7-1v1m0-9v-1m7 1h-7"></path>
            </svg>
            <h3 class="mt-4 text-2xl font-bold text-gray-900">Login Required</h3>
            <p class="mt-2 text-gray-600">Recipe ki details dekhne ke liye, aapko login karna hoga.</p>
        </div>
        <div class="mt-6 flex flex-col space-y-3">
            <a href="{{url('login')}}" 
               class="w-full bg-primary text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:bg-opacity-90 transition duration-300 text-center">
                Login / Register
            </a>
            <button onclick="window.closeLoginModal()" 
                    class="w-full text-gray-600 hover:text-gray-800 text-sm py-2">
                Shayad baad mein
            </button>
        </div>
    </div>
</div>


@endsection


<script type="module">
    // Login Modal element ko pehchan na
// Login Modal element ko dhundhein
const loginModal = document.getElementById('login-required-modal');

// Function: Modal ko kholna (Global access ke liye window.showLoginModal)
window.showLoginModal = () => {
    if (loginModal) {
        loginModal.classList.remove('hidden');
        loginModal.classList.add('flex');
    }
};

// Function: Modal ko band karna (Global access ke liye window.closeLoginModal)
window.closeLoginModal = () => {
    if (loginModal) {
        loginModal.classList.add('hidden');
        loginModal.classList.remove('flex');
    }
};

// Modal ko bahar click karne par band karne ka listener
if (loginModal) {
    loginModal.addEventListener('click', (e) => {
        // Sirf tab band karein jab user modal background par click kare (modal box par nahi)
        if (e.target === loginModal) {
            window.closeLoginModal();
        }
    });
}

</script>