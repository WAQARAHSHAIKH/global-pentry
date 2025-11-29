{{-- Bootstrap Modal for Adding a New Recipe --}}
<div class="modal fade" id="addRecipeModal" tabindex="-1" aria-labelledby="addRecipeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 shadow-lg border-0">
            
            {{-- Modal Header --}}
            <div class="modal-header border-0 pb-0">
                <h3 class="modal-title fw-bold text-dark" id="addRecipeModalLabel">Add Your Recipe</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            {{-- Modal Body - The Form --}}
            <div class="modal-body pt-2 px-4 px-md-5">
                <form id="addRecipeForm" action="#" method="POST" enctype="multipart/form-data">
                    
                    {{-- Recipe Title --}}
                    <div class="mb-3">
                        <label for="recipeTitle" class="form-label h6 text-dark">Recipe Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg rounded-3 transition-200" id="recipeTitle" name="title" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label h6 text-dark">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control form-control-lg rounded-3 transition-200" id="description" name="description" rows="3" required></textarea>
                    </div>
                    
                    {{-- Image Upload --}}
                    <div class="mb-4">
                        <label for="recipeImage" class="form-label h6 text-dark">Upload Image <span class="text-danger">*</span></label>
                        <input class="form-control form-control-lg rounded-3 transition-200" type="file" id="recipeImage" name="image" required>
                    </div>
                    
                    {{-- Additional fields (Cuisine, Prep Time, Ingredients, etc.) for a more complete form --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cuisine" class="form-label h6 text-dark">Cuisine</label>
                            <select class="form-select form-select-lg rounded-3 transition-200" id="cuisine" name="cuisine">
                                <option value="" selected>Select Cuisine</option>
                                <option value="italian">Italian</option>
                                <option value="indian">Indian</option>
                                <option value="mexican">Mexican</option>
                                <option value="japanese">Japanese</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="prepTime" class="form-label h6 text-dark">Prep Time (Mins)</label>
                            <input type="number" class="form-control form-control-lg rounded-3 transition-200" id="prepTime" name="prep_time" placeholder="e.g., 30">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="instructions" class="form-label h6 text-dark">Instructions</label>
                        <textarea class="form-control form-control-lg rounded-3 transition-200" id="instructions" name="instructions" rows="5" placeholder="Step-by-step cooking directions"></textarea>
                    </div>

                    {{-- Submission Button --}}
                    <div class="d-grid mb-3">
                        <button type="submit" 
                            class="btn btn-warning btn-lg fw-bold text-uppercase rounded-3 shadow-sm hover-scale-105">
                            Submit Recipe
                        </button>
                    </div>
                </form>
            </div>
            
            {{-- Modal Footer (Optional - can be used for extra links or info) --}}
            <div class="modal-footer border-0 pt-0 justify-content-center">
                <p class="text-muted small">All fields marked with (<span class="text-danger">*</span>) are mandatory.</p>
            </div>

        </div>
    </div>
</div>