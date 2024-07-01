@extends('admin.layouts.master')

@section('title', 'Add New Product Detail')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Product Detail</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.product_details.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        @foreach ($products as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="import_price_product_detail">Import Price</label>
                    <input type="number" class="form-control" id="import_price_product_detail"
                           name="import_price_product_detail" required>
                </div>
                <div class="form-group">
                    <label for="price_product_detail">Price</label>
                    <input type="number" class="form-control" id="price_product_detail" name="price_product_detail"
                           required>
                </div>
                <div class="form-group">
                    <label for="color_id">Color</label>
                    <select name="color_id" id="color_id" class="form-control">
                        @foreach ($colors as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="size_id">Size</label>
                    <select name="size_id" id="size_id" class="form-control">
                        @foreach ($sizes as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fabric_id">Fabric</label>
                    <select name="fabric_id" id="fabric_id" class="form-control">
                        @foreach ($fabrics as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required>
                </div>

                <div class="col-md-2">
                    <label for="status">Status</label>
{{--                    <select name="status" id="status" class="form-control">--}}
                    <select name="status" id="inputStatus" class="form-select">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
