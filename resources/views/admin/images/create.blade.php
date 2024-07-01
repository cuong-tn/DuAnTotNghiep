@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <h2>Add New Image</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_detail_id">Product Detail ID:</label>
                <input type="text" class="form-control" id="product_detail_id" name="product_detail_id" required>
            </div>
            <div class="form-group">
                <label for="name_image">Name:</label>
                <input type="text" class="form-control" id="name_image" name="name_image" required>
            </div>
            <div class="form-group">
                <label for="url">Upload Image:</label>
                <input type="file" class="form-control" id="url" name="url" accept="image/*" required onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 200px; margin-top: 10px;">
            </div>
            <div class="form-group">
                <label for="create_date">Create Date:</label>
                <input type="date" class="form-control" id="create_date" name="create_date" required>
            </div>
            <div class="form-group">
                <label for="update_date">Update Date:</label>
                <input type="date" class="form-control" id="update_date" name="update_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
