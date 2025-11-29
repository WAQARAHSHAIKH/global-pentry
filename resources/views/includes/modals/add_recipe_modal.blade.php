<div class="modal fade" id="addRecipeModal" tabindex="-1" aria-labelledby="addRecipeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg">
            
            <div class="modal-header border-bottom-0">
                <h3 class="modal-title fw-bold text-primary" id="addRecipeModalLabel">
                    <i class="fas fa-plus-circle me-2"></i> Add Your Recipe
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body p-4 p-md-5">
                <p class="text-muted mb-4">
                    Share your authentic recipe with the world! Please fill out all required fields.
                </p>

                {{-- The form ID 'addRecipeForm' is critical for the JavaScript to work --}}
                <form id="addRecipeForm" action="#" method="POST" enctype="multipart/form-data">
                    
                    {{-- Recipe Title --}}
                    <div class="mb-4">
                        <label for="recipeTitle" class="form-label fw-semibold text-dark">Recipe Title <span class="text-danger">*</span></label>
                        <input type="text" id="recipeTitle" name="title" class="form-control form-control-lg rounded-3" placeholder="e.g., Spicy Chicken Tikka Masala" required>
                    </div>

                    {{-- Short Description --}}
                    <div class="mb-4">
                        <label for="description" class="form-label fw-semibold text-dark">Description / Summary <span class="text-danger">*</span></label>
                        <textarea id="description" name="description" rows="3" class="form-control form-control-lg rounded-3" placeholder="A brief, enticing summary of your dish..." required></textarea>
                    </div>

                    {{-- Main Image Upload --}}
                    <div class="mb-4">
                        <label for="recipeImage" class="form-label fw-semibold text-dark">Upload Main Dish Photo <span class="text-danger">*</span></label>
                        <input type="file" id="recipeImage" name="image" class="form-control rounded-3" accept="image/*" required>
                        <div class="form-text mt-2">
                            A high-quality photo makes your recipe stand out!
                        </div>
                    </div>
                    
                    {{-- Additional optional fields for context (e.g., cuisine, ingredients) --}}
                    
                    {{-- Cuisine Type --}}
                    <div class="mb-4">
                        <label for="cuisine" class="form-label fw-semibold text-dark">Cuisine Type</label>
                        <select id="cuisine" name="cuisine" class="form-select form-select-lg rounded-3">
                            <option value="">Select Cuisine</option>
                            <option value="indian">Indian</option>
                            <option value="italian">Italian</option>
                            <option value="mexican">Mexican</option>
                            <option value="japanese">Japanese</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    {{-- Submit Button --}}
                    <div class="d-grid gap-2 pt-3">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold rounded-pill shadow-sm text-uppercase">
                            Submit Recipe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>