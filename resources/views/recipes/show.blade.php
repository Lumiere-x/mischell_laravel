<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recipe->title }} - Recipe Details</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-purple-500 to-pink-500 min-h-screen flex items-center justify-center">

<div class="max-w-2xl w-full p-5 bg-white rounded-lg shadow-xl">
    <h1 class="text-2xl font-bold text-center text-purple-700 mb-5">{{ $recipe->title }}</h1>

    <div class="mb-4">
        <h3 class="text-lg font-semibold text-gray-700">Ingredients:</h3>
        <p class="border p-3 rounded-md bg-gray-50">{{ $recipe->ingredients }}</p>
    </div>

    <div class="mb-4">
        <h3 class="text-lg font-semibold text-gray-700">Instructions:</h3>
        <p class="border p-3 rounded-md bg-gray-50">{{ $recipe->instructions }}</p>
    </div>

    <div class="mb-4">
        <h3 class="text-lg font-semibold text-gray-700">Category:</h3>
        <p class="inline-block text-gray-600 font-medium mt-2">{{ $recipe->category->name }}</p>
    </div>

    <div class="mt-6 flex space-x-4 justify-center">
        <a href="{{ url('/') }}" class="px-5 py-2 text-white bg-gradient-to-r from-gray-400 to-gray-600 hover:from-gray-500 hover:to-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded-lg shadow-lg transition-all">
            Back to Home
        </a>
        <a href="{{ route('recipes.edit', $recipe->id) }}" class="px-5 py-2 text-white bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-400 rounded-lg shadow-lg transition-all">
            Edit
        </a>

        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-5 py-2 text-white bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 focus:outline-none focus:ring-2 focus:ring-red-400 rounded-lg shadow-lg transition-all" onclick="return confirm('Are you sure you want to delete this recipe?')">
                Delete
            </button>
        </form>
    </div>
</div>

</body>
</html>
