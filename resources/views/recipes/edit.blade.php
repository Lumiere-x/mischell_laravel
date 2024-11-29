<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe - {{ $recipe->title }}</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-purple-500 to-pink-500 min-h-screen flex items-center justify-center">

<div class="max-w-2xl w-full p-5 bg-white rounded-lg shadow-xl">
    <h1 class="text-2xl font-bold text-center text-purple-700 mb-5">Edit Recipe - {{ $recipe->title }}</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-800 p-3 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold text-gray-700">Title:</label>
            <input type="text" name="title" id="title" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 text-gray-800" value="{{ old('title', $recipe->title) }}" required>
        </div>

        <div class="mb-4">
            <label for="ingredients" class="block text-lg font-semibold text-gray-700">Ingredients:</label>
            <textarea name="ingredients" id="ingredients" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 text-gray-800" rows="3" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="instructions" class="block text-lg font-semibold text-gray-700">Instructions:</label>
            <textarea name="instructions" id="instructions" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 text-gray-800" rows="3" required>{{ old('instructions', $recipe->instructions) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-lg font-semibold text-gray-700">Category:</label>
            <select name="category_id" id="category_id" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 text-gray-800" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-lg font-semibold text-gray-700">Image:</label>
            <input type="file" name="image" id="image" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 text-gray-800" accept="image/*">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="px-5 py-2 text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400 rounded-lg shadow-lg transition-all">
                Update Recipe
            </button>
            <a href="{{ route('recipes.index') }}" class="px-5 py-2 text-white bg-gradient-to-r from-gray-400 to-gray-600 hover:from-gray-500 hover:to-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded-lg shadow-lg transition-all">
                Back to Recipes
            </a>
        </div>
    </form>
</div>

</body>
</html>
