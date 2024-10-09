<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Category Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div>
            <button type="submit">Update Category</button>
        </div>
    </form>

    <a href="{{ route('categories.index') }}">Back to Categories</a>
</body>
</html>
