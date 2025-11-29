<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource (Admin Dashboard).
     */
    public function index()
    {
        // 1. Fetch all recipes from the database
        $recipes = Recipe::all();
        
        // 2. Load the admin dashboard view and pass the recipes data
        return view('admin.recipes.index', [
            'recipes' => $recipes,
        ]);
    }

    // --- Front-End Methods from routes/web.php ---

    /**
     * Display the front-end recipe browsing page.
     */
    public function browse()
    {
        // Fetches all recipes to display on the main product listing page
        $recipes = Recipe::all();
        return view('browse', compact('recipes'));
    }

    /**
     * Display the single front-end recipe detail page.
     */
    public function detail(Recipe $recipe)
    {
        // Uses Route Model Binding to automatically retrieve the recipe
        return view('recipe_detail', compact('recipe'));
    }

    // --- CRUD Resource Methods ---

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cuisine' => 'nullable|string|max:100',
            'prep_time' => 'nullable|integer|min:0',
            'cook_time' => 'nullable|integer|min:0',
            'instructions' => 'required|string',
            // Note: Image upload logic should be added here later.
        ]);

        // 2. Create and save the new recipe to the database
        Recipe::create($validated);

        // 3. Redirect back to the index with a success message
        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        // For admin view of a single recipe
        return view('admin.recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        return view('admin.recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        // 1. Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cuisine' => 'nullable|string|max:100',
            'prep_time' => 'nullable|integer|min:0',
            'cook_time' => 'nullable|integer|min:0',
            'instructions' => 'required|string',
            // Note: Image upload logic should be added here later.
        ]);
        
        // 2. Update the existing recipe in the database
        $recipe->update($validated);

        // 3. Redirect back to the index with a success message
        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }

        public function homepage()
    {
        $recipes = Recipe::latest()->take(4)->get();
        return view('homepage', compact('recipes'));
    }
}