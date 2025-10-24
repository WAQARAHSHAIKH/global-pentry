// Import necessary Firebase modules
import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
import { getAuth, signInAnonymously, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
import { getFirestore, onSnapshot, collection, query, serverTimestamp, addDoc, setLogLevel } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";

setLogLevel('Debug');

// --- Global Firebase & App Setup ---
let app;
let db;
let auth;
let userId = null;
let allRecipes = []; 
let isUserLoggedIn = false;

// NOTE: These variables must be defined in your environment or linked scope for Firebase to work.
const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
const firebaseConfig = typeof __firebase_config !== 'undefined' ? JSON.parse(__firebase_config) : null;

// --- Firestore Collection Paths ---
const RECIPES_COLLECTION_PATH = `/artifacts/${appId}/public/data/recipes`;
let PENDING_RECIPES_PATH = null; 

if (firebaseConfig) {
    app = initializeApp(firebaseConfig);
    db = getFirestore(app);
    auth = getAuth(app);
    
    // --- Authentication Handler ---
    onAuthStateChanged(auth, (user) => {
        const authStatusText = document.getElementById('authStatusText');
        const authLink = document.getElementById('authLink');

        if (user) {
            userId = user.uid;
            PENDING_RECIPES_PATH = `/artifacts/${appId}/users/${userId}/pending_recipes`;
            isUserLoggedIn = !user.isAnonymous;
            
            if (isUserLoggedIn) {
                authStatusText.textContent = 'Log Out';
                authLink.classList.remove('bg-secondary');
                authLink.classList.add('bg-red-500');
                authLink.setAttribute('onclick', 'window.handleAuthAction(true)');
                document.getElementById('addRecipeBtn').classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                // Anonymous user
                authStatusText.textContent = 'Log In / Register';
                authLink.classList.add('bg-secondary');
                authLink.classList.remove('bg-red-500');
                authLink.setAttribute('onclick', 'window.handleAuthAction(false)');
            }
            
            loadRecipes();

        } else {
            // No user -> Force anonymous sign-in
            isUserLoggedIn = false;
            userId = null;
            authStatusText.textContent = 'Log In / Register';
            authLink.classList.add('bg-secondary');
            authLink.classList.remove('bg-red-500');
            authLink.setAttribute('onclick', 'window.handleAuthAction(false)');
            
            signInAnonymously(auth).catch(error => {
                console.error("Anonymous sign-in error:", error);
                showToast("Could not connect to service. Try refreshing.", 'error');
            });
        }
    });
}

// Expose function for inline click handling
window.handleAuthAction = function(isLogout) {
    if (isLogout) {
        signOut(auth).then(() => {
            showToast("Signed out successfully. Now browsing anonymously.", 'success');
        }).catch(error => {
            console.error("Sign out error:", error);
            showToast("Sign out failed.", 'error');
        });
    } else {
        // This would normally redirect to a login/register page
        showToast("This would redirect you to the Login / Register page.", 'success');
    }
}

// --- UI/UX Utilities (Toasts and Modals) ---
function showToast(message, type = 'success') {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    
    let bgColor = type === 'error' ? 'bg-red-500' : 'bg-primary';
    let icon = type === 'error' ? '<i class="fas fa-times-circle"></i>' : '<i class="fas fa-check-circle"></i>';

    toast.className = `flex items-center ${bgColor} text-white text-sm font-bold px-4 py-3 rounded-lg shadow-xl opacity-0 transition-opacity duration-300 transform translate-x-full`;
    toast.innerHTML = `${icon} <span class="ml-2">${message}</span>`;
    
    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.remove('opacity-0', 'translate-x-full');
        toast.classList.add('opacity-100', 'translate-x-0');
    }, 10);

    setTimeout(() => {
        toast.classList.remove('opacity-100', 'translate-x-0');
        toast.classList.add('opacity-0', 'translate-x-full');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

function closeModal() {
    const container = document.getElementById('modalContainer');
    const modal = container.firstChild;
    if (modal) {
        const contentBox = modal.querySelector('.bg-white');
        if(contentBox) {
            contentBox.classList.remove('scale-100');
            contentBox.classList.add('scale-90');
        }
        setTimeout(() => container.innerHTML = '', 300);
    }
}
window.closeModal = closeModal; // Expose globally

function showModal(title, contentHtml) {
    const container = document.getElementById('modalContainer');
    container.innerHTML = ''; 

    const modalHtml = `
        <div class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center p-4">
            <div class="bg-white p-6 rounded-xl shadow-2xl max-w-2xl w-full transform scale-90 transition-all duration-300 ease-out" style="max-height: 90vh; overflow-y: auto;">
                <div class="flex justify-between items-center border-b pb-3 mb-4">
                    <h3 class="text-2xl font-bold text-gray-800">${title}</h3>
                    <button onclick="window.closeModal()" class="text-gray-400 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div id="modalContent">
                    ${contentHtml}
                </div>
            </div>
        </div>
    `;

    container.innerHTML = modalHtml;
    const modal = container.querySelector('.fixed');

    setTimeout(() => {
        modal.querySelector('.bg-white').classList.remove('scale-90');
        modal.querySelector('.bg-white').classList.add('scale-100');
    }, 10);
    
    // Close modal on click outside (on the dark background)
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });
    return container.querySelector('#modalContent');
}

