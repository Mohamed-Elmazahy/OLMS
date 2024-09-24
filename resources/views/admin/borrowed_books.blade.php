@extends('layout.apps')
@section('title', 'Borrowed Books')

@section('content')
<div class="container">
    <h1 class="mb-4">Borrowed Books</h1>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Borrowed Books</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Borrowed By</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowedBooks as $borrowedBook)
                        <tr>
                            <td>{{ $borrowedBook->book->title }}</td>
                            <td>{{ $borrowedBook->book->author }}</td>
                            <td>{{ $borrowedBook->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $borrowedBooks->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection