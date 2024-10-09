<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;

class RecipeController extends Controller
{

    public function index()
    {
        $recipes = Recipe::with('category')->get();
        return view('recipes.index', compact('recipes'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('recipes.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $new = new Recipe;
        $new->title = $request->title;
        $new->ingredients = $request->ingredients;
        $new->instructions = $request->instructions;
        $new->category_id = $request->category_id;
        $new->save();

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully.');
    }

    public function show(string $id)
    {

    }


    public function edit(Request $request, string $id)
    {
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $recipe = Recipe::findOrFail($id);

        $recipe->update([
            'title' => $request->input('title'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'category_id' => $request->input('category_id'),
        ]);


        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }

    public function destroy(Request $request, string $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }


}
