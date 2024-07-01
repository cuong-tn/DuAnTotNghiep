@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="product_price">Price</label>
            <input type="number" class="form-control" id="product_price" name="product_price" required>
        </div>
        <div class="form-group">
            <label for="product_image">Image</label>
            <input type="file" class="form-control" id="product_image" name="product_image">
        </div>
        <div class="form-group">
            <label for="color_id">Color</label>
            <select class="form-control" id="color_id" name="color_id" required>
                @foreach($colors as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="size_id">Size</label>
            <select class="form-control" id="size_id" name="size_id" required>
                @foreach($sizes as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
