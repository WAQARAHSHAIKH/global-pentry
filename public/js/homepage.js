// --- General Utility Functions ---
 
// Function to create and show a toast notification (replaces alert())
function showToast(message, type = 'success') {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    
    let bgColor = 'bg-primary';
    let icon = '<i class="fas fa-check-circle"></i>';
    if (type === 'error') {
        bgColor = 'bg-red-500';
        icon = '<i class="fas fa-times-circle"></i>';
    }

    // Using Tailwind classes from HTML (assuming they are available/loaded)
    toast.className = `flex items-center ${bgColor} text-white text-sm font-bold px-4 py-3 rounded-lg shadow-lg opacity-0 transition-opacity duration-300 transform translate-x-full`;
    toast.innerHTML = `${icon} <span class="ml-2">${message}</span>`;
    
    container.appendChild(toast);

    // Animate in
    setTimeout(() => {
        toast.classList.remove('opacity-0', 'translate-x-full');
        toast.classList.add('opacity-100', 'translate-x-0');
    }, 10);

    // Animate out and remove
    setTimeout(() => {
        toast.classList.remove('opacity-100', 'translate-x-0');
        toast.classList.add('opacity-0', 'translate-x-full');
        setTimeout(() => toast.remove(), 300);
    }, 4000); // Display for 4 seconds
}

// --- DOM Ready and Initialization ---
document.addEventListener('DOMContentLoaded', () => {
    
    // Set current year in footer
    document.getElementById('currentYear').textContent = new Date().getFullYear();

    // --- 1. Mobile Menu Toggle ---
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
    
    // Hide mobile menu on link click (SPA behavior)
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });
    

    // --- 2. Modal Logic (Add Recipe Popup) ---
    const modal = document.getElementById('addRecipeModal');
    const modalOpenButtons = document.querySelectorAll('[data-modal-target="addRecipeModal"]');
    const modalCloseButtons = modal.querySelectorAll('[data-modal-close]');
    const recipeForm = document.getElementById('recipeForm');
    const recipeConfirmation = document.getElementById('recipeConfirmation');

    // Open Modal
    modalOpenButtons.forEach(button => {
        button.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            recipeForm.classList.remove('hidden');
            recipeConfirmation.classList.add('hidden');
        });
    });

    // Close Modal
    modalCloseButtons.forEach(button => {
        button.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    });

    // Handle Modal Form Submission (Simulation)
    recipeForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Simple front-end validation check
        const inputs = recipeForm.querySelectorAll('input[required], textarea[required]');
        let isValid = true;
        inputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('border-red-500');
            } else {
                input.classList.remove('border-red-500');
            }
        });
        

        if (isValid) {
            // Show confirmation overlay
            recipeForm.classList.add('hidden');
            recipeConfirmation.classList.remove('hidden');

            // Automatically close after 3 seconds
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                // Reset form state for next time
                recipeForm.reset();
            }, 3000);
        } else {
            showToast("Please fill in all mandatory fields.", 'error');
        }
    });
    
    // --- 3. Contact Form Submission (Simulation) ---
    const contactForm = document.getElementById('contactForm');
    
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Perform simple validation (required attribute handles most of it)
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();
        
        if (name && email && message) {
            showToast("Message Sent Successfully!", 'success');
            contactForm.reset();
        } else {
            showToast("Please fill out all contact fields.", 'error');
        }
    });

    // --- 4. Recipe Card Click (Simulation of Recipe Card Script) ---
    document.querySelectorAll('[data-recipe-id]').forEach(card => {
        card.addEventListener('click', () => {
            const recipeId = card.getAttribute('data-recipe-id');
            
            // This variable simulates a logged-in state.
            const isLoggedIn = false; // Change to true to test the logged-in path.

            if (isLoggedIn) {
                showToast(`Accessing Recipe ${recipeId}: Full details displayed (Simulation).`, 'success');
            } else {
                showToast("Please Login or Sign Up to view full recipe details (Gated Content).", 'error');
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const modalButton = document.querySelector('[data-modal-target="addRecipeModal"]');
    const modal = document.getElementById("addRecipeModal");
    const modalContent = modal.querySelector(".bg-white");

    if (!modalButton || !modal) return;

    // Open modal
    modalButton.addEventListener("click", () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    });

    // Close modal (X or close buttons)
    document.querySelectorAll("[data-modal-close]").forEach(btn => {
        btn.addEventListener("click", () => {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        });
    });

    // Prevent inside clicks from closing modal
    modalContent.addEventListener("click", e => e.stopPropagation());

    // Close when clicking outside
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
        }
    });
});