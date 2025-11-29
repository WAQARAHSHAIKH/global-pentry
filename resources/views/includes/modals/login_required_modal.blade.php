{{-- LOGIN REQUIRED MODAL (Bootstrap Modal) --}}
<div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-labelledby="loginRequiredModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow-lg p-3">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center pt-0">
                <i class="fas fa-lock text-primary display-3 mb-3"></i>
                <h5 class="modal-title fw-bold text-dark mb-2" id="loginRequiredModalLabel">Action Requires Membership</h5>
                <p class="text-muted small mb-4">
                    Please log in or create a free account to view the full recipe instructions and save recipes to your personal cookbook.
                </p>
                
                <a href="{{ url('login') }}" class="btn btn-primary fw-bold rounded-pill w-75 py-2 mb-2">
                    Login / Sign Up Now
                </a>
                
                <button type="button" class="btn btn-outline-secondary rounded-pill w-75 py-2" data-bs-dismiss="modal">
                    Maybe Later
                </button>
            </div>
        </div>
    </div>
</div>

{{-- This script handles showing the modal when a gated action is attempted --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isLoggedIn = false; // Placeholder for actual login check logic
        const saveButton = document.querySelector('.btn-lg .far.fa-heart').closest('button');

        if (saveButton && !isLoggedIn) {
            saveButton.addEventListener('click', function(e) {
                e.preventDefault();
                // Get the Bootstrap modal instance and show it
                const loginModal = new bootstrap.Modal(document.getElementById('loginRequiredModal'));
                loginModal.show();
            });
        }
    });
</script>
@endpush