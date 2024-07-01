@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <h2>Images</h2>
        <a href="{{ route('admin.images.create') }}" class="btn btn-primary mb-3">Add New Image</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Product Detail ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th>Actions</th>
            </tr>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td>{{ $image->product_detail_id }}</td>
                    <td>{{ $image->name_image }}</td>
                    <td><img src="{{ asset($image->url) }}" alt="{{ $image->name_image }}" style="max-width: 100px;"></td>
                    <td>{{ $image->create_date }}</td>
                    <td>{{ $image->update_date }}</td>
                    <td>
                        <a href="{{ route('admin.images.edit', $image->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
