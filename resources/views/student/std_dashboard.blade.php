@extends('layout.apps')

@section('title', 'Student Dashboard')

@section('content')
<div class="container" style="padding: 20px;">
    <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Student Dashboard</h1>
    <h3 style="font-size: 1.8rem; margin-bottom: 15px;">Borrowed Books</h3>
    <table class="table" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                <th style="padding: 12px 15px; text-align: left;">Title</th>
                <th style="padding: 12px 15px; text-align: left;">Author</th>
                <th style="padding: 12px 15px; text-align: left;">Borrowed Date</th>
                <th style="padding: 12px 15px; text-align: left;">Return Date</th>
                <th style="padding: 12px 15px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowedBooks as $borrowedBook)
                <tr style="border-bottom: 1px solid #dee2e6;">
                    <td style="padding: 12px 15px;">{{ $borrowedBook->book->title }}</td>
                    <td style="padding: 12px 15px;">{{ $borrowedBook->book->author }}</td>
                    <td style="padding: 12px 15px;">{{ $borrowedBook->borrowed_date }}</td>
                    <td style="padding: 12px 15px;">{{ $borrowedBook->return_date ?? 'Not Returned' }}</td>
                    <td style="padding: 12px 15px;">
                        @if(is_null($borrowedBook->return_date))
                            <form action="{{ route('student.books.return', $borrowedBook->book) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Return</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center" style="margin-top: 20px;">
        {{ $borrowedBooks->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection