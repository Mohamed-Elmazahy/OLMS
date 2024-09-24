@extends('layout.apps')
@section('title', 'Books')

@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<div class="container">
    <h1>Edit Book</h1>
    <form action="{{ route('admin.books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $book->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $book->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
</div>
@endsection