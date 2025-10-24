@extends('layout.app')

@section('content')

<main>
    <section id="home"
        class="banner-bg h-[60vh] md:h-[80vh] flex items-center justify-center rounded-b-xl shadow-lg relative">
        <div class="banner-overlay absolute inset-0 rounded-b-xl"></div>
        <div class="container mx-auto px-4 text-center z-10 p-6 rounded-xl relative">
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white mb-4 drop-shadow-lg">
                Discover & Share Global Recipes
            </h1>
            <p class="text-lg sm:text-xl text-gray-200 mb-8 max-w-2xl mx-auto drop-shadow-md">
                Explore authentic dishes from every corner of the world. Join our community of food lovers!
            </p>

            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <button data-modal-target="addRecipeModal"
                    class="add-recipe bg-secondary text-gray-900 font-bold py-3 px-8 rounded-full shadow-xl hover:bg-amber-300 transition duration-300 transform hover:scale-105 uppercase">
                    <i class="fas fa-plus mr-2"></i> Add Your Recipe
                </button>
            </div>
        </div>
    </section>

    <section id="about" class="py-16 md:py-24 container mx-auto px-4">
        <div class="text-center max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Mission: Connecting Cultures Through
                Cooking</h2>
            <div class="h-1 w-20 bg-primary mx-auto mb-6 rounded-full"></div>
            <p class="text-lg text-gray-600 leading-relaxed">
                The Global Pantry is more than just a recipe database; it's a <strong>global cooking community</strong>.
                We believe that food is the purest expression of culture. Our platform is dedicated to curating and
                sharing authentic recipes, offering <strong>Free tutorials</strong>, and providing resources that empower
                home cooks to explore and celebrate diverse culinary traditions.
            </p>
        </div>
    </section>

    <section class="py-16 bg-white shadow-inner">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 max-w-6xl mx-auto">
                <div class="md:w-1/2 order-2 md:order-1 p-4">
                    <p class="text-primary font-semibold uppercase mb-2">Our Values</p>
                    <h3 class="text-3xl font-bold text-gray-900 mb-6">Cook. Learn. Inspire.</h3>
                    <ul class="space-y-4 text-gray-600 text-lg">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary text-xl mr-3 mt-1 flex-shrink-0"></i>
                            <span>**Authenticity First:** Every recipe is sourced and vetted for cultural accuracy.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-lock text-primary text-xl mr-3 mt-1 flex-shrink-0"></i>
                            <span>**Gated Education:** We provide full ingredient lists and tutorials exclusively for our registered members.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-users text-primary text-xl mr-3 mt-1 flex-shrink-0"></i>
                            <span>**Community Focused:** A space for cooks of all levels to connect, share tips, and grow their skills.</span>
                        </li>
                    </ul>
                </div>
                <div class="md:w-1/2 order-1 md:order-2 h-[50%]">
                    <img src="https://images.unsplash.com/photo-1549590143-d5855148a9d5?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzV8fENIRUZ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&q=60&w=600" alt="A chef preparing food" class="w-full h-[75vh] rounded-xl shadow-2xl object-cover transform hover:scale-[1.02] transition duration-500" onerror="this.onerror=null; this.src='https://placehold.co/600x400/0E9F6E/FFFFFF?text=Chefs+Cooking';" />
                </div>
            </div>
        </div>
    </section>

    <section id="recipes" class="py-16 md:py-24 container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Latest Recipes from The Pantry</h2>
            <p class="text-xl text-gray-500">A taste of what our community is sharing right now.</p>
        </div>
        <div id="recipe-cards-grid-placeholder" class="mb-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8"> 

        <script src="{{url('js/recipe_cards_logic.js')}}"></script>

        <div class="text-center mt-12">
            <a href="{{url('browse')}}"
                class="bg-primary text-white font-bold py-3 px-8 rounded-full shadow-xl hover:bg-opacity-90 transition duration-300 uppercase transform hover:scale-105">
                Browse All Recipes <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <section id="contact" class="py-16 md:py-24 bg-gray-200">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Get in Touch</h2>
                <p class="text-xl text-gray-600">Have a question? We'd love to hear from you.</p>
            </div>

            <form id="contactForm" class="bg-white p-8 md:p-12 rounded-xl shadow-2xl">
                <div class="mb-6">
                    <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Your Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-200">
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-lg font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-200">
                </div>
                <div class="mb-8">
                    <label for="message" class="block text-lg font-medium text-gray-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary transition duration-200"></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-primary text-white font-bold py-3 px-4 rounded-lg shadow-lg hover:bg-opacity-90 transition duration-300 uppercase transform hover:scale-[1.01]">
                    Send Message
                </button>
            </form>
        </div>
    </section>
</main>

<!-- MODAL -->
<div id="addRecipeModal"
    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-[9999] transition-all duration-300">
    <div
        class="bg-white p-8 rounded-xl shadow-3xl max-w-lg w-full mx-4 relative transform scale-100 transition-all duration-300">
        <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 transition duration-200 z-50"
            data-modal-close aria-label="Close Modal">
            <i class="fas fa-times text-2xl"></i>
        </button>

        <h3 class="text-3xl font-bold text-gray-900 mb-6 border-b pb-3 text-primary">Add Your Recipe</h3>

        <form id="recipeForm" action="#" method="POST">
            <div class="space-y-4 max-h-[50vh] overflow-y-auto pr-2">
                <div>
                    <label for="recipeTitle" class="block text-sm font-medium text-gray-700">Recipe Title <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="recipeTitle" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-secondary focus:border-secondary">
                </div>

                <div>
                    <label for="recipeDescription"
                        class="block text-sm font-medium text-gray-700">Description <span
                            class="text-red-500">*</span></label>
                    <textarea id="recipeDescription" rows="3" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-secondary focus:border-secondary"></textarea>
                </div>

                <div>
                    <label for="recipeImage" class="block text-sm font-medium text-gray-700">Upload Image <span
                            class="text-red-500">*</span></label>
                    <input type="file" id="recipeImage" accept="image/*" required
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-opacity-90">
                </div>

                <div>
                    <label for="recipeIngredients"
                        class="block text-sm font-medium text-gray-700">Ingredients <span
                            class="text-red-500">*</span></label>
                    <textarea id="recipeIngredients" rows="4" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-secondary focus:border-secondary"
                        placeholder="List ingredients line by line..."></textarea>
                </div>

                <div>
                    <label for="recipeTutorial" class="block text-sm font-medium text-gray-700">Tutorial / Steps
                        <span class="text-red-500">*</span></label>
                    <textarea id="recipeTutorial" rows="4" required
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-secondary focus:border-secondary"
                        placeholder="Write steps line by line..."></textarea>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-secondary text-gray-900 font-bold py-3 px-4 rounded-lg shadow-lg hover:bg-amber-300 transition duration-300 uppercase mt-8 transform hover:scale-[1.01]">
                Submit Recipe
            </button>
        </form>

        <div id="recipeConfirmation"
            class="hidden absolute inset-0 bg-white rounded-xl flex flex-col items-center justify-center p-8 text-center">
            <i class="fas fa-check-circle text-primary text-6xl mb-4 animate-bounce"></i>
            <h4 class="text-xl font-bold text-gray-800">Recipe Submitted!</h4>
            <p class="text-gray-600 mt-2">Pending Admin Approval.</p>
            <button class="mt-4 text-primary hover:underline" data-modal-close>Close</button>
        </div>
    </div>
</div>


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