@extends('admin.layouts.master')

@section('title', 'Edit Product')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="product_price">Price</label>
                    <input type="number" name="product_price" id="product_price" class="form-control" value="{{ $product->product_price }}" required>
                </div>
                <div class="form-group">
                    <label for="product_image">Image</label>
                    @if ($product->product_image)
                        <div>
                            <img src="{{ asset('storage/products/' . $product->product_image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
                        </div>
                    @else
                        No Image
                    @endif
                    <input type="file" name="product_image" id="product_image" class="form-control-file mt-2">
                </div>
                <div class="form-group">
                    <label for="color_id">Color</label>
                    <select name="color_id" id="color_id" class="form-control" required>
                        @foreach ($colors as $id => $name)
                            <option value="{{ $id }}" {{ $product->color_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="size_id">Size</label>
                    <select name="size_id" id="size_id" class="form-control" required>
                        @foreach ($sizes as $id => $name)
                            <option value="{{ $id }}" {{ $product->size_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
