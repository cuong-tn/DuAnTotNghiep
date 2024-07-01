@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Colors</h1>
    <a href="{{ route('admin.colors.create') }}" class="btn btn-primary">Create New Color</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($colors as $color)
            <tr>
                <td>{{ $color->id }}</td>
                <td>{{ $color->name }}</td>
                <td>{{ $color->status }}</td>
                <td>
                    <a href="{{ route('admin.colors.edit', $color) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.colors.destroy', $color) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
