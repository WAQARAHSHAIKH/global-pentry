@extends('layout.admin')

@section('title', 'Add New Recipe')

@section('content')
<div class="container py-5">
    <h1 class="text-success fw-bold mb-4"><i class="fas fa-plus-circle me-2"></i> Add New Recipe</h1>
    <div class="card shadow-lg rounded-4 p-4">
        <form action="{{ route('recipes.store') }}" method="POST">
            @csrf

            {{-- Title & Cuisine --}}
            <div class="mb-3">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Cuisine</label>
                <input type="text" class="form-control" name="cuisine" value="{{ old('cuisine') }}">
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>

            {{-- Prep, Cook, Servings --}}
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Prep Time (mins)</label>
                    <input type="number" class="form-control" name="prep_time" min="0" value="{{ old('prep_time') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cook Time (mins)</label>
                    <input type="number" class="form-control" name="cook_time" min="0" value="{{ old('cook_time') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Servings</label>
                    <input type="number" class="form-control" name="servings" min="1" value="{{ old('servings') }}">
                </div>
            </div>

            {{-- Ingredients --}}
            <div class="mb-3">
                <label class="form-label">Ingredients (one per line) <span class="text-danger">*</span></label>
                <textarea class="form-control" name="ingredients" rows="5" required>{{ old('ingredients') }}</textarea>
            </div>

            {{-- Instructions --}}
            <div class="mb-3">
                <label class="form-label">Instructions (one step per line) <span class="text-danger">*</span></label>
                <textarea class="form-control" name="instructions" rows="7" required>{{ old('instructions') }}</textarea>
            </div>

            {{-- Image URL --}}
            <div class="mb-4">
                <label class="form-label">Image URL (Optional)</label>
                <input type="url" class="form-control" name="image_url" value="{{ old('image_url') }}">
            </div>

            {{-- Submit --}}
            <div class="d-flex justify-content-between">
                <a href="{{ route('recipes.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-success">Add Recipe</button>
            </div>
        </form>
    </div>
</div>
@endsection
