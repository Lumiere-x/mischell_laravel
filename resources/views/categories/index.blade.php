<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-purple-600 via-pink-500 to-purple-600 min-h-screen">

    <div class="container mx-auto mt-12 p-6 bg-white rounded-lg shadow-lg w-3/4 mb-12">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-center text-4xl font-semibold text-purple-600">Categories List</h1>
            <div class="flex space-x-4">
                <a href="{{ route('category.create') }}" class="bg-pink-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-pink-600 transition duration-200">
                    <i class="bi bi-plus-circle"></i> Create New Category
                </a>
                <!-- Tombol Back to Home -->
                <a href="{{ url('/') }}" class="bg-gray-500 text-white py-3 px-6 rounded-lg shadow-md hover:bg-gray-600 transition duration-200">
                    <i class="bi bi-house"></i> Back to Home
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-white bg-green-500 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full text-left border-separate border-spacing-3">
            <thead class="bg-purple-200">
                <tr>
                    <th scope="col" class="py-3 px-4 text-purple-600">ID</th>
                    <th scope="col" class="py-3 px-4 text-purple-600">Name</th>
                    <th scope="col" class="py-3 px-4 text-center text-purple-600">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="hover:bg-purple-50 transition duration-300">
                        <td class="py-3 px-4">{{ $category->id }}</td>
                        <td class="py-3 px-4 font-semibold">{{ $category->name }}</td>
                        <td class="py-3 px-4 text-center">
                            <div class="flex space-x-4 justify-center">
                                <a href="{{ route('category.edit', $category->id) }}" class="bg-yellow-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-yellow-600 transition duration-200">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-red-600 transition duration-200" onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
