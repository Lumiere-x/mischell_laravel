<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category - {{ $category->name }}</title>
     @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-purple-500 to-pink-500 min-h-screen flex items-center justify-center">

<div class="max-w-2xl w-full p-5 bg-white rounded-lg shadow-xl">
    <h1 class="text-2xl font-bold text-center text-purple-700 mb-5">Edit Category - {{ $category->name }}</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-800 p-3 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-lg font-semibold text-gray-700">Category Name:</label>
            <input type="text" name="name" id="name" class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-400 text-gray-800" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="flex justify-between">
            <button type="submit" class="px-5 py-2 text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-400 rounded-lg shadow-lg transition-all">
                Update Category
            </button>
            <a href="{{ route('category.index') }}" class="px-5 py-2 text-white bg-gradient-to-r from-gray-400 to-gray-600 hover:from-gray-500 hover:to-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded-lg shadow-lg transition-all">
                Back to Categories
            </a>
        </div>
    </form>
</div>

</body>
</html>
