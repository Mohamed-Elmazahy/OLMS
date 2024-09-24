@extends('layout.apps')
@section('title', 'Books')

@section('content')
<div class="container">
    <h1 class="mb-4">Books</h1>

    <!-- Add Book Button -->
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-4">Add Book</a>

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">All Books</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>
                                <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.books.destroy', $book) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $books->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection