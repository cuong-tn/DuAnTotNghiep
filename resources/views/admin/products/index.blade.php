@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Products</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create New Product</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Color</th>
            <th>Size</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_price }}</td>
                <td><img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" width="50"></td>
                <td>{{ $product->color->name }}</td>
                <td>{{ $product->size->name }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline-block;">
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