// --- Recipe Detail & Gated Content ---

function showRecipeDetail(recipe) {
    let gatedContent;
    
    // --- Public Info (Always visible in modal) ---
    const publicInfo = `
        <div class="mb-4">
            <img src="${recipe.imageUrl}" alt="${recipe.title}" class="w-full h-48 object-cover rounded-lg shadow-md mb-4" onerror="this.onerror=null;this.src='https://placehold.co/600x400/333333/FFFFFF?text=Recipe+Image+Missing'">
            <p class="text-sm font-semibold text-primary uppercase">${recipe.cuisine}</p>
            <p class="text-gray-600 mt-2">${recipe.summary}</p>
        </div>
        <hr class="my-4 border-gray-200">
    `;

    if (isUserLoggedIn) {
        // --- Full Access (Gated Content) ---
        gatedContent = `
            <div class="space-y-6">
                <p class="text-green-600 font-bold mb-4">✅ Full access granted. Below is the detailed content.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-xl font-semibold mb-2 text-primary">Ingredients</h4>
                        <ul class="list-disc list-inside space-y-1 text-gray-700">
                            ${(Array.isArray(recipe.ingredients) ? recipe.ingredients : (recipe.ingredients || '').split('\n')).map(item => `<li>${item.trim()}</li>`).join('')}
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold mb-2 text-primary">Tutorial / Steps</h4>
                        <ol class="list-decimal list-inside space-y-2 text-gray-700">
                            ${(Array.isArray(recipe.tutorial) ? recipe.tutorial : (recipe.tutorial || '').split('\n')).map(item => `<li class="pl-2">${item.trim()}</li>`).join('')}
                        </ol>
                    </div>
                </div>
            </div>
        `;
    } else {
        // --- Locked Content (Gated Content) ---
        gatedContent = `
            <div class="text-center p-8 bg-gray-100 rounded-lg border-2 border-dashed border-secondary/50">
                <i class="fas fa-lock text-secondary/80 fa-3x mb-4"></i>
                <h4 class="text-2xl font-bold text-gray-800 mb-3">Content Locked!</h4>
                <p class="text-gray-600 mb-6">You must log in or sign up to view the **Ingredients** and **Tutorial/Steps**.</p>
                <a href="#" onclick="window.closeModal(); window.handleAuthAction(false);" class="bg-secondary text-white font-bold py-3 px-6 rounded-full shadow-md hover:bg-orange-600 transition duration-200">
                    Log In / Sign Up
                </a>
            </div>
        `;
    }

    const fullHtml = publicInfo + gatedContent;
    showModal(recipe.title, fullHtml);
}

