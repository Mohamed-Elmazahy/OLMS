@extends('layout.apps')
@section('title', 'Students')

@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<div class="container">
    <h1>Students</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <a href="{{ route('admin.students.show', $student) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection