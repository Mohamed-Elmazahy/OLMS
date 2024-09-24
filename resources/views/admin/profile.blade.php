@extends('layout.apps')
@section('title', 'My Profile')

@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<div class="container">
    <h1>Admin Profile</h1>
    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection