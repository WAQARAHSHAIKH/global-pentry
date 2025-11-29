{{-- Product Title --}}
                <div class="mb-3">
                    <label for="product-title" class="form-label fw-semibold">Product Title</label>
                    <input type="text" class="form-control rounded-3" id="product-title" name="title" placeholder="e.g., Organic Honey" required>
                </div>
                
                {{-- Price and Stock --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="product-price" class="form-label fw-semibold">Price ($)</label>
                        <input type="number" step="0.01" class="form-control rounded-3" id="product-price" name="price" placeholder="e.g., 15.99" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="product-stock" class="form-label fw-semibold">Stock Quantity</label>
                        <input type="number" class="form-control rounded-3" id="product-stock" name="stock" placeholder="e.g., 200" required>
                    </div>
                </div>

                {{-- Category and Image --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="product-category" class="form-label fw-semibold">Category</label>
                        <select class="form-select rounded-3" id="product-category" name="category_id" required>
                            <option value="" disabled selected>Select a category</option>
                            <option value="1">Spices</option>
                            <option value="2">Produce</option>
                            <option value="3">Grains</option>
                            {{-- Loop through categories here: @foreach ($categories as $category) ... @endforeach --}}
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="product-image" class="form-label fw-semibold">Product Image</label>
                        <input type="file" class="form-control rounded-3" id="product-image" name="image" accept="image/*">
                        <small class="text-muted">Optional, but recommended.</small>
                    </div>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="product-description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control rounded-3" id="product-description" name="description" rows="3" placeholder="Brief description of the product..."></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success rounded-pill"><i class="fas fa-upload me-1"></i> Submit Product</button>
            </div>
        </form>
    </div>
</div>