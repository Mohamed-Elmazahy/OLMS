@extends('layout.apps')

@section('title', 'Student Details')

@section('content')
<div class="container">
    <h1 class="mb-4">Student Details</h1>
    <div class="card shadow-sm" style="border-radius: 10px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body">
            <h5 class="card-title" style="font-size: 1.5rem; font-weight: bold;">{{ $student->name }}</h5>
            <p class="card-text" style="font-size: 1.1rem;"><strong>Email:</strong> {{ $student->email }}</p>
            <h6 class="card-subtitle mb-2 text-muted">Borrowed Books</h6>
            <ul class="list-group">
                @foreach($student->borrowedBooks as $borrowedBook)
                    <li class="list-group-item" style="border: none; background-color: #f8f9fa; margin-bottom: 5px; border-radius: 5px;">
                        {{ $borrowedBook->book->title }} by {{ $borrowedBook->book->author }}
                        @if($borrowedBook->return_date)
                            <span class="text-danger"> (Returned)</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <a href="{{ route('admin.students') }}" class="btn btn-primary mt-4">Back to Students</a>
</div>
@endsection