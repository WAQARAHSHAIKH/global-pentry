@extends('layout.app')

@section('content')

{{-- Add a specific style to push the content down below the fixed header --}}
@push('styles')
<style>
    .browse-header-spacing {
        /* This pushes the content down to prevent it from being hidden 
           by the fixed/sticky navigation bar. Adjust padding as needed. */
        padding-top: 100px; 
    }
</style>
@endpush

<main class="browse-header-spacing">
    <div class="container py-5">
        {{-- Page Header and Introduction --}}
        <div class="mb-5">
            <h1 class="display-4 fw-bolder text-success mb-2">Explore World Cuisine</h1>
            <p class="lead text-muted">
                Discover recipes from every corner of the globe. Log in to view full instructions!
            </p>
        </div>

        {{-- Search and Filter Bar --}}
        <div class="row g-3 mb-5 align-items-center">
            {{-- Search Input (takes up 75% of the width on medium screens) --}}
            <div class="col-md-9 col-lg-9">
                <input type="text" class="form-control form-control-lg rounded-3 shadow-sm transition-200" 
                       placeholder="Search by title or cuisine..." id="searchInput">
            </div>
            
            {{-- Filter Dropdown --}}
            <div class="col-md-3 col-lg-2">
                <select class="form-select form-select-lg rounded-3 shadow-sm transition-200" id="cuisineFilter">
                    <option selected>Filter Cuisine</option>
                    <option value="all">All Cuisines</option>
                    <option value="italian">Italian</option>
                    <option value="indian">Indian</option>
                    <option value="mexican">Mexican</option>
                    <option value="japanese">Japanese</option>
                    <option value="other">Other...</option>
                </select>
            </div>
            
            {{-- Search Button (hidden on smaller screens where input is enough) --}}
            <div class="col-lg-1 d-none d-lg-block">
                <button class="btn btn-success btn-lg w-100 rounded-3 shadow-sm">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        {{-- Recipe Cards Grid (Dynamic content placeholder) --}}
        <div id="recipe-results" class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            
            {{-- Mock Card 1 (Spicy Chicken Tikka Masala) --}}
            <div class="col recipe-card">
                <div class="card h-100 border-0 shadow-sm hover-scale-105">
                    <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" class="card-img-top object-fit-cover h-48 rounded-top" alt="Spicy Chicken Tikka Masala">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark text-truncate">Spicy Chicken Tikka Masala</h5>
                        <p class="card-text small text-muted mb-1">Cuisine: Indian</p>
                        <div class="text-warning small mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            <span class="text-muted ms-1">4.8 (452 reviews)</span>
                        </div>
                        <a href="{{ url('recipe_detial') }}" class="stretched-link text-success small fw-semibold"></a>
                    </div>
                </div>
            </div>

            {{-- Mock Card 2 (Classic Creamy Carbonara) --}}
            <div class="col recipe-card">
                <div class="card h-100 border-0 shadow-sm hover-scale-105">
                    <img src="https://images.unsplash.com/photo-1551221590-0f2c00c7e26b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" class="card-img-top object-fit-cover h-48 rounded-top" alt="Classic Creamy Carbonara">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark text-truncate">Classic Creamy Carbonara</h5>
                        <p class="card-text small text-muted mb-1">Cuisine: Italian</p>
                        <div class="text-warning small mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            <span class="text-muted ms-1">4.5 (270 reviews)</span>
                        </div>
                        <a href="{{ url('recipe_detial') }}" class="stretched-link text-success small fw-semibold"></a>
                    </div>
                </div>
            </div>

            {{-- Mock Card 3 (Authentic Street Tacos) --}}
            <div class="col recipe-card">
                <div class="card h-100 border-0 shadow-sm hover-scale-105">
                    <img src="https://images.unsplash.com/photo-1551500057-0a442750e68d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" class="card-img-top object-fit-cover h-48 rounded-top" alt="Authentic Street Tacos">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark text-truncate">Authentic Street Tacos</h5>
                        <p class="card-text small text-muted mb-1">Cuisine: Mexican</p>
                        <div class="text-warning small mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                            <span class="text-muted ms-1">4.9 (89 reviews)</span>
                        </div>
                        <a href="{{ url('recipe_detial') }}" class="stretched-link text-success small fw-semibold"></a>
                    </div>
                </div>
            </div>

            {{-- Mock Card 4 (Quick Homemade Sushi) --}}
            <div class="col recipe-card">
                <div class="card h-100 border-0 shadow-sm hover-scale-105">
                    <img src="https://images.unsplash.com/photo-1553621040-c65113d091e9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80" class="card-img-top object-fit-cover h-48 rounded-top" alt="Quick Homemade Sushi">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark text-truncate">Quick Homemade Sushi ...</h5>
                        <p class="card-text small text-muted mb-1">Cuisine: Japanese</p>
                        <div class="text-warning small mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            <span class="text-muted ms-1">4.7 (125 reviews)</span>
                        </div>
                        <a href="{{ url('recipe_detail') }}" class="stretched-link text-success small fw-semibold"></a>
                    </div>
                </div>
            </div>
            
            {{-- Add more mock cards here for a longer list if desired --}}
            
        </div>
        
        {{-- Pagination Placeholder --}}
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-lg">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</main>

@endsection