<form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete the recipe: {{ $recipe->title }}? This cannot be undone.');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Recipe">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>