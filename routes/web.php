<?php

use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;


Route::resource('category', CategoryController::class);
Route::resource('recipes', RecipeController::class);
Route::get('/recipes/{id}', [RecipeController::class, 'showRecipe']);
Route::get('/show/{id}', [RecipeController::class, 'show']);


Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::redirect('/login', '/auth/login');
Route::redirect('/register', '/auth/register');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('auth.login');
})->name('logout');

Route::get('/', function () {
    return view('/');
})->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
    $recipes = Recipe::all();
    $user = Auth::user();  // Get logged-in user
    return view('welcome', compact('recipes', 'user')); // Pass user along with recipes
});


