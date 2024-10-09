<!DOCTYPE html>
<html>
<head>
    <title>Edit Recipe</title>
</head>
<body>
    <h1>Edit Recipe</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Directive to use PUT method for updating -->

        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $recipe->title) }}" required>
        </div>

        <div>
            <label for="ingredients">Ingredients:</label>
            <textarea name="ingredients" id="ingredients" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
        </div>

        <div>
            <label for="instructions">Instructions:</label>
            <textarea name="instructions" id="instructions" required>{{ old('instructions', $recipe->instructions) }}</textarea>
        </div>

        <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $recipe->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit">Update Recipe</button>
        </div>
    </form>

    <a href="{{ route('recipes.index') }}">Back to Recipes</a>
</body>
</html>
