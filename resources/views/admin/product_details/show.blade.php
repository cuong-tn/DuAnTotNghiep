@extends('admin.layouts.master')

@section('title', 'Product Detail')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Detail</h3>
            <div class="card-tools">
                <a href="{{ route('admin.product_details.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $productDetail->id }}</p>
                    <p><strong>Category:</strong> {{ $productDetail->category->name }}</p>
                    <p><strong>Product:</strong> {{ $productDetail->product->name }}</p>
                    <p><strong>Import Price:</strong> {{ $productDetail->import_price_product_detail }}</p>
                    <p><strong>Price:</strong> {{ $productDetail->price_product_detail }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Color:</strong> {{ $productDetail->color->name }}</p>
                    <p><strong>Size:</strong> {{ $productDetail->size->name }}</p>
                    <p><strong>Fabric:</strong> {{ $productDetail->fabric->fabric }}</p>
                    <p><strong>Quantity:</strong> {{ $productDetail->quantity }}</p>
                    <p><strong>Status:</strong> {{ $productDetail->status }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <p><strong>Description:</strong></p>
                    <p>{{ $productDetail->description }}</p>
                    <p><strong>Note:</strong></p>
                    <p>{{ $productDetail->note }}</p>
                    <p><strong>Slug:</strong> {{ $productDetail->slug }}</p>
                    <p><strong>Created At:</strong> {{ $productDetail->created_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</p>
                    <p><strong>Updated At:</strong> {{ $productDetail->updated_at->timezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</p>


                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
