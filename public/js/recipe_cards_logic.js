 
const staticRecipes = [
    { id: 1, title: "Spicy Chicken Tikka Masala", cuisine: "Indian", reviews: 452, rating: 4.8,
      img: "https://images.unsplash.com/photo-1683533738338-19b9a22c6405?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzN8fGluZGlhbiUyMGN1cnJ5JTIwbWFya2V0aW5nJTIwaW1hZ2V8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&q=60&w=500" },
    { id: 2, title: "Classic Creamy Carbonara", cuisine: "Italian", reviews: 210, rating: 4.5,
      img: "https://images.unsplash.com/photo-1498579150354-977475b7ea0b?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGl0YWxpYW4lMjBwYXN0YXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&q=60&w=500" },
    { id: 3, title: "Authentic Street Tacos", cuisine: "Mexican", reviews: 89, rating: 4.9,
      img: "https://images.unsplash.com/photo-1518830686998-b8847466b372?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzB8fGNsb3NlJTIwdGFjbyfGVufDB8fDB8fHww&auto=format&fit=crop&q=60&w=500" },
    { id: 4, title: "Quick Homemade Sushi Rolls", cuisine: "Japanese", reviews: 125, rating: 4.7,
      img: "https://images.unsplash.com/photo-1611810175414-1ea054685162?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bmlnaXJpJTIwcGxhdHRlcnxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&q=60&w=500" },
];

/**
 * Star icon ke liye helper function.
 * @param {number} rating - Recipe ki rating (0 se 5).
 * @returns {string} - HTML stars.
 */
function getStarRating(rating) {
    // Pura star icon
    const fullStar = '<i class="fas fa-star text-yellow-400 text-xs"></i>';
    // Khali star icon
    const emptyStar = '<i class="fas fa-star text-gray-300 text-xs"></i>';
    
    let stars = '';
    const roundedRating = Math.round(rating);
    
    // Pure stars jodna
    for (let i = 0; i < 5; i++) {
        stars += (i < roundedRating) ? fullStar : emptyStar;
    }
    return stars;
}

/**
 * Recipes ki list ke liye HTML card elements banata aur daalta hai.
 * @param {Array<Object>} recipes - Recipes jinko display karna hai.
 */
function generateRecipeCards(recipes) {
    // Recipes ko daalne ke liye placeholder element dhundhein.
    const grid = document.getElementById('recipe-cards-grid-placeholder'); 
    
    if (!grid) {
        console.error("Recipe grid placeholder nahi mila. ID 'recipe-cards-grid-placeholder' check karein.");
        return;
    }

    // Har recipe object ko HTML string mein map karein.
    const htmlContent = recipes.map(recipe => {
        const stars = getStarRating(recipe.rating);
        return `
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.03] transition duration-300 cursor-pointer recipe-card" data-recipe-id="${recipe.id}">
                <img src="${recipe.img}" alt="Image of ${recipe.title}" class="w-full h-48 object-cover" onerror="this.onerror=null;this.src='https://placehold.co/500x300/6B7280/FFFFFF?text=Image+Missing'">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-900 truncate">${recipe.title}</h3>
                    <div class="flex items-center mt-1 mb-2">
                        ${stars}
                        <span class="text-xs text-gray-600 ml-2">${recipe.rating} (${recipe.reviews} reviews)</span>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Cuisine: ${recipe.cuisine}</p>
                </div>
            </div>
        `;
    }).join('');

    // Grid mein HTML daal dein.
    grid.innerHTML = htmlContent;

    // Dynamically bane hue cards par click listeners lagayein.
    document.querySelectorAll('.recipe-card').forEach(card => {
        card.addEventListener('click', () => {
            // Login modal function ko call karein.
            // Yeh function homepage.html ke <script> tag mein define hoga.
            if (typeof showLoginModal === 'function') {
                showLoginModal();
            } else {
                 console.log(`Recipe Clicked: ${card.dataset.recipeId}. Login modal function not found.`);
            }
        });
    });
}

// --- INITIALIZATION ---
// Jab poora HTML content load ho jaye, tab rendering function run karein.
document.addEventListener('DOMContentLoaded', () => {
    // Homepage ke liye static recipes display karein.
    generateRecipeCards(staticRecipes);
});



