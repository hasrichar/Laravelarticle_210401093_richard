<!-- resources/views/modifikasicategory.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Modify Categories</h1>

        <!-- Add Category Form -->
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name:</label>
                <input type="text" class="form-control" id="category_name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>

        <hr>

        <!-- List of Categories with Delete Form -->
        <h2>Existing Categories</h2>
        <ul>
            @foreach($categories as $category)
                <li>
                    {{ $category->name }}
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
