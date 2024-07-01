@extends('admin.layouts.master')

@section('title', 'Products')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products</h3>
            <div class="card-tools">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->color->name }}</td>
                        <td>{{ $product->size->name }}</td>
                        <td>
                            @if ($product->product_image)
                            <img src="{{ asset($product->url) }}" alt="{{ $product->product_image }}" style="max-width: 100px;">

{{--                            <img src="{{ asset('storage/products/' . $product->product_image) }}" alt="{{ $product->name }}" style="max-width: 100px;">--}}
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
