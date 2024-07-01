<!-- resources/views/admin/fabrics/create.blade.php -->

@extends('admin.layouts.master')

@section('title', 'Add New Fabric')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Fabric</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.fabrics.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="fabric">Fabric</label>
                    <input type="text" class="form-control" id="fabric" name="fabric" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
