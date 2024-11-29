<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;

class RecipeController extends Controller
{
    // Fungsi untuk menampilkan semua resep
    public function index()
    {
        $recipes = Recipe::with('category')->get();
        return view('recipes.index', compact('recipes'));
    }

    // Fungsi untuk menampilkan form pembuatan resep
    public function create()
    {
        $categories = Category::all();
        return view('recipes.create', compact('categories'));
    }

    // Fungsi untuk menyimpan resep baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk gambar
        ]);

        // Buat instance baru dari Recipe
        $recipe = new Recipe();
        $recipe->title = $request->input('title');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->instructions = $request->input('instructions');
        $recipe->category_id = $request->input('category_id');

        // Proses upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $recipe->image = $imagePath;
        }

        // Simpan resep
        $recipe->save();

        // Redirect dengan pesan sukses
        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
    }

    // Fungsi untuk menampilkan detail resep
    public function show($id)
    {
        // Retrieve the recipe from the database using the given ID
        $recipe = Recipe::find($id);

        // Check if the recipe exists
        if (!$recipe) {
            return redirect()->route('recipes.index')->with('error', 'Recipe not found');
        }

        // Pass the recipe to the view
        return view('recipes.show', compact('recipe'));
    }


    // Fungsi untuk menampilkan form edit resep
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        $categories = Category::all();
        return view('recipes.edit', compact('recipe', 'categories'));
    }

    // Fungsi untuk memperbarui resep
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'ingredients' => 'required',
            'instructions' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Gambar tidak wajib
        ]);

        // Temukan resep berdasarkan ID
        $recipe = Recipe::findOrFail($id);

        // Perbarui data
        $recipe->title = $request->input('title');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->instructions = $request->input('instructions');
        $recipe->category_id = $request->input('category_id');

        // Perbarui gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $recipe->image = $imagePath;
        }

        $recipe->save();

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully.');
    }

    // Fungsi untuk menghapus resep
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully.');
    }

    public function welcome()
    {
        $recipes = Recipe::all(); // Mengambil semua data resep dari database
        return view('welcome', compact('recipes'));
    }

    public function showRecipe($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            abort(404, 'Recipe not found');
        }

        return view('recipes.show', compact('recipe'));
    }



}
