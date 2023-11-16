<!-- resources/views/articles/create.blade.php -->

@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
</head>
<body>
    <div class="container mt-4">
        <h1>Create Article</h1>

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Content:</label>
                <textarea class="form-control" id="comment" name="comment" required></textarea>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author:</label>
                <input type="text" class="form-control" id="author" name="author" required value="richard">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary ml-2">Kembali</a>
        </form>
    </div>

</body>
</html>
@endsection
