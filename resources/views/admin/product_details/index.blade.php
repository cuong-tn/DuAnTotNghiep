@extends('admin.layouts.master')

@section('title', 'Product Details')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Details</h3>
            <div class="card-tools">
                <a href="{{ route('admin.product_details.create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Import Price</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Fabric</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($productDetails as $detail)
                    <tr>
                        <td>{{ $detail->id }}</td>
                        <td>{{ $detail->category->name }}</td>
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->import_price_product_detail }}</td>
                        <td>{{ $detail->price_product_detail }}</td>
                        <td>{{ $detail->color->name }}</td>
                        <td>{{ $detail->size->name }}</td>
                        <td>{{ $detail->fabric->fabric }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->status }}</td>
                        <td>
                            <a href="{{ route('admin.product_details.show', $detail->id) }}"
                               class="btn btn-sm btn-success">View</a>
                            <a href="{{ route('admin.product_details.edit', $detail->id) }}"
                               class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.product_details.destroy', $detail->id) }}" method="POST"
                                  style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
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
