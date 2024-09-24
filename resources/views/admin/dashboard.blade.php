@extends('layout.apps')
@section('title', 'Admin Dashboard')

@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <!-- Search Bar for Students -->
    <div class="row mb-4">
        <div class="col-md-6">
            <form action="{{ route('admin.search.student') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="id" class="form-control" placeholder="Search for student" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Display Error Message -->
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Three References with Photos -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/all_books.jpeg') }}" style="width: 100%; height: 300px; object-fit: cover;" alt="All Books">
                <div class="card-body text-center">
                    <a href="{{ route('admin.books') }}" class="btn btn-primary">All Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/borrowed_books.jpeg') }}" style="width: 100%; height: 300px; object-fit: cover;" alt="Borrowed Books">
                <div class="card-body text-center">
                    <a href="{{ route('admin.borrowedBooks') }}" class="btn btn-primary">Borrowed Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/all_users.jpeg') }}" style="width: 100%; height: 300px; object-fit: cover;" alt="All Users">
                <div class="card-body text-center">
                    <a href="{{ route('admin.students') }}" class="btn btn-primary">All Users</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
