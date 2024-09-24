@extends('layout.apps')

@section('title', 'Books')

@section('content')
<div class="container">
    <h1>Books</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Quantity</th>
                <th>Availability</th> <!-- New column for availability -->
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
                        @if($book->quantity > 0)
                            <span class="text-success">Available</span>
                        @else
                            <span class="text-danger">Not Available</span>
                        @endif
                    </td>
                    <td>
                        @if($book->quantity > 0)
                            <form action="{{ route('student.books.borrow', $book) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Borrow</button>
                            </form>
                        @else
                            <span class="text-muted">Not Available</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $books->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection