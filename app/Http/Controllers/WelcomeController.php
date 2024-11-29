<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class WelcomeController extends Controller
{
    public function index()
    {
        // Mengambil semua resep dari database
        $recipes = Recipe::with('category')->get();

        // Mengirimkan data resep ke halaman welcome
        return view('welcome', compact('recipes'));
    }
}

