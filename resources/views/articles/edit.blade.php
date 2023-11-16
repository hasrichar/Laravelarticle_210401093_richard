<!-- resources/views/articles/edit.blade.php -->

@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Article</h1>

        <form action="{{ route('articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Title:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $article->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Content:</label>
                <textarea class="form-control" rows="6" id="comment" name="comment" required>{{ $article->comment }}</textarea>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author:</label>
                <select class="form-select" id="author_id" name="author_id" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $article->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

            <a href="{{ route('articles.index') }}" class="btn btn-secondary ml-2">Kembali</a>
        </form>
    </div>
</body>
</html>
@endsection
