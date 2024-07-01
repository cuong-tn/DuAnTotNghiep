@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <h2>Edit Image</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="product_detail_id">Product Detail ID:</label>
                <input type="text" class="form-control" id="product_detail_id" name="product_detail_id" value="{{ $image->product_detail_id }}" required>
            </div>
            <div class="form-group">
                <label for="name_image">Name:</label>
                <input type="text" class="form-control" id="name_image" name="name_image" value="{{ $image->name_image }}" required>
            </div>
            <div class="form-group">
                <label for="url">Upload Image:</label>
                <input type="file" class="form-control" id="url" name="url" accept="image/*">
            </div>
            <div class="form-group">
                <label for="create_date">Create Date:</label>
                <input type="text" class="form-control" id="create_date" name="create_date" value="{{ $image->create_date }}" disabled>
            </div>

            <div class="form-group">
                <label for="update_date">Update Date:</label>
                <input type="date" class="form-control" id="update_date" name="update_date" value="{{ $image->update_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
