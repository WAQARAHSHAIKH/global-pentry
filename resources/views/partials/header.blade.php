{{-- Sticky Navigation Bar --}}
<header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top py-3">
    <div class="container">
        
        {{-- Logo/Brand Name --}}
        <a class="navbar-brand fw-bolder fs-3 text-success" href="{{ url('/') }}">
            <i class="fas fa-utensils me-2"></i> The Global Pantry
        </a>
        
        {{-- Mobile Toggler --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        {{-- Navigation Links and Buttons --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3 align-items-center">
                
                <li class="nav-item">
                    <a class="nav-link fw-semibold" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('browse') }}">Recipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/#about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/#contact') }}">Contact</a>
                </li>
                
            </ul>

            {{-- Action Button: Login/Sign Up --}}
            <a href="{{ url('login') }}" class="btn btn-success fw-bold rounded-pill px-4 text-uppercase shadow-sm">
                Login / Sign Up
            </a>

        </div>
    </div>
</header>