// --- Recipe Submission Functions ---
// (No changes to these functions - they handle the "Add Recipe" button)

function renderAddRecipeForm() {
    if (!userId) {
        showToast("Please wait for authentication to complete before submitting.", 'error');
        return;
    }
    
    const formHtml = `
        <form id="submitRecipeForm" class="space-y-4">
            <p class="text-sm text-gray-600">Your submission will be sent to the admin for review before being published.</p>
            <div class="space-y-4 md:grid md:grid-cols-2 md:gap-4 md:space-y-0">
                <div>
                    <label for="submitTitle" class="block text-sm font-medium text-gray-700">Recipe Title *</label>
                    <input type="text" id="submitTitle" name="title" required class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label for="submitCuisine" class="block text-sm font-medium text-gray-700">Cuisine/Category *</label>
                    <input type="text" id="submitCuisine" name="cuisine" required class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-primary focus:border-primary">
                </div>
            </div>
            
            <div>
                <label for="submitImage" class="block text-sm font-medium text-gray-700">Image URL (Optional)</label>
                <input type="url" id="submitImage" name="imageUrl" placeholder="e.g., https://example.com/image.jpg" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-primary focus:border-primary">
            </div>
            
            <div>
                <label for="submitDescription" class="block text-sm font-medium text-gray-700">Description *</label>
                <textarea id="submitDescription" name="summary" rows="2" required class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-primary focus:border-primary"></textarea>
            </div>

            <div>
                <label for="submitIngredients" class="block text-sm font-medium text-gray-700">Ingredients (One per line) *</label>
                <textarea id="submitIngredients" name="ingredients" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-primary focus:border-primary"></textarea>
            </div>
            
            <div>
                <label for="submitTutorial" class="block text-sm font-medium text-gray-700">Tutorial/Steps (One per line) *</label>
                <textarea id="submitTutorial" name="tutorial" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-primary focus:border-primary"></textarea>
            </div>
            
            <button type="submit" class="w-full bg-secondary text-white font-bold py-2 px-4 rounded-lg hover:bg-orange-600 transition duration-200 mt-6">Submit for Approval</button>
        </form>
    `;
    
    const content = showModal('Submit New Recipe', formHtml);
    content.querySelector('#submitRecipeForm').addEventListener('submit', submitRecipeForApproval);
}

async function submitRecipeForApproval(e) {
    e.preventDefault();
    
    if (!userId) {
        showToast("Authentication is required to submit a recipe. Please wait.", 'error');
        return;
    }

    const form = e.target;
    const data = {
        title: form.title.value,
        cuisine: form.cuisine.value,
        summary: form.summary.value,
        imageUrl: form.imageUrl.value || 'https://placehold.co/600x400/10B981/FFFFFF?text=Pending+Review',
        ingredients: form.ingredients.value.split('\n').map(line => line.trim()).filter(line => line !== ''),
        tutorial: form.tutorial.value.split('\n').map(line => line.trim()).filter(line => line !== ''),
        submittedBy: userId,
        status: 'Pending',
        createdAt: serverTimestamp()
    };

    if (Object.values(data).some(v => (typeof v === 'string' && v.trim() === '') || (Array.isArray(v) && v.length === 0))) {
        showToast("Please fill out all required fields.", 'error');
        return;
    }

    try {
        const pendingCollectionRef = collection(db, PENDING_RECIPES_PATH);
        await addDoc(pendingCollectionRef, data);
        
        showToast(`Recipe "${data.title}" submitted successfully! It is now pending admin approval.`, 'success');
        closeModal();
    } catch (error) {
        console.error("Error submitting recipe:", error);
        showToast(`Error submitting recipe: ${error.message}`, 'error');
    }
}


