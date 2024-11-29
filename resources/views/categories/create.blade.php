<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Category</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-purple-600 via-pink-500 to-purple-600 min-h-screen">

    <div class="container mx-auto mt-12 p-6 bg-white rounded-lg shadow-lg w-3/4 mb-12">
        <h1 class="text-center text-3xl font-semibold text-purple-600 mb-6">Create New Category</h1>

        <form action="{{ route('category.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-lg font-medium text-gray-700">Category Name:</label>
                <input type="text" name="name" id="name" class="mt-2 p-3 border rounded-lg w-full" value="{{ old('name') }}" required>
            </div>

            <div class="flex space-x-4 mt-6">
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">Create Category</button>
                <a href="{{ route('category.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-200">Back to Categories</a>
            </div>
        </form>
    </div>

</body>
</html>
