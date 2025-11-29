@extends('layout.app')

@section('content')

{{-- Assume $is_logged_in is passed from the controller, or default to false for mock up --}}
<?php $is_logged_in = false; ?>

{{-- Push style to ensure content is below the fixed header --}}
@push('styles')
<style>
    .recipe-header-spacing {
        /* Pushes the content down below the fixed header */
        padding-top: 100px; 
    }
    .gated-content-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        backdrop-filter: blur(8px); /* Blur effect for hiding content */
        background-color: rgba(255, 255, 255, 0.4);
        z-index: 10;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        border-radius: 0.5rem;
    }
    .gated-instructions {
        position: relative;
    }
</style>
@endpush

<main class="recipe-header-spacing">
    <div class="container py-5">
        
        {{-- Recipe Header and Image --}}
        <div class="row g-4 mb-5">
            <div class="col-lg-8">
                {{-- Recipe Title and Metadata --}}
                <div class="pe-lg-4">
                    <h1 class="display-3 fw-bolder text-dark mb-3">Authentic Thai Green Curry</h1>
                    
                    {{-- Key Details Row --}}
                    <div class="d-flex align-items-center flex-wrap gap-4 text-muted mb-4">
                        <span class="d-flex align-items-center small fw-semibold">
                            <i class="fas fa-globe me-2 text-success"></i> Cuisine: Thai
                        </span>
                        <span class="d-flex align-items-center small fw-semibold">
                            <i class="fas fa-clock me-2 text-success"></i> Prep Time: 15 mins
                        </span>
                        <span class="d-flex align-items-center small fw-semibold">
                            <i class="fas fa-fire me-2 text-success"></i> Cook Time: 25 mins
                        </span>
                    </div>

                    {{-- Rating and Description --}}
                    <div class="mb-4">
                        <div class="text-warning h4 mb-2">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            <span class="text-muted ms-2 h6 fw-normal">(4.7/5 from 312 reviews)</span>
                        </div>
                        <p class="lead text-dark">
                            A classic, vibrant green curry packed with the flavors of lemongrass, galangal, and kaffir lime. This recipe guarantees creamy richness and authentic Southeast Asian spice.
                        </p>
                    </div>

                    {{-- Action Button --}}
                    <form>
                    <div class="d-flex align-items-center mb-4">
                        <label class="me-2">Quantity:</label>
                        <input type="number" name="quantity" value="1" min="1" class="form-control w-25">
                    </div>

                    <a href="{{ route('cart') }}" class="theme-btn me-3">
                        Add to Cart
                        <span class="leaf-icon"><i class="fa-solid fa-leaf"></i></span>
                    </a>

                    <a href="{{ route('checkout') }}" class="theme-btn alt-btn">
                        Buy Now
                        <span class="leaf-icon"><i class="fa-solid fa-leaf"></i></span>
                    </a>
                </form>
                </div>
            </div>
            
            {{-- Recipe Image --}}
            <div class="col-lg-4">
                <img src="/images/curry.jpg" 
                     alt="Authentic Thai Green Curry" 
                     class="w-100 h-100 rounded-4 shadow-lg object-fit-cover" 
                     style="max-height: 400px;">
            </div>
        </div>

        {{-- Main Recipe Body: Ingredients and Instructions --}}
        <div class="row g-5">
            
            {{-- Left Column: Ingredients --}}
            <div class="col-lg-4">
                <div class="card h-100 rounded-4 shadow-lg border-0 p-4 bg-light">
                    <h2 class="h3 fw-bold text-dark mb-4">Ingredients</h2>
                    
                    {{-- Gated Content Wrapper --}}
                    <div class="gated-instructions">
                        
                        {{-- Mock List of Ingredients --}}
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2 pb-2 border-bottom small text-dark">
                                <i class="fas fa-check-square text-success me-2"></i> 400ml Coconut Milk
                            </li>
                            <li class="mb-2 pb-2 border-bottom small text-dark">
                                <i class="fas fa-check-square text-success me-2"></i> 2 Chicken Breasts (sliced)
                            </li>
                            <li class="mb-2 pb-2 border-bottom small text-dark">
                                <i class="fas fa-check-square text-success me-2"></i> 2 tbsp Green Curry Paste (Thai)
                            </li>
                            <li class="mb-2 pb-2 border-bottom small text-dark">
                                <i class="fas fa-check-square text-success me-2"></i> 1 Red Bell Pepper
                            </li>
                            
                            {{-- Conditional Content: Hidden Ingredients --}}
                            @if(!$is_logged_in)
                            <div class="gated-content-overlay rounded-3">
                                <div class="p-3">
                                    <i class="fas fa-lock h1 text-success mb-3"></i>
                                    <p class="fw-bold mb-1">Ingredients Locked</p>
                                    <p class="small mb-3">Sign up or log in to view the remaining 6 authentic ingredients!</p>
                                    <a href="{{ url('login') }}" class="btn btn-success btn-sm rounded-pill fw-bold">Unlock Now</a>
                                </div>
                            </div>
                            @endif

                            <li class="mb-2 pb-2 border-bottom small text-dark {{ !$is_logged_in ? 'text-white' : '' }}">
                                <i class="fas fa-check-square text-success me-2"></i> 1 tbsp Fish Sauce
                            </li>
                            <li class="mb-2 pb-2 border-bottom small text-dark {{ !$is_logged_in ? 'text-white' : '' }}">
                                <i class="fas fa-check-square text-success me-2"></i> 2 Kaffir Lime Leaves
                            </li>
                            <li class="mb-2 pb-2 border-bottom small text-dark {{ !$is_logged_in ? 'text-white' : '' }}">
                                <i class="fas fa-check-square text-success me-2"></i> 1 tbsp Brown Sugar
                            </li>
                            <li class="mb-2 pb-2 border-bottom small text-dark {{ !$is_logged_in ? 'text-white' : '' }}">
                                <i class="fas fa-check-square text-success me-2"></i> 1/2 cup Thai Basil Leaves
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Right Column: Instructions --}}
            <div class="col-lg-8">
                <div class="gated-instructions">
                    <h2 class="h3 fw-bold text-dark mb-4">Step-by-Step Instructions</h2>
                    
                    {{-- Mock Instruction Steps --}}
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex border-0 p-3 mb-2 bg-light rounded-3 shadow-sm">
                            <span class="fw-bold me-3">1.</span>
                            <span class="text-dark">Prep: Slice the chicken breast and vegetables. Set aside the lime leaves and basil.</span>
                        </li>
                        <li class="list-group-item d-flex border-0 p-3 mb-2 bg-light rounded-3 shadow-sm">
                            <span class="fw-bold me-3">2.</span>
                            <span class="text-dark">Sauté: Heat 1 tbsp of oil in a wok or large pot. Add the curry paste and fry for 1 minute until fragrant.</span>
                        </li>
                        <li class="list-group-item d-flex border-0 p-3 mb-2 bg-light rounded-3 shadow-sm">
                            <span class="fw-bold me-3">3.</span>
                            <span class="text-dark">Simmer: Pour in the coconut milk. Stir until the paste is fully dissolved. Bring the mixture to a gentle boil.</span>
                        </li>
                        
                        {{-- Conditional Content: Hidden Instructions --}}
                        @if(!$is_logged_in)
                        <div class="gated-content-overlay rounded-3">
                            <div class="p-3">
                                <i class="fas fa-lock h1 text-success mb-3"></i>
                                <p class="fw-bold mb-1">Instructions Locked</p>
                                <p class="small mb-3">Log in to view the final, crucial 4 steps for perfect curry consistency and flavor!</p>
                                <a href="{{ url('login') }}" class="btn btn-success btn-sm rounded-pill fw-bold">Unlock Now</a>
                            </div>
                        </div>
                        @endif

                        <li class="list-group-item d-flex border-0 p-3 mb-2 bg-light rounded-3 shadow-sm {{ !$is_logged_in ? 'text-white' : '' }}">
                            <span class="fw-bold me-3">4.</span>
                            <span class="text-dark">Cook Chicken: Add the sliced chicken and continue to simmer until it is fully cooked through.</span>
                        </li>
                        <li class="list-group-item d-flex border-0 p-3 mb-2 bg-light rounded-3 shadow-sm {{ !$is_logged_in ? 'text-white' : '' }}">
                            <span class="fw-bold me-3">5.</span>
                            <span class="text-dark">Season: Add the fish sauce, brown sugar, and lime leaves. Taste and adjust seasoning as needed.</span>
                        </li>
                        <li class="list-group-item d-flex border-0 p-3 mb-2 bg-light rounded-3 shadow-sm {{ !$is_logged_in ? 'text-white' : '' }}">
                            <span class="fw-bold me-3">6.</span>
                            <span class="text-dark">Final Touch: Stir in the Thai basil and turn off the heat immediately.</span>
                        </li>
                        <li class="list-group-item d-flex border-0 p-3 mb-2 bg-light rounded-3 shadow-sm {{ !$is_logged_in ? 'text-white' : '' }}">
                            <span class="fw-bold me-3">7.</span>
                            <span class="text-dark">Serve: Serve hot over steamed jasmine rice. Enjoy!</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        
        <hr class="my-5">

        {{-- Reviews Section Placeholder --}}
        <section id="reviews">
            <h2 class="h3 fw-bold text-dark mb-4">Community Reviews</h2>
            <div class="p-4 bg-light rounded-4 shadow-sm">
                <p class="text-muted mb-0">
                    This section will be built out later to allow members to leave star ratings and comments on the recipe.
                </p>
            </div>
        </section>

    </div>
</main>

{{-- MODAL for when guest tries to save recipe --}}
@include('includes.modals.login_required_modal')

@endsection