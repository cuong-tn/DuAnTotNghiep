@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_name">Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
        </div>
        <div class="form-group">
            <label for="product_price">Price</label>
            <input type="number" class="form-control" id="product_price" name="product_price" value="{{ $product->product_price }}" required>
        </div>
        <div class="form-group">
            <label for="product_image">Image</label>
            <input type="file" class="form-control" id="product_image" name="product_image">
            @if($product->product_image)
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" width="50">
            @endif
        </div>
        <div class="form-group">
            <label for="color_id">Color</label>
            <select class="form-control" id="color_id" name="color_id" required>
                @foreach($colors as $id => $name)
                    <option value="{{ $id }}" {{ $product->color_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="size_id">Size</label>
            <select class="form-control" id="size_id" name="size_id" required>
                @foreach($sizes as $id => $name)
                    <option value="{{ $id }}" {{ $product->size_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
