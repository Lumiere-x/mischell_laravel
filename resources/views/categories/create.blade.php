<!DOCTYPE html>
<html>
<head>
    <title>Create New Category</title>
</head>
<body>
    <h1>Create New Category</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Category Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <button type="submit">Create Category</button>
        </div>
    </form>

    <a href="{{ route('categories.index') }}">Back to Categories</a>
</body>
</html>
