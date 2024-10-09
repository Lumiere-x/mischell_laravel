<!DOCTYPE html>
<html>
<head>
    <title>Create New Recipe</title>
</head>
<body>
    <h1>Create New Recipe</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="ingredients">Ingredients:</label>
            <textarea name="ingredients" id="ingredients" required>{{ old('ingredients') }}</textarea>
        </div>

        <div>
            <label for="instructions">Instructions:</label>
            <textarea name="instructions" id="instructions" required>{{ old('instructions') }}</textarea>
        </div>

        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit">Create Recipe</button>
        </div>
    </form>

    <a href="{{ route('recipes.index') }}">Back to Recipes</a>
</body>
</html>
