@extends('layout.admin')

@section('title', $recipe->title)

@section('content')
<div class="container py-5">
    <h1 class="fw-bold mb-4">{{ $recipe->title }}</h1>
    <div class="row">
        <div class="col-md-4">
            <img src="{{ $recipe->image_url ?? 'https://via.placeholder.com/400x250' }}" class="img-fluid rounded shadow-sm mb-3" alt="{{ $recipe->title }}">
            <ul class="list-group">
                <li class="list-group-item"><strong>Cuisine:</strong> {{ $recipe->cuisine ?? 'N/A' }}</li>
                <li class="list-group-item"><strong>Prep Time:</strong> {{ $recipe->prep_time }} mins</li>
                <li class="list-group-item"><strong>Cook Time:</strong> {{ $recipe->cook_time }} mins</li>
                <li class="list-group-item"><strong>Servings:</strong> {{ $recipe->servings }}</li>
            </ul>
            <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-warning mt-3">Edit</a>
            <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-3">Delete</button>
            </form>
        </div>

        <div class="col-md-8">
            <div class="mb-3">
                <h4>Description</h4>
                <p>{{ $recipe->description }}</p>
            </div>
            <div class="mb-3">
                <h4>Ingredients</h4>
                <ul>
                    @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                        @if(trim($ingredient))
                            <li>{{ trim($ingredient) }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="mb-3">
                <h4>Instructions</h4>
                <ol>
                    @foreach(explode("\n", $recipe->instructions) as $step)
                        @if(trim($step))
                            <li>{{ trim($step) }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
