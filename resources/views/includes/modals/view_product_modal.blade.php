{{-- Modal for viewing a product's full details (used by the "View" search) --}}

<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content rounded-4 shadow-lg">
<div class="modal-header bg-info text-white">
<h5 class="modal-title" id="viewProductModalLabel"><i class="fas fa-info-circle me-2"></i> Product Details</h5>
<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<h6 id="view-product-details-title" class="fw-bold text-primary mb-3"></h6>
<div id="view-product-details-body">
{{-- Dynamic product details will be injected here by JavaScript/Blade --}}
<p class="text-muted">Product details loading...</p>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>