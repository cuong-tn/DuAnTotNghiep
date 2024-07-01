<!-- resources/views/admin/fabrics/index.blade.php -->

@extends('admin.layouts.master')

@section('title', 'Fabrics')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Fabrics</h3>
            <div class="card-tools">
                <a href="{{ route('admin.fabrics.create') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Fabric</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fabrics as $fabric)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $fabric->fabric }}</td>
                        <td>{{ $fabric->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td>

                        <td>
                            <a href="{{ route('admin.fabrics.edit', $fabric->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.fabrics.destroy', $fabric->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this fabric?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
