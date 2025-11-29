<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row">
            
            {{-- Column 1: Brand Info --}}
            <div class="col-md-4 mb-4">
                <h5 class="fw-bolder text-success mb-3">The Global Pantry</h5>
                <p class="small text-muted">
                    Connecting cultures through authentic, free tutorials and community-shared recipes.
                </p>
                <div class="social-icons mt-3">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            {{-- Column 2: Quick Links --}}
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold mb-3 text-success">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 text-success"><a href="{{ url('/') }}" class="text-muted text-decoration-none small">Home</a></li>
                    <li class="mb-2 text-success"><a href="{{ url('browse') }}" class="text-muted text-decoration-none small">Browse Recipes</a></li>
                    <li class="mb-2 text-success"><a href="{{ url('/#about') }}" class="text-muted text-decoration-none small">About Us</a></li>
                    <li class="mb-2 text-success"><a href="{{ url('login') }}" class="text-muted text-decoration-none small">Member Login</a></li>
                </ul>
            </div>

            {{-- Column 3: Contact/Legal --}}
            <div class="col-md-5 mb-4">
                <h5 class="fw-bold mb-3 text-success">Support & Legal</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 text-muted small"><i class="fas fa-envelope me-2"></i> support@globalpantry.com</li>
                    <li class="mb-2 text-muted small"><i class="fas fa-phone me-2"></i> +1 (555) 123-4567</li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none small">Privacy Policy</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none small">Terms of Service</a></li>
                </ul>
            </div>

        </div>

        {{-- Copyright Row --}}
        <hr class="bg-secondary opacity-25">
        <div class="text-center">
            <p class="text-muted small mb-0">
                &copy; {{ date('Y') }} The Global Pantry. All rights reserved.
            </p>
        </div>
    </div>
</footer>