// --- Filtering Logic (Search by Title and Cuisine) ---
window.applyFilters = function() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase().trim();
    const selectedCuisine = document.getElementById('cuisineFilter').value.trim();
    
    const filteredRecipes = allRecipes.filter(recipe => {
        // Search by Title
        const titleMatch = recipe.title.toLowerCase().includes(searchTerm);
        // Search by Cuisine (in case the user types the cuisine name in the search bar)
        const cuisineSearchMatch = (recipe.cuisine || '').toLowerCase().includes(searchTerm); 
        // Filter by the dropdown selection
        const cuisineFilterMatch = selectedCuisine === '' || (recipe.cuisine || '') === selectedCuisine;
        
        return (titleMatch || cuisineSearchMatch) && cuisineFilterMatch;
    });
    
    renderRecipeGrid(filteredRecipes);
}

function populateCuisineFilter(recipes) {
    const filterElement = document.getElementById('cuisineFilter');
    const cuisines = new Set();
    recipes.forEach(recipe => {
        if (recipe.cuisine && recipe.cuisine.trim() !== '') cuisines.add(recipe.cuisine.trim());
    });
    
    const sortedCuisines = Array.from(cuisines).sort();
    
    filterElement.innerHTML = '<option value="">Filter Cuisine</option>';
    sortedCuisines.forEach(cuisine => {
        const option = document.createElement('option');
        option.value = cuisine;
        option.textContent = cuisine;
        filterElement.appendChild(option);
    });
}

// --- Recipe Grid Rendering (Public View) ---

function renderRecipeGrid(recipes) {
    const gridContainer = document.getElementById('recipeGrid');
    document.getElementById('loadingIndicator').classList.add('hidden');
    gridContainer.innerHTML = ''; 
    
    if (recipes.length === 0) {
        gridContainer.innerHTML = '<p class="col-span-full text-center text-gray-500 p-8 text-lg">No recipes found or match your criteria.</p>';
        return;
    }

    recipes.forEach(recipe => {
        const card = document.createElement('div');
        // This is the RecipeCard section
        card.className = 'recipe-card bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer hover:shadow-xl transition duration-300';
        card.setAttribute('data-id', recipe.id);
        
        card.innerHTML = `
            <img src="${recipe.imageUrl}" alt="${recipe.title}" class="w-full h-48 object-cover" onerror="this.onerror=null;this.src='https://placehold.co/600x400/333333/FFFFFF?text=Recipe+Image+Missing'">
            <div class="p-5">
                <p class="text-xs font-semibold text-primary uppercase tracking-wider mb-1">${recipe.cuisine || 'Global'}</p>
                <h3 class="text-xl font-bold text-gray-900 mb-2">${recipe.title}</h3>
                <p class="text-sm text-gray-600 line-clamp-3">${recipe.summary}</p>
                <button class="mt-4 text-sm font-semibold text-secondary hover:text-orange-600 transition duration-150 flex items-center">
                    View Details <i class="fas fa-lock ml-2 text-xs"></i>
                </button>
            </div>
        `;
        
        card.addEventListener('click', () => {
            showRecipeDetail(recipe);
        });

        gridContainer.appendChild(card);
    });
}


// --- Initial Data Load (Runs only after Auth) ---

function loadRecipes() {
    if (!db) return;

    const recipesCollectionRef = collection(db, RECIPES_COLLECTION_PATH);
    const q = query(recipesCollectionRef);
    
    onSnapshot(q, (snapshot) => {
        const recipes = [];
        snapshot.forEach((doc) => {
            recipes.push({ id: doc.id, ...doc.data() });
        });
        
        allRecipes = recipes;
        populateCuisineFilter(recipes);
        applyFilters(); // Re-apply filters in case search/filter was active
        
    }, (error) => {
        console.error("Error listening to recipes:", error);
        showToast("Failed to load recipes. Please check console (or security rules).", 'error');
        document.getElementById('loadingIndicator').innerHTML = '<p class="text-red-500">Failed to load recipes. Check permissions.</p>';
    });
}
document.getElementById('addRecipeBtn').addEventListener('click', renderAddRecipeForm);