@extends('layout.app')

@section('content')

@push('styles')
<style>
    /* Custom CSS for the banner background and overlay */
    .banner-bg {
        /* Use a placeholder image or your actual asset path here */
        background-image: url('https://images.unsplash.com/photo-1623475173140-ad2f0369ca92?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGdsb2JhbCUyMGN1aXNpbmV8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&q=60&w=500');
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .banner-overlay {
        background-color: rgba(0, 0, 0, 0.6); /* Darkens the background image */
    }
</style>
@endpush

<main>
    {{-- Banner Section --}}
    <section id="home" class="banner-bg vh-60 vh-md-80 d-flex align-items-center justify-content-center rounded-bottom shadow-lg position-relative">
        <div class="banner-overlay position-absolute top-0 bottom-0 start-0 end-0 rounded-bottom"></div>
        <div class="container text-center z-1 p-4 rounded-3 position-relative">
            <h1 class="display-4 fw-bolder text-white mb-3 text-shadow">
                Discover & Share Global Recipes
            </h1>
            <p class="lead text-light mb-4 mx-auto text-shadow" style="max-width: 600px;">
                Explore authentic dishes from every corner of the world. Join our community of food lovers!
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3">
                <button type="button" data-bs-toggle="modal" data-bs-target="#addRecipeModal"
    class="btn btn-warning btn-lg fw-bold px-5 rounded-pill shadow-lg hover-scale-105 add-recipe">
    <i class="fas fa-plus me-2"></i> Add Your Recipe
</button>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="py-5 py-md-5 container">
        <div class="text-center mx-auto" style="max-width: 800px;">
            <h2 class="h3 h1-md fw-bold text-dark mb-3">Our Mission: Connecting Cultures Through Cooking</h2>
            <div class="bg-primary mx-auto mb-4 rounded-pill" style="height: 4px; width: 80px;"></div>
            <p class="lead text-muted">
                The Global Pantry is more than just a recipe database; it's a <strong>global cooking community</strong>.
                We believe that food is the purest expression of culture. Our platform is dedicated to curating and
                sharing authentic recipes, offering <strong>Free tutorials</strong>, and providing resources that empower
                home cooks to explore and celebrate diverse culinary traditions.
            </p>
        </div>
    </section>

    {{-- Value Proposition Section --}}
    <section class="py-5 bg-white shadow-inset">
        <div class="container">
            <div class="row align-items-center gap-4 gap-md-5 mx-auto" style="max-width: 1100px;">
                {{-- Text Content --}}
                <div class="col-md-6 order-2 order-md-1 p-3">
                    <p class="text-success fw-semibold text-uppercase mb-2">Our Values</p>
                    <h3 class="h2 fw-bold text-dark mb-4">Cook. Learn. Inspire.</h3>
                    
                    <ul class="list-unstyled text-muted h5">
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-check-circle text-success h5 me-3 flex-shrink-0 mt-1"></i>
                            <span>Authenticity First: Every recipe is sourced and vetted for cultural accuracy.</span>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-lock text-success h5 me-3 flex-shrink-0 mt-1"></i>
                            <span>Gated Education: We provide full ingredient lists and tutorials exclusively for our registered members.</span>
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-users text-success h5 me-3 flex-shrink-0 mt-1"></i>
                            <span>Community Focused: A space for cooks of all levels to connect, share tips, and grow their skills.</span>
                        </li>
                    </ul>
                </div>
                {{-- Image --}}
                <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0" style="height: 75vh;">
                    <img src="https://images.unsplash.com/photo-1549590143-d5855148a9d5?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzV8fENIRUZ8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&q=60&w=600" alt="A chef preparing food" class="w-100 h-100 rounded-3 shadow-lg object-fit-cover" onerror="this.onerror=null; this.src='https://placehold.co/600x400/0E9F6E/FFFFFF?text=Chefs+Cooking';" />
                </div>
            </div>
        </div>
    </section>

    {{-- Recipes Preview Section --}}
{{-- Recipes Preview Section --}}
<section id="recipes" class="py-5 py-md-5 container">
    <div class="text-center mb-4">
        <h2 class="h3 h1-md fw-bold text-dark mb-2">Latest Recipes from The Pantry</h2>
        <p class="h5 text-muted">A taste of what our community is sharing right now.</p>
    </div>
    
    {{-- Recipe Cards --}}
    <div id="recipe-cards-grid-placeholder" class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
        @forelse($recipes as $recipe)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm hover-scale-105">
                <img src="{{ $recipe->image_url }}" class="card-img-top object-fit-cover h-48 rounded-top" alt="{{ $recipe->name }}">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-dark text-truncate">{{ $recipe->name }}</h5>
                    <p class="card-text small text-muted mb-1">Cuisine: {{ $recipe->cuisine }}</p>
                    <div class="text-warning small mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if($i <= floor($recipe->rating))
                                <i class="fas fa-star"></i>
                            @elseif($i - $recipe->rating < 1)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                        <span class="text-muted ms-1">({{ $recipe->reviews_count }} reviews)</span>
                    </div>
                    <a href="{{ route('recipe_detail', $recipe->id) }}" class="stretched-link text-success small fw-semibold">View Recipe</a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-muted">No recipes available at the moment.</p>
        @endforelse
    </div>

    <div class="text-center mt-5">
        <a href="{{ url('browse') }}"
            class="btn btn-primary bg-success btn-lg fw-bold px-5 rounded-pill shadow-lg hover-scale-105 text-uppercase">
            Browse All Recipes <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
</section>


    {{-- Contact Section --}}
    <section id="contact" class="py-5 py-md-5 bg-light">
        <div class="container mx-auto px-4" style="max-width: 800px;">
            <div class="text-center mb-4">
                <h2 class="h3 h1-md fw-bold text-dark mb-2">Get in Touch</h2>
                <p class="h5 text-muted">Have a question? We'd love to hear from you.</p>
            </div>

            <form id="contactForm" class="bg-white p-4 p-md-5 rounded-3 shadow-lg">
                <div class="mb-3">
                    <label for="name" class="form-label h6 text-dark">Your Name</label>
                    <input type="text" id="name" name="name" required
                        class="form-control form-control-lg transition-200">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label h6 text-dark">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="form-control form-control-lg transition-200">
                </div>
                <div class="mb-4">
                    <label for="message" class="form-label h6 text-dark">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="form-control form-control-lg transition-200"></textarea>
                </div>

                <button type="submit"
                    class="btn btn-primary bg-success btn-lg w-100 fw-bold rounded-3 shadow-lg hover-opacity-90 text-uppercase">
                    Send Message
                </button>
            </form>
        </div>
    </section>
</main>

{{-- MODALS must be included using their full path --}}
@include('includes.modals.add_recipe_modal')
@include('includes.modals.login_required_modal')

@endsection