@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <h1>Image Details</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $image->id }}</td>
            </tr>
            <tr>
                <th>Product Detail ID</th>
                <td>{{ $image->product_detail_id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $image->name_image }}</td>
            </tr>
            <tr>
                <th>URL</th>
                <td>{{ $image->url }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $image->create_date }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $image->update_date }}</td>
            </tr>
        </table>
        <a href="{{ route('admin.images.